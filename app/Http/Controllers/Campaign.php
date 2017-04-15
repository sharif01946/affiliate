<?php

namespace App\Http\Controllers;

use App\Product;
use App\Affiliate as AffiliateModel;
use App\Charity as CharityModel;
use App\Campaign as CampaignModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Helpers\CJ;
use Illuminate\Support\Facades\Input;
use Storage;
use DB;

class Campaign extends Controller
{
	public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        return view('campaign.index', [
            'campaigns' => CampaignModel::All()
        ]);
    }
    
    public function add() {
        $categorys = DB::table('categories')
                    ->select('name')
                    ->get();
        $products = Product::All();

        return view('campaign.add',compact('categorys','products'));

    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'product_id' => 'required',
            'image' => 'required|image|mimes:png,jpeg,jpg|max:2048',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        Storage::put('upload/images/'.$filename, file_get_contents($request->file('image')->getRealPath()));

        $token = Str::random(rand(25,50));
        $data = $request->except(['_token']);
        $data["ctoken"] = $token;
        $data["url"] = url('click/'.$token);

        $item = CampaignModel::create($data);
        $item->image_path= $filename;
        $item->save();
        return Redirect::to('admin/campaign/'.$item->id);
    }

    public function edit($id) {
        $item = CampaignModel::findOrFail($id);
        return view('campaign.store', [
        	'item' => $item,
        	'products' => Product::All(),
        	'charities' => CharityModel::All(),
        ]);
    }
    
    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'product_id' => 'required',
        ]);

        $data = $request->except(['_token']);

        $item = CampaignModel::findOrFail($id);
        
        $item->name = $data["name"];
        $item->product_id = $data["product_id"];
        $item->description = $data["description"];
        $item->save();

        $request->session()->flash('activity_msg_success','Campaign updated successfully');
        return Redirect::to('admin/campaign/'.$item->id);
    }
    
    public function delete($id, Request $request) {

    }   
}
