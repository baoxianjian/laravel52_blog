<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    protected $limit=3;
    
    public function index()
    {
        //$categories = Category::orderBy('title','asc')->get();
        $categories = Category::with(['posts'=>function($query){
            $query->published();
        }])->orderBy('title','asc')->get();
        //echo strtolower('CHONGQING WANGGUAN CULTURE COMMUNICATION CO., LTD.');
        //\DB::enableQueryLog();
        //$posts = Post::all(); //10条
        //$posts = Post::with('author')->orderBy('created_at','desc')->get(); //2条
        //$posts = Post::with('author')->latest()->get(); //orderBy('created_at','desc')的同义词
        //$posts = Post::with('author')->latestFirst()->get(); //自定义的
        //$posts = Post::with('author')->latestFirst()->paginate(3); //分页
        //$posts = Post::with('author')->latestFirst()->simplePaginate($this->limit); //分页（生成简单的页码）
        $posts = Post::with('author')->published()->simplePaginate($this->limit); //分页（生成简单的页码）
        //view('blog.index',compact('posts'))->render();
        //dd(\DB::getQueryLog());
        
        //echo 'xxxxxxxxxx';
        return view('blog.index',compact('posts','categories'));
    }
    
    public function category($category_id)
    {
        //$categories = Category::orderBy('title','asc')->get();
        $categories = Category::with(['posts'=>function($query){
            $query->published();
        }])->orderBy('title','asc')->get();
        //echo strtolower('CHONGQING WANGGUAN CULTURE COMMUNICATION CO., LTD.');
        //\DB::enableQueryLog();
        //$posts = Post::all(); //10条
        //$posts = Post::with('author')->orderBy('created_at','desc')->get(); //2条
        //$posts = Post::with('author')->latest()->get(); //orderBy('created_at','desc')的同义词
        //$posts = Post::with('author')->latestFirst()->get(); //自定义的
        //$posts = Post::with('author')->latestFirst()->paginate(3); //分页
        //$posts = Post::with('author')->latestFirst()->simplePaginate($this->limit); //分页（生成简单的页码）
        $posts = Post::with('author')->published()->where('category_id',$category_id)->simplePaginate($this->limit); //分页（生成简单的页码）
        //view('blog.index',compact('posts'))->render();
        //dd(\DB::getQueryLog());
        
        //echo 'xxxxxxxxxx';
        return view('blog.index',compact('posts','categories'));
    }

    
    public function show(Post $post)
    {
        //$post = Post::published()->findOrFail($id);
        return view('blog.show', compact('post'));
    }
    
    
    
    
}
