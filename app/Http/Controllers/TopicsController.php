<?php

namespace App\Http\Controllers;

use App\Topics;
use App\Posts;
use TCG\Voyager\Models\Post as Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;

class TopicsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//$this->middleware('topics');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function reaction($type, $posts_id)
    {

      $data = Topics::create([
        'posts_id'  =>  Hashids::decode($posts_id)[0],
        'type'      =>  $type,
        'ip_addres' => \Request::ip()
      ]);
      Session::flash('message', 'Thank you!');
      return redirect()->back();
    }


    public function detail($slug)
    {
      $topic = DB::table('posts as a')
      ->select('a.*', 'c.name as categoryName', 'c.slug as categorySlug', 'u.name as authorName', 'u.avatar as authorAvatar')
      ->leftJoin('categories as c', 'c.id', '=', 'a.category_id')
      ->leftJoin('users as u', 'u.id', '=', 'a.author_id')
      ->where('a.status', '=', 'PUBLISHED')
      ->where('a.slug', '=', $slug)
      ->first();
      if($topic){
        return view('topics.detail',compact('topic'));
      }else{
        return view('layouts.404');
      }
    }


    public function category($slug)
    {
      $category = DB::table('categories')
      ->where('slug', '=', $slug)
      ->first();

      $topics = DB::table('posts as a')
      ->select('a.*', 'c.name as categoryName', 'c.slug as categorySlug', 'u.name as authorName', 'u.avatar as authorAvatar')
      ->leftJoin('categories as c', 'c.id', '=', 'a.category_id')
      ->leftJoin('users as u', 'u.id', '=', 'a.author_id')
      ->where('a.status', '=', 'PUBLISHED')
      ->where('c.slug', '=', $slug)
      ->orderBy('a.created_at','desc')
      ->paginate(10);
      if($category){
        return view('topics.category',compact('topics','category'));
      }else{
        return view('layouts.404');
      }
    }

    public function livesearch()
    {
      $keyword= Input::get('query');
      $topics  = Posts::search($keyword)->get();
      echo json_encode($topics);
    }

    public function mobile($id)
    {
      $category = DB::table('categories')
      ->select('*')
      ->where('product_id', 2)
      ->orderBy('order','asc')
      ->get();
      $id = $id;
      return view('mobile.home',compact('id','post','category'));
    }

    public function mobile_category($id,$slug)
    {
      $id = $id;
      $category = DB::table('categories')
      ->where('slug', '=', $slug)
      ->first();

      $topics = DB::table('posts as a')
      ->select('a.*', 'c.name as categoryName', 'c.slug as categorySlug')
      ->leftJoin('categories as c', 'c.id', '=', 'a.category_id')
      ->where('a.status', '=', 'PUBLISHED')
      ->where('c.slug', '=', $slug)
      ->orderBy('a.created_at','desc')
      ->get();
      if($category){
        return view('mobile.category',compact('id','topics','category'));
      }else{
        return view('layouts.404');
      }
    }

    public function mobile_detail($id,$slug)
    {
      $id = $id;
      $topic = DB::table('posts as a')
      ->select('a.*', 'c.name as categoryName', 'c.slug as categorySlug')
      ->leftJoin('categories as c', 'c.id', '=', 'a.category_id')
      ->where('a.status', '=', 'PUBLISHED')
      ->where('a.slug', '=', $slug)
      ->first();
      if($topic){
        return view('mobile.detail',compact('id','topic'));
      }else{
        return view('layouts.404');
      }
    }

    public function mobile_search()
    {
      $keyword= Input::get('query');
      $topics  = Posts::search($keyword)->get();
      echo json_encode($topics);
    }
}
