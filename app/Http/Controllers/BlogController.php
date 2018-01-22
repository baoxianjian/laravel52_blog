<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    protected $limit=3;
    
    public function index()
    {
        //\DB::enableQueryLog();
        //$posts = Post::all(); //10条
        //$posts = Post::with('author')->orderBy('created_at','desc')->get(); //2条
        //$posts = Post::with('author')->latest()->get(); //orderBy('created_at','desc')的同义词
        //$posts = Post::with('author')->latestFirst()->get(); //自定义的
        //$posts = Post::with('author')->latestFirst()->paginate(3); //分页
        $posts = Post::with('author')->latestFirst()->simplePaginate($this->limit); //分页（生成简单的页码）
        //view('blog.index',compact('posts'))->render();
        //dd(\DB::getQueryLog());
        
        //echo 'xxxxxxxxxx';
        return view('blog.index',compact('posts'));
    }
}
