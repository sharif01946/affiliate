<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use App\Affiliate;

class ProductController extends Controller
{


	public function index(){
	    return view('products.index', ['products' => Product::all()]);
	}

	public function add() {
		$affiliates = Affiliate::all();
        return view('products.add',compact("affiliates"));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'affiliate_id' => 'required',
            'url' => 'required|url',
        ]);

        $data = $request->except(['_token']);

        $product = Product::create($data);
        return Redirect::to('admin/products/'.$product->id);
    }

    public function edit($id) {
    	$affiliates = Affiliate::all();
        $product = Product::findOrFail($id);
        return view('products.store', compact("affiliates","product"));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'affiliate_id' => 'required',
            'url' => 'required|url',
        ]);

        $data = $request->except(['_token']);

        $product = Product::findOrFail($id);
        $product->name = $data["name"];
        $product->affiliate_id = $data["affiliate_id"];
        $product->url = $data["url"];
        $product->description = $data["description"];
        $product->save();

        $request->session()->flash('activity_msg_success','Product Updated successfully');
        return Redirect::to('admin/products/'.$product->id);
    }
    
    public function delete($id, Request $request) {

    }

}
