<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function Create(Request $request)
    {



        $data = [
     
            'user_id' => session('user')->id,
        
            
        ];

       $id=DB::table('blogs')
            ->insertGetId($data);



 	$data = [
            'title' => $request->Title,
            'blog_id' => $id,
            'detail' => $request->Detail,
            
        ];
        DB::table('blogs_detail')
            ->insert($data);
        

        return redirect()->route('home');
    }

    public function detail($id,Request $request)
    {
        // $post= DB::table('users')
        // ->join('posts', 'users.id', '=', 'posts.post_by')
        // ->where('posts.id',$id)->first();

        // $comments=DB::table('users')
        //     ->join('comments', 'users.id', '=', 'comments.user_id')
        //     ->where('post_id',$id)
        //     ->orderBy('comment_date','DESC')
        //     ->get();

        // $request->session()->put('postid', $id);

    $blog=DB::table('users')
            ->where('blogs_detail.id','=',$id)
            ->join('blogs', 'blogs.user_id', '=', 'users.id')
            ->join('blogs_detail', 'blogs_detail.blog_id', '=', 'blogs.id')
            ->first();

    $comments=DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->where('blog_id',$id)
            ->get();

        return view('blog.blogdetail')->with('blog',$blog)->with('comments',$comments);
    }

    public function edit($id,Request $request)
    {
        $blog=DB::table('users')
            ->where('blogs_detail.id','=',$id)
            ->join('blogs', 'blogs.user_id', '=', 'users.id')
            ->join('blogs_detail', 'blogs_detail.blog_id', '=', 'blogs.id')
            ->first();

 $comments=DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->where('blog_id',$id)
            ->get();
        return view('blog.edit')->with('blog',$blog)->with('comments',$comments);
    }

    public function saveedit($id,Request $request)
    {
         $data = [
            'title' => $request->title,
            'detail' => $request->detail,
            
        ];

         DB::table('blogs_detail')
            ->where('id', $id)
            ->update($data);

      

        return redirect()->route('blog.detail',$id);
    } 

    public function delete($id,Request $request)
    {
       
         DB::table('blogs')
            ->where('id', $id)
            ->delete();

      

        return redirect()->route('user.viewprofile',session('user')->id);
    }
}
