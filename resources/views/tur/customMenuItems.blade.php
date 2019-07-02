@foreach($items as $item)
<li>

<!--  путь конкретного пункта меню     -->
<a href="{{ $item->url()  }}">{{ $item->title  }}</a>
@if($item->hasChildren())

<ul class="sub-menu">
@include(env('THEME').'.customMenuItems', ['items'=>$item->children()]);
</ul>

@endif
</li>
@endforeach