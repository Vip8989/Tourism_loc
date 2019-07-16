
  <div class="widget-first widget recent-posts">
				            
				            @if($articles)
				             	<h3>{{ trans('ru.news')}}</h3>
				             	<div class="recent-post group">
				            	
				            		@foreach($articles as $article)
				            			
				            			<div class="hentry-post group">
					                        <div class="thumb-img">
                                  <img src="{{asset(env('THEME'))}}/images/articles/{{ $article->img->mini }}" alt="001" title="001" /></div>
					                        <div class="text">
					                            <a href="{{ route('articles.show',['alias'=>$article->alias]) }}" 
                                      title="Section shortcodes &amp; sticky posts!" class="title">{{ $article->title }}</a>
					                            <p class="post-date">{{ $article->created_at->format('F d, Y') }}</p>
					                        </div>
					                    </div>
				            			
				            		@endforeach
				            	
				            	</div>
				            @endif

				            
				            <div class="widget-last widget text-image">
				                <h3>Контактная информация</h3>
				                <div class="text-image" style="text-align:left">
                        <img src="{{asset(env('THEME'))}}/images/callus.gif" alt="Customer support" /></div>
				                <p> Location: Gomel, 115 Avenue street - Sovetskaya </p>
												<p>График работы:понедельник - пятница - с 09:00 до 19:00  Суббота с 11:30 до 15:00,</p>
                        <p>Выходные: Воскресенье (работаем по предварительной договоренности с туристами в воскресенье)</p>
				            </div>
				            
				        


