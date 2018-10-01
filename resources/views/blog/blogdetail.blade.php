@extends('layout')



@section('contents')

	<div class="col-lg-8" >
          
          <hr/><hr/><hr/>
          <h1 class="mt-4">{{$blog->title}}</h1>

          
            
          <p class="lead">
            by

            {{$blog->name}} 

            @if(session('user')->id == $blog->user_id)
            <a  href="{{route('blog.edit',['id' => $blog->id])}}">Edit</a>
            @endif
          </p>

          <hr>

          
<div class="row" style="max-width: 800px">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                 
                  <p style="text-align:justify;"class="card-text">{{$blog->detail}}</p>
               
                </div>
                
                   </div>  
                 </div>
            </div>


  <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form method="post" action="{{action('CommentController@commentCreate')}}">
                {{csrf_field()}}
                <input type="hidden" name="blog_id" value="{{$blog->id}}"/>

                <div class="form-group">
                  <textarea name="commentDetail"class="form-control" required rows="3"></textarea>
                </div>
                @if(session('user'))
                   <button type="submit" class="btn btn-primary">Submit</button>
                   @else
                   <a href="{{route('login')}}" class="btn btn-primary">Submit</a>
                @endif
              </form>
            </div>
          </div>     


<div style="max-height: 500px;overflow: scroll;"> 
@foreach($comments as $comment)
          <!-- Single Comment -->
          <div class="media mb-4" >
            <img class="d-flex mr-3 rounded-circle" height="50" src="{{asset('user.png')}}" alt="">
            <div class="media-body">
            <h5 class="mt-0">
              {{$comment->name}} 
              

            </h5>

             

              {{$comment->cmnt}}
            </div>
          </div>
@endforeach
</div>

</div>
 
@endsection

@section('footer')
 <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Blogging 2018</p>
      </div>

    </footer> 
@endsection