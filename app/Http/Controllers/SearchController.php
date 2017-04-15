<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
 	public function index(Request $request)
 	{
 		$categorys = DB::table('categories')
 		            ->select('name')
 		            ->get();
 		$charitys = DB::table('charities')
 		            ->select('name','id')
 		            ->get();
 		$query = $request->search_category;
 		
 		$articles = DB::table('campaigns')->where('product_category', 'LIKE', '%' . $query . '%')->paginate(10);
 		return view('search.index', compact('articles','categorys','charitys'));
 	}
 }
