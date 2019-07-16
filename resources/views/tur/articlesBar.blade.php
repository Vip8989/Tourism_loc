
    <div class="blog">
		<div class="container">


<div class="col-md-4 single-page-right">

<div class="category blog-ctgry">
					
          </div>
					
				<div class="recent-posts">
        <h4>{{ Lang::get('ru.latest_projects') }}</h4>

        <div class="recent-posts-info">
          @if(!$portfolios->isEmpty())
				      @foreach($portfolios as $portfolio)

             

              <div class="posts-left sngl-img">

              <!-- style="width:55px" изменение размера изображения  -->
							<a href="#"> <img style="width:150px; height:175px"  src="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->mini }}"  class="img-responsive zoom-img" alt=""/> </a>
						</div>

						<div class="posts-right">
							<lable>#</lable>
							<h5><a href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}">{{ $portfolio->title }}</a></h5>

							<p>{{ str_limit($portfolio->text,130) }}</p>
							<a href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}" class="btn btn-primary hvr-rectangle-in">{{ Lang::get('ru.read_more') }}</a>
						</div>

						<div class="clearfix"> </div>
				

              @endforeach
              @endif

						  </div>	
      	</div>



				<!--	<div class="recent-posts-info">
						<div class="posts-left sngl-img">
							<a href="singlepage.html"> <img src="images/img17.jpg" class="img-responsive zoom-img" alt=""/></a>
						</div>
						<div class="posts-right">
							<lable>MARCH 1, 2015</lable>
							<h5><a href="singlepage.html">FINIBUS BONORUM MALORUM </a></h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing incididunt.</p>
							<a href="singlepage.html" class="btn btn-primary hvr-rectangle-in">Read More</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>-->
			
         
					@if(!$comments->isEmpty())
				<div class="comments">
					<h4>{{ Lang::get('ru.latest_comments') }}</h4>
					<div class="comments-info">

					@foreach($comments as $comment)

						<div class="cmnt-icon-left">
						@set($hash, ($comment->email) ? md5($comment->email) : $comment->user->email)
						<img  alt="" src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=64" class="avatar" /> 
						</div>

						<div class="cmnt-icon-right">
						
							<p></p>
							
							<p><a href="#">{{ isset($comment->user) ? $comment->user->name : $comment->name}}</a></p>
						</div>
						<div class="clearfix"> </div>

						<a class="title" href="{{ route('articles.show',['alias' => $comment->article->alias]) }}">
						{{ $comment->article->title }}</a>

						<p class="cmmnt"> {{ $comment->text }}  <a 
						 href="{{ route('articles.show',['alias' => $comment->article->alias]) }}">&#187;</a> 
						 </p>
						 
					</div>
					@endforeach

          </div>
      </div>
			@endif

					
      
      
			
			
			