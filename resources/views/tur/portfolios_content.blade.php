
        <link href="{{ asset (env('THEME')) }}/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="{{ asset (env('THEME')) }}/css/style.css" type="text/css" rel="stylesheet" media="all">
<!--web-font-->
         <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
         <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
<!--//web-font-->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 

       <script src="{{ asset (env('THEME')) }}/js/bootstrap.js"></script>

			 

     
        <!-- CSSs -->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset (env('THEME')) }}/css/reset.css" /> <!-- RESET STYLESHEET -->
       
			    
<div class="tour">
		<div class="container">
			<div class="tesimonial"><h3>Tours</h3></div>

			@if($portfolios)     
		
		
			<div class="row tour-info">	

			@foreach($portfolios as $portfolio) 
			<div class="col-sm-6 col-md-4 tour-grids">
		
					<div class="thumbnail">
						<a href="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->path }}" title="">
							<img src="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->max }}" class="img-responsive zoom-img " alt="">				
						</a>
						<div class="caption tour-caption">
							<h3><a href="{{ route('portfolios.show',['alias' => $portfolio->alias]) }}">{{ $portfolio->title }}</a></h3>
							<p></p>				
						</div>
					</div>
				</div>

		
				@endforeach

			  <!--  Постраничная навигация  -->
				<div class="general-pagination group">

@if($portfolios->lastPage() > 1) 
									 
									 @if($portfolios->currentPage() !== 1)
										 <a href="{{ $portfolios->url(($portfolios->currentPage() - 1)) }}">{{ Lang::get('pagination.previous') }}</a>
									 @endif
									 
									 @for($i = 1; $i <= $portfolios->lastPage(); $i++)
										 @if($portfolios->currentPage() == $i)
											 <a class="selected disabled">{{ $i }}</a>
										 @else
											 <a href="{{ $portfolios->url($i) }}">{{ $i }}</a>
										 @endif		
									 @endfor
									 
									 @if($portfolios->currentPage() !== $portfolios->lastPage())
										 <a href="{{ $portfolios->url(($portfolios->currentPage() + 1)) }}">{{ Lang::get('pagination.next') }}</a>
									 @endif
								 @endif
 </div>
 @else
 
	 {!! Lang::get('ru.articles_no') !!}
 
@endif
	<div class="clear"> </div>

	</div>
	</div> 
	</div>		
				
					               				
			
				
			
		
	

		
			
				
					