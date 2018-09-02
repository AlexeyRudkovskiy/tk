<ul @isset($classes) class="{{ implode(' ', $classes) }}" @endif>
    @foreach($menu->items ?? [] as $item)
    @php($item = $menu->getLinkInfo($item))
    <li><a href="{{ $item['url'] }}">{{ $item['text'] }}</a></li>
    @endforeach
</ul>