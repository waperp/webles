@foreach(App\confrm::tree() as $item)

    @if ($item['children']->count() <=  0)    
        @if ($item->confrmscode == 0)
        <li><a href="/">{{ $item->confrmttitl }}</a></li> 
        @else
        <li><a>{{ $item->confrmttitl }}</a></li> 
        @endif
    @else
    <li class="elementskit-dropdown-has">
        <a href="#menu-{{ Str::slug($item->confrmttitl) }}">{{ $item->confrmttitl }}</a>
        <ul class="elementskit-dropdown elementskit-submenu-panel">
            @foreach($item['children'] as $child)
                @if($child->confrmyadmf == 0)
                    @if ($child['children']->count() <=  0)
                    @if ($child->contypscode == 3)
                    <li><a href="#services-form-section" onclick="menu_servicio({{ $child->confrmscode }})"><i class="{{ $child->confrmvsmai }}"></i>{{ $child->confrmttitl }}</a></li>
                    @else
                    <li><a href="#menu-{{ Str::slug($child->confrmttitl) }}"><i class="{{ $child->confrmvsmai }}"></i>{{ $child->confrmttitl }}</a></li>
                    @endif
                    @else
                        <li class="elementskit-dropdown-has"><a href="#"><i class="{{ $child->confrmvsmai }}"></i>{{ $child->confrmttitl }}</a>
                            @if($child->confrmyadmf == 0)
                            <ul class="elementskit-dropdown elementskit-submenu-panel">
                            @foreach($child['children'] as $child2)
                            <li><a href="#menu-{{ Str::slug($child2->confrmttitl) }}"><i class="{{ $child2->confrmvsmai }}"></i>{{ $child2->confrmttitl }}</a></li>
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