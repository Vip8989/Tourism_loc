@foreach($items as $item)
     <!--подсветка активного пункта меню в css добавить для класса active подсветку  -->
<li {{ (URL::current() == $item->url ) ? "class=active" : '' }} >

<!--  путь конкретного пункта меню     -->
<a href="{{ $item->url()  }}">{{ $item->title  }}</a>
@if($item->hasChildren())

<ul class="sub-menu">
@include(env('THEME').'.customMenuItems', ['items'=>$item->children()])
</ul>

@endif
</li>
@endforeach