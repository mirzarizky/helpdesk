<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $category = DB::table('categories')
      ->select('*')
      ->where('product_id', 1)
      ->orderBy('order','asc')
      ->get();

      $post = DB::table('posts as a')
      ->select('a.*','c.name as categoryName', 'c.slug as categorySlug')
      ->leftJoin('categories as c', 'c.id', '=', 'a.category_id')
      ->where('a.status', '=', 'PUBLISHED')
      ->orderBy('a.created_at','desc')
      ->get();

      return view('home',compact('post','category'));
    }



    public function faq()
    {

      $category = DB::table('faq_categories as a')
      ->select('a.*')
      ->orderBy('a.order','asc')
      ->get();

      $faqs = DB::table('faqs as a')
      ->select('a.*')
      ->where('a.status', '=', 'PUBLISHED')
      ->orderBy('a.created_at','desc')
      ->get();

      return view('faq',compact('faqs','category'));
    }

}
