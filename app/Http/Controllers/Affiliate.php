<?php

namespace App\Http\Controllers;

use App\Affiliate as AffiliateModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

class Affiliate extends Controller
{

	public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        return view('affiliate.index', ['affiliates' => AffiliateModel::all()]);
    }
    

    public function add() {
        return view('affiliate.add');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'charity_commision' => 'required|numeric',
        ]);

        $data = $request->except(['_token']);

        $affiliate = AffiliateModel::create($data);
        return Redirect::to('admin/affiliate/'.$affiliate->id);
    }

    public function edit($id) {
        $affiliate = AffiliateModel::findOrFail($id);
        return view('affiliate.store', ['item' => $affiliate]);
    }
    
    public function commisions($id) {
        $affiliate = AffiliateModel::findOrFail($id);
        return view('affiliate.commisions', ['item' => $affiliate]);
    }
    
    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'charity_commision' => 'required|numeric',
        ]);

        $data = $request->except(['_token']);

        $affiliate = AffiliateModel::findOrFail($id);

        $affiliate->name = $data["name"];
        $affiliate->charity_commision = $data["charity_commision"];
        $affiliate->save();

        $request->session()->flash('activity_msg_success','Affiliate Updated successfully');
        return Redirect::to('admin/affiliate/'.$affiliate->id);
    }
    
    public function delete($id, Request $request) {

    }
}
