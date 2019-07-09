 <!--single-page-->

					 <!-- FONTs -->
					 
			

        <link href="{{ asset (env('THEME')) }}/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
				<link href="{{ asset (env('THEME')) }}/css/style.css" type="text/css" rel="stylesheet" media="all">
				
			<link rel="stylesheet" type="text/css" media="all" href="{{ asset (env('THEME')) }}/css/reset.css" /> <!-- RESET STYLESHEET -->
			<link rel="stylesheet" type="text/css" media="all" href="{{ asset (env('THEME')) }}/style.css" /> <!-- MAIN THEME STYLESHEET -->
<!--web-font-->
         <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
         <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
<!--//web-font-->
         <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
				<script src="{{ asset (env('THEME')) }}/js/bootstrap.js"></script>-->

       
				
				 <!-- JAVASCRIPTs -->
				 <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/comment-reply.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.quicksand.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.tipsy.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.cycle.min.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.anythingslider.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.eislideshow.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.easing.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.aw-showcase.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/layerslider.kreaturamedia.jquery-min.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/shortcodes.js"></script>
		<script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.colorbox-min.js"></script> <!-- nav -->
		<script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.tweetable.js"></script>
			<!--	<script type="text/javascript" src="{{ asset (env('THEME')) }}/js/myscripts.js"></script>-->
				

				<script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.custom.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/contact.js"></script>
        <script type="text/javascript" src="{{ asset (env('THEME')) }}/js/jquery.mobilemenu.js"></script> 
        
		<div class="col-md-4 single-page-right">

        <div class="single-page">
		     <div class="container">
		
		@if($article)
			<div class="col-md-8 single-page-left">
				<div class="single-page-info">
					<img src="{{ asset(env('THEME')) }}/images/articles/{{  $article->img->max }}"/>
					<h5>{{ $article->title }}</h5>
					<p> {!! $article->text !!}  </p>  
					
					<div class="comment-icons">
						<ul>
							<!--<li><span></span><a href="#">Lorem ipsum dolor sit consectetur</a> </li>-->
							<li><span class="clndr"></span>{{ $article->created_at->format('M') }}  {{ $article->created_at->format('d') }}</li>
							<li><span class="admin"></span>Posted by &nbsp;&nbsp <a href="#">{{ $article->user->name }}</a></li>
							<li><span class="cmnts"></span>In:&nbsp;&nbsp <a href="{{ route('articlesCat',['cat_alias'=>$article->category->alias]) }}">{{ $article->category->title }}</a></li>
							<li><a href="#comments" class="like">{{ count($article->comments) ? count($article->comments) : '0' }} {{Lang::choice('ru.comments',count($article->comments))}}</a></li>
						</ul>
					</div>
				</div>

			
 <!-- START COMMENTS -->
                   <div id="comments">
				                <h3 id="comments-title">
				                    <span>{{ count($article->comments) }}</span> 
														{{ Lang::choice('ru.comments',count($article->comments)) }}    
				                </h3>

				                @if(count($article->comments) > 0) 
				                @set($com,$article->comments->groupBy('parent_id'))
				                
				                <ol class="commentlist group">
				                
				                @foreach($com as $k => $comments)
				                	
				                	@if($k !== 0)
				                		@break
				                	@endif
				                	
				                	@include(env('THEME').'.comment',['items' => $comments])
				                	
				                @endforeach

				                </ol>
												@endif
                                
				                 <!-- START TRACKBACK & PINGBACK -->
												 <h2 id="trackbacks">Trackbacks and pingbacks</h2>
				                <ol class="trackbacklist"></ol>
				                <p><em>No trackback or pingback available for this article.</em></p>
                                
				                <!-- END TRACKBACK & PINGBACK -->								
				                <div id="respond">
				                    <h3 id="reply-title">Leave a <span>Reply</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
				                    <form action="{{ route('comment.store') }}" method="post" id="commentform">
				                        
				                        @if(!Auth::check())
					                        <p class="comment-form-author"><label for="author">Name</label> <input id="name" name="name" type="text" value="" size="30" aria-required="true" /></p>
					                        <p class="comment-form-email"><label for="email">Email</label> <input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p>
					                        <p class="comment-form-url"><label for="url">Website</label><input id="url" name="site" type="text" value="" size="30" /></p>
				                        @endif
				                        
				                        <p class="comment-form-comment"><label for="comment">Your comment</label><textarea id="comment" name="text" cols="45" rows="8"></textarea></p>
				                        <div class="clear"></div>
				                        <p class="form-submit">
				                        	
				                        	
				                        	{{ csrf_field() }}
				                        	<input id="comment_post_ID" type="hidden" name="comment_post_ID" value="{{ $article->id }}" />
				                        	<input id="comment_parent" type="hidden" name="comment_parent" value="0" />
				                            <input name="submit" type="submit" id="submit" value="Post Comment" />
				                        </p>
				                    </form>
				                </div>
				                <!-- #respond -->
				            </div>
				            <!-- END COMMENTS -->
				            
				            @endif
				        </div>
	<!--//single-page-->
	
	