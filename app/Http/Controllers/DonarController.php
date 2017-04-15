<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Donar;

class DonarController extends Controller
{

    public function index(){
        return view('user.index', ['donars' => Donar::where("status","active")->get()]);
    }


    public function add() {
        return view('user.add');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'email' => 'required|email|unique:donars',
            'password' => 'required|min:6',
        ]);
        $data = $request->except(['_token']);
        $data["password"] = bcrypt($data["password"]);
        $data["status"] = "active";

        $donar = Donar::create($data);
        return Redirect::to('admin/users/'.$donar->id);
    }

    public function edit(Donar $donar) {
    	$item = $donar;
        return view('user.store', compact("affiliates","item"));
    }

    public function update(Donar $donar, Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
        ]);

        $data = $request->except(['_token']);

        $donar->name = $data["name"];
        $donar->first_name = $data["first_name"];
        $donar->last_name = $data["last_name"];

        if($data["password"]){
        	$validator = Validator::make($request->all(), [
	            'name' => 'bail|required|max:255',
	            'password' => 'required|min:6',
	        ]);

	        if ($validator->fails()) {
	            return redirect('admin/users/'.$donar->id)
	                        ->withErrors($validator)
	                        ->withInput();
	        }
	        $donar->password = bcrypt($data["password"]);
        }

        $donar->save();

        $request->session()->flash('activity_msg_success','User Updated successfully');
        return Redirect::to('admin/users/'.$donar->id);
    }
    
    public function delete($id, Request $request) {

    }
    
    public function pending(){
        return view('user.pending', ['items' => Donar::where("status","pending")->get()]);
    }


    public function pending_update(){
        $output = array();

        $data = Input::all();
        $id = $data["id"];
        $item = Donar::find($id);


        if($item){
            $item->status = "active";
            $item->save();

            $output["status"] = 1;
            $output["msg"] = "Affiliate approved successfully.";
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
}
