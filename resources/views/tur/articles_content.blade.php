<!--blog-->

  <!-- FONTs -->

        <link href="{{ asset (env('THEME')) }}/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="{{ asset (env('THEME')) }}/css/style.css" type="text/css" rel="stylesheet" media="all">
<!--web-font-->
         <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
         <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
<!--//web-font-->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 

       <script src="{{ asset (env('THEME')) }}/js/bootstrap.js"></script>

       <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<!-- js -->
<!-- //js -->	
<!-- start-smoth-scrolling-->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset (env('THEME')) }}/css/reset.css" /> <!-- RESET STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset (env('THEME')) }}/style.css" /> <!-- MAIN THEME STYLESHEET -->
        
        
<div class="blog">

       
		<div class="container">
			
			<div class="col-md-8 blog-left" >
     
      @if($articles)

        @foreach($articles as $article)

        <div class="blog-info">


				 <p><h4><a href="{{ route('articles.show',['alias'=>$article->alias]) }}">{{ $article->title }}</a></h4>

        <span class="day">{{ $article->created_at->format('d') }}</span>
        <span class="month"> {{ $article->created_at->format('M') }} </span>
        <span class="day">{{ $article->created_at->format('y') }}</span>&nbsp;&nbsp;
					  
            Posted by &nbsp;&nbsp <a href="#"{{ $article->user->name }}> {{ $article->user->name }} </a> &nbsp;&nbsp;
           <span>In: 
            <a href="{{ route('articlesCat',['cat_alias' => $article->category->alias]) }}" 
            title="View all posts in {{ $article->category->title }}" 
            rel="category tag">{{ $article->category->title }}</a></span>&nbsp;&nbsp
             
            <span><a href="{{ route('articles.show',['alias'=>$article->alias]) }}#respond" 
            title="Comment on Section shortcodes &amp; 
            sticky posts!">{{ count($article->comments) ? count($article->comments) : '0' }} {{ Lang::choice('ru.comments',count($article->comments)) }}
            </a></span>
            </Posted>
            </p>
    

					<div class="blog-info-text">
						<div class="blog-img">
	<a href="#"> <img src="{{ asset(env('THEME')) }}/images/articles/{{ $article->img->max }}" class="img-responsive zoom-img" alt="01"/></a>
						</div>


						<p class="snglp"> {!! $article->desc !!} </p>

						<a href="{{ route('articles.show',['alias' => $article->alias]) }}"
             class="btn btn-primary hvr-rectangle-in">> {{ Lang::get('ru.read_more') }}</a>
					</div>

         <!-- <div class="clear"></div> -->
				</div>


        @endforeach
      

      <!--  Постраничная навигация  -->
      <div class="general-pagination group">

     @if($articles->lastPage() > 1) 
				            		
				            		@if($articles->currentPage() !== 1)
				            			<a href="{{ $articles->url(($articles->currentPage() - 1)) }}">{{ Lang::get('pagination.previous') }}</a>
				            		@endif
				            		
				            		@for($i = 1; $i <= $articles->lastPage(); $i++)
				            			@if($articles->currentPage() == $i)
				            				<a class="selected disabled">{{ $i }}</a>
				            			@else
				            				<a href="{{ $articles->url($i) }}">{{ $i }}</a>
				            			@endif		
				            		@endfor
				            		
				            		@if($articles->currentPage() !== $articles->lastPage())
				            			<a href="{{ $articles->url(($articles->currentPage() + 1)) }}">{{ Lang::get('pagination.next') }}</a>
				            		@endif
				            		
				            	
				            	@endif
      
      </div>

      @else
			
				{!! Lang::get('ru.articles_no') !!}
			
    @endif
	</div>	


	<!--//blog-->
	
	
	
	