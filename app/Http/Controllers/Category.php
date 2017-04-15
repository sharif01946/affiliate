<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Category as CategoryModel;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;


class Category extends Controller

{
    public function index()
    {
 
        $categorys = CategoryModel::All();
    	return view('category.index',compact('categorys'));
    }

    public function add()
    {
    	return view('category.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        $data = $request->except(['_token']);        
        $slug = str_slug($data["name"]);

        if ( CategoryModel::where('slug','=', $slug)->exists() ) {
            $validator->after(function ($validator) {
                $validator->errors()->add('slug', 'This Group already exist');
            });
        }
          if ( $validator->fails() ) {
            return redirect('admin/category/add')
                        ->withErrors($validator)
                        ->withInput();
        }

        $categorys = new CategoryModel;
        $categorys->name = $request->name;
        $categorys->slug = $slug;
        $categorys->save();

        Session::flash('activity_msg_success','Category Create successfully');

        return redirect('admin/category');
    }
    public function edit($id)
    {
        $categorys = CategoryModel::findOrFail($id);
        return view('category.edit', compact('categorys'));
    }
    public function update(Request $request, $id)
    {
         $this->validate($request, [
        'name' => 'required|max:255',
        ]);

        $data = $request->except(['_token']);

        $categorys = CategoryModel::findOrFail($id);
        $categorys->name = $request->name;
        $categorys->save();

        return redirect('admin/category');


    }
}
