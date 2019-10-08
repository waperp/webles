@foreach(App\confrm::treeAdmin() as $item)
@if ($item['children']->count() <= 0) <li><a>{{ $item->confrmttitl }}</a></li>
    @else
    <li class="elementskit-dropdown-has">
        <a href="#menu-{{ Str::slug($item->confrmttitl) }}">{{ $item->confrmttitl }}</a>
        <ul class="elementskit-dropdown elementskit-submenu-panel">
            @foreach($item['children'] as $child)
            @if ($child['children']->count() <= 0) 
            <li><a href="#menu-{{Str::slug($child->confrmttitl) }}"> {{ $child->confrmttitl }}</a>
    </li>
    @else
    <li class="elementskit-dropdown-has"><a href="#">{{ $child->confrmttitl }}</a>
        <ul class="elementskit-dropdown elementskit-submenu-panel">
            @foreach($child['children'] as $child2)
            <li><a href="#menu-{{ Str::slug($child2->confrmttitl) }}">{{ $child2->confrmttitl }}</a></li>
            @endforeach
        </ul>
    </li>
    @endif
    @endforeach
    </ul>
    </li>
    @endif
    @endforeach