<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use App\Charity as CharityModel;
use App\CharityGroup as CharityGroupModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class Charity extends Controller
{

	public function __construct()
    {
        $this->middleware('admin');
    }

	public function index()
    {
        return view('charity.index', ['charities' => CharityModel::where("status","active")->get()]);
    }
    
    public function pending()
    {
        return view('charity.pending', ['charities' => CharityModel::where("status","pending")->get()]);
    }

    public function pending_update(){
        $output = array();

        $data = Input::all();
        $id = $data["id"];
        $item = CharityModel::find($id);


        if($item){
            $item->status = "active";
            $item->save();

            $output["status"] = 1;
            $output["msg"] = "Charity approved successfully.";
            $output["type"] = "success";
            $output["html"] = '<div class="alert alert-success">'.$output["msg"]."</div>";

        }else{
            $output["status"] = 0;
            $output["msg"] = "Unable to update approval.";
            $output["type"] = "error";
            $output["html"] = '<div class="alert alert-danger">'.$output["msg"]."</div>";
        }
        echo json_encode($output);
        die;   
    }

    
    public function add()
    {
        return view('charity.add', [
            'groups' => CharityGroupModel::All(),
        ]);
    }

    
    public function store(Request $request)
    {
    	$this->validate($request, [
	        'name' => 'bail|required|max:255',
	        'group_id' => 'numeric',
	    ]);

	    $data = $request->except(['_token']);
        if( !isset( $data["group_id"] ) ) $data["group_id"] = 0;

	    $charity = CharityModel::create($data);
	    return Redirect::to('admin/charity/'.$charity->id);
        //return view('charity.store', ['status' => $charity->id]);
    }

    public function edit($id)
    {
    	$charity = CharityModel::findOrFail($id);
        return view('charity.store', [
            'item' => $charity,
            'groups' => CharityGroupModel::All(),
        ]);
    }
    
    public function update($id, Request $request) {
    	$this->validate($request, [
            'name' => 'bail|required|max:255',
            'group_id' => 'numeric',
        ]);
	    $data = $request->except(['_token']);
        if( !isset( $data["group_id"] ) ) $data["group_id"] = 0;

        $charity = CharityModel::findOrFail($id);
	    
        $charity->name = $data["name"];
        $charity->group_id = $data["group_id"];
        $charity->charity_description = $data["charity_description"];
        $charity->bank_name = $data["bank_name"];
        $charity->bank_address = $data["bank_address"];
        $charity->bank_swift = $data["bank_swift"];
        $charity->bank_account = $data["bank_account"];

        $charity->save();

        $request->session()->flash('activity_msg_success','Charity Updated successfully');
	    return Redirect::to('admin/charity/'.$charity->id);
    }
    
    public function delete($id, Request $request) {
    	$this->validate($request, [
	        '_token' => 'required',
	    ]);
        $charity = CharityModel::findOrFail($id);
        //$request->session()->flash('activity_msg_success','Charity Deleted successfully');
	    //return Redirect::to('admin/charity');
    }

    public function groups() {
        return view('charity.groups', ['charities' => CharityGroupModel::All()]);
    }
    
    public function groups_add() {
        return view('charity.groups_add');
    }
    
    public function groups_edit($id) {
        $item = CharityGroupModel::findOrFail($id);
        return view('charity.groups_store',[
            'item' => $item,
        ]);
    }

    
    public function groups_add_process(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        $data = $request->except(['_token']);
        $slug = str_slug($data["name"]);

        if ( CharityGroupModel::where('slug', '=', $slug)->exists() ) {
            $validator->after(function ($validator) {
                $validator->errors()->add('slug', 'This Group already exist');
            });
        }

        if ( $validator->fails() ) {
            return redirect('charity/groups/add')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data["slug"] = $slug;

        $charity = CharityGroupModel::create($data);
        return Redirect::to('admin/charity/groups/'.$charity->id);
    }
    
    public function groups_update($id, Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        
        $data = $request->except(['_token']);

        $item = CharityGroupModel::findOrFail($id);
        $item->name = $data["name"];
        $item->description = $data["description"];
        $item->save();

        $request->session()->flash('activity_msg_success','Group Updated successfully');
        return Redirect::to('admin/charity/groups/'.$item->id);
    }




       
}
