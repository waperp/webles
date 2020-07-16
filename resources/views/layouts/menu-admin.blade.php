@foreach(App\confrm::treeAdmin() as $item)
    @if ($item['children']->count() <= 0)
        @if ($item->confrmscode == 0)
            <li><a href="/">{{ $item->confrmttitl }}</a></li>
        @else
            @if ($item->contypscode == 0)
                <li><a href="#menu-{{ Str::slug($item->confrmttitl) }}">{{ $item->confrmttitl }}</a></li>
            @elseif($item->contypscode == 1)
                <li><a data-toggle="modal" data-target="#modal-{{ Str::slug($item->confrmttitl) }}">{{ $item->confrmttitl }}</a></li>
            @endif
        @endif
    @else
    <li class="elementskit-dropdown-has">
        @if ($item->contypscode == 0)
            @if ($item->confrmyadmf == 1)
            <a class="admin-menu-color" href="#menu-{{ Str::slug($item->confrmttitl) }}"> {{ $item->confrmttitl }}</a>
            @elseif($item->confrmyadmf == 0)
            <a href="#menu-{{ Str::slug($item->confrmttitl) }}"> {{ $item->confrmttitl }}</a>

            @endif

        @elseif($item->contypscode == 1)
            @if ($item->confrmyadmf == 1)
            <li><a class="admin-menu-color" data-toggle="modal" data-target="#modal-{{ Str::slug($item->confrmttitl) }}">{{ $item->confrmttitl }}</a></li>

            @elseif($item->confrmyadmf == 0)

            <li><a data-toggle="modal" data-target="#modal-{{ Str::slug($item->confrmttitl) }}">{{ $item->confrmttitl }}</a></li>

            @endif

        @endif
        <ul class="elementskit-dropdown elementskit-submenu-panel">
            @foreach($item['children'] as $child)

                @if ($child['children']->count() <= 0)
                    @if ($child->contypscode == 0)
                    <li class="@if ($child->confrmbhigh) 'highligth_menu' @endif">
                        <a href="#menu-{{Str::slug($child->confrmttitl) }}" >
                            <i class="{{ $child->confrmvsmai }}"></i>{{ $child->confrmttitl }}</a>
                        </li>
                    @elseif($child->contypscode == 1)
                    <li class="@if ($child->confrmbhigh) 'highligth_menu' @endif" style="@if ($loop->iteration == 2) border-bottom: 1px solid #1cb89d @endif">
                        <a data-toggle="modal" data-target="#modal-{{ Str::slug($child->confrmttitl) }}">
                            <i class="{{ $child->confrmvsmai }}"></i>{{ $child->confrmttitl }}</a>
                    </li>
                    @elseif($child->contypscode == 3)
                    <li class="@if ($child->confrmbhigh) 'highligth_menu' @endif">
                        <a href="#services-form-section" onclick="menu_servicio({{ $child->confrmscode }})">
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
