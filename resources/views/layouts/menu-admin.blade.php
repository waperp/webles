@foreach(App\confrm::treeAdmin() as $item)
    @if ($item['children']->count() <= 0)
        @if ($item->contypscode == 0)
            <li><a href="#menu-{{ Str::slug($item->confrmttitl) }}">{{ $item->confrmttitl }}</a></li>
        @elseif($item->contypscode == 1)
            <li><a data-toggle="modal" data-target="#modal-{{ Str::slug($item->confrmttitl) }}">{{ $item->confrmttitl }}</a></li>
        @endif
    @else
    <li class="elementskit-dropdown-has">
        @if ($item->contypscode == 0)
            <a href="#menu-{{ Str::slug($item->confrmttitl) }}"> {{ $item->confrmttitl }}</a>
        @elseif($item->contypscode == 1)
            <li><a data-toggle="modal" data-target="#modal-{{ Str::slug($item->confrmttitl) }}">{{ $item->confrmttitl }}</a></li>
        @endif
        <ul class="elementskit-dropdown elementskit-submenu-panel">
            @foreach($item['children'] as $child)
                @if ($child['children']->count() <= 0) 
                    @if ($child->contypscode == 0)
                    <li>
                        <a href="#menu-{{Str::slug($child->confrmttitl) }}"> 
                            <i class="{{ $child->confrmvsmai }}"></i>{{ $child->confrmttitl }}</a>
                        </li>
                    @elseif($child->contypscode == 1)
                    <li>
                        <a data-toggle="modal" data-target="#modal-{{ Str::slug($child->confrmttitl) }}"> 
                            <i class="{{ $child->confrmvsmai }}"></i>{{ $child->confrmttitl }}</a>
                    </li>
                    @endif
                @else
                    <li class="elementskit-dropdown-has">
                        <a href="#"><i class="{{ $child->confrmvsmai }}"></i>{{ $child->confrmttitl }}</a>

                        <ul class="elementskit-dropdown elementskit-submenu-panelelementskit-dropdown">
                            @foreach($child['children'] as $child2)
                            <li><a href="#menu-{{ Str::slug($child2->confrmttitl) }}">
                                <i class="{{ $child2->confrmvsmai }}"></i>{{ $child2->confrmttitl }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </li>
    @endif
    @endforeach