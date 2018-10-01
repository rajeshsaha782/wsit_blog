@extends('layout')



@section('contents')

            

	<div class="col-lg-8" >
          

          <form method="post" class="form-signin">
               {{csrf_field()}}

          <hr/><hr/><hr/>
          <h1 class="mt-4"><input type="text" name="title" value="{{$blog->title}}"></h1>

          
            
          <p class="lead">
            by

            {{$blog->name}}
            
          </p>

          <hr>

          
<div class="row" style="max-width: 800px">  <!-- Blog Post -->
              <div class="col-md-12">
               <div class="card mb-4">
                <div class="card-body">
                 
                  <textarea name="detail" rows="5" cols="90">{{$blog->detail}}</textarea>
               
                </div>
                
                   </div>  
                 </div>
            </div>
<button type="submit" class="btn btn-success">Save Changes</button>
</form>

 <h4>Comments</h4><hr/>

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