
@if($menu)
<div class="menu classic">
   <ul id="nav" class="menu">
         @include(env('THEME').'.customMenuItems', ['items'=>$menu->roots()])
    </ul>
</div>
<!--{!! $menu->asUl()   !!} выводит все пункты меню из бд(в списке ul)-->
@endif


                                
                               