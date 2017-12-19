@foreach ( $menu as $menuItem)
    <a href="{{ $menuItem["url"] }}" class="menuBtn shadow overGlow">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;", $menuItem["name"]) !!}</a>
    @if ($menuItem["name"] == $commonTrad->clePages()->where('nomClePage', 'menu_Archives')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage and isset($menuArchive))
        @foreach ( $menuArchive as $menuArchiveItem)
    <a href="{{ $menuArchiveItem["url"] }}" class="menuArchiveBtn shadow overGlow">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;", $menuArchiveItem["name"]) !!}</a>
        @endforeach
    @endif
@endforeach
<a href="http://www.facebook.com/extraordinaryfestival" target="_blank" class="menuBtn shadow">&nbsp;<img src="{{$path['image']}}followUs/facebook.jpg">&nbsp;</a>
<a href="https://twitter.com/TEFFFESTIVAL" target="_blank" class="menuBtn shadow">&nbsp;<img src="{{$path['image']}}followUs/twitter.jpg">&nbsp;</a>
<a href="https://www.youtube.com/channel/UCjd2kSVsGgXnoowSDJjd6hA" target="_blank" class="menuBtn shadow">&nbsp;<img src="{{$path['image']}}followUs/youtube.jpg">&nbsp;</a>
