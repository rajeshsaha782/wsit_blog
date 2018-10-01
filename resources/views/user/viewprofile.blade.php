@extends('layout')



@section('contents')
	<div class="col-md-8">
		
    <br/><br/>
    <br/><br/>

		<div class="container-fluid" style="text-align: center;">

     <img style="margin-left: auto; margin-right: auto;"  class="d-flex rounded-circle" height="100" src="{{asset('user.png')}}" alt="">
    <h2>{{$user->name}}</h2>

    

    </div>

          <hr class="my-4">

          


<h6>Your Blogs</h6>
<div class="row">
    @foreach($blogs as $blog)
             

            <div class="row"style="max-width: 800px">  <!-- Blog blog -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title">{{$blog->title}}</h2>

                   @if(session('user')->id == $user->id)
                   <a  href="{{route('blog.edit',['id' => $blog->id])}}">Edit</a>
                   @endif
                   @if(session('user')->id == $user->id)
                   <a  href="{{route('blog.delete',['id' => $blog->id])}}">Delete</a>
                   @endif

                  <p style="text-align:justify;min-width: 700px"class="card-text">{{substr($blog->detail,0,200)}}</p>
                  <a href="{{route('blog.detail',['id' => $blog->id])}}" class="btn btn-outline-info">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                  {{$blog->name}}


                </div>
                   </div>  
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