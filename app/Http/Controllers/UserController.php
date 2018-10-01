<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function viewprofile($id,Request $request)
    {
        
        $blogs=DB::table('users')
        	->where('users.id',$id)
            ->join('blogs', 'blogs.user_id', '=', 'users.id')
            ->join('blogs_detail', 'blogs_detail.blog_id', '=', 'blogs.id')
            ->get();

        $user=DB::table('users')
        	->where('id',$id)
        	->first();

        return view('user.viewprofile')
        		->with('blogs',$blogs)
        		->with('user',$user);
    }
}
