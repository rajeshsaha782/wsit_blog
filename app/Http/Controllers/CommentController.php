<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function commentCreate(Request $request)
    {
    
         $user_id= session('user')->id;

     
         $data = [
            'blog_id' => $request->blog_id,
            'user_id' => $user_id,
            'cmnt' => $request->commentDetail,
            
        ];

       DB::table('comments')
            ->insert($data);



        return redirect()->route('blog.detail',$request->blog_id);
    }
}
