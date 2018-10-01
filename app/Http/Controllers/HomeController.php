<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\Blogresource;

class HomeController extends Controller
{
   public function index(Request $request)
    {

		 // $data = [
   //          'name' => "ABC",
   //          'email' => "abc@gmail.com",
   //          'password' => "123",
            
   //      ];

   //     DB::table('users')
   //          ->insert($data);


    	// $data = [
     //        'user_id' => 1,
     //    ];

     //   DB::table('blogs')
     //        ->insert($data);


    	 // $data = [
      //       'title' => "ABC",
      //       'detail' => "abcefg",
      //       'blog_id' => 1,
            
      //   ];

      //  DB::table('blogs_detail')
      //       ->insert($data);


            // DB::table('users')
            // ->where('id',1)
            // ->delete();

        return view('home.index');
    }
    public function detail(Request $request)
    {
      try {
            $blogs= DB::table('users')
             ->join('blogs', 'users.id', '=', 'blogs.user_id')
             ->join('blogs_detail', 'blogs_detail.blog_id', '=', 'blogs.id')
            ->get();

            if (count($blogs) > 0) {
              
              return Blogresource::collection($blogs);
                
            } else {
                return response()->json([
                    'httpStatus' => 204,
                    'status' => "FAILED",
                    'message' => "No data available"
                ], 204);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'httpStatus' => 400,
                'status' => "FAILED",
                'message' => 'Something went wrong!',
                'exception_message' => $exception->getMessage()
            ], 400);

        }

    	  

        		//dd($blogs);

        //return response()->json($blogs, 201);
        		
        //return new BlogCollection($blogs);
        //return Blogresource::collection($blogs);
    }

    public function show($id,Request $request)
    {
    	  $blog= DB::table('users')
       			 ->join('blogs', 'users.id', '=', 'blogs.user_id')
       			 ->join('blogs_detail', 'blogs_detail.blog_id', '=', 'blogs.id')
       			 ->where('blogs.id',$id)
        		->first();

        		//dd($blog);
        return response()->json($blog, 201);
    }
}
