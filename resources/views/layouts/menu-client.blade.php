@foreach(App\confrm::tree() as $item)

    @if ($item['children']->count() <=  0)    
    <li><a>{{ $item->confrmttitl }}</a></li> 
    @else
    
    <li class="elementskit-dropdown-has">
        <a href="#">{{ $item->confrmttitl }}</a>
        <ul class="elementskit-dropdown elementskit-submenu-panel">
            @foreach($item['children'] as $child)
                @if($child->confrmyadmf == 0)
                    @if ($child['children']->count() <=  0)
                    <li><a>{{ $child->confrmttitl }}</a></li>
                    @else
                        <li class="elementskit-dropdown-has"><a href="#">{{ $child->confrmttitl }}</a>
                            @if($child->confrmyadmf == 0)
                            <ul class="elementskit-dropdown elementskit-submenu-panel">
                            @foreach($child['children'] as $child2)
                            <li><a>{{ $child2->confrmttitl }}</a></li>
                            @endforeach 
                            </ul>
                    @endif

                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </li>
@endif

@endforeach