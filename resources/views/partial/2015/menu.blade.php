@foreach ( $menu as $menuItem)
    <a id="menu-{{ $menuItem["name"] }}" href="{{ $menuItem["url"] }}" class="menuBtn shadow overGlow">{{ $menuItem["name"] }}</a>
    @if ($menuItem["name"] == "Archives" and isset($menuArchive))
        @foreach ( $menuArchive as $menuArchiveItem)
    <a id="menu-{{ $menuArchiveItem["name"] }}" href="{{ $menuArchiveItem["url"] }}" class="menuArchiveBtn shadow overGlow">{{ $menuArchiveItem["name"] }}</a>
        @endforeach
    @endif
@endforeach
<a href="http://www.facebook.com/extraordinaryfestival" target="_blank" class="menuBtn shadow">&nbsp;<img src="{{$path['image']}}followUs/facebook.jpg">&nbsp;</a>
<a href="https://twitter.com/TEFFFESTIVAL" target="_blank" class="menuBtn shadow">&nbsp;<img src="{{$path['image']}}followUs/twitter.jpg">&nbsp;</a>
<a href="https://www.youtube.com/channel/UCjd2kSVsGgXnoowSDJjd6hA" target="_blank" class="menuBtn shadow">&nbsp;<img src="{{$path['image']}}followUs/youtube.jpg">&nbsp;</a>
