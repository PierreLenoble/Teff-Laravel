<html>
    <head>
        <title>@yield('titre')</title>
        <meta charset="UTF-8">
        @yield('css')
        <link rel="stylesheet" href="{{$path['css']}}red_reset.css" media="screen" />
        <link rel="stylesheet" href="{{$path['css']}}red_style.css" media="screen" />
        <link rel="stylesheet" href="{{$path['css']}}red_styleXXL.css" media="screen and (min-width: 1400px)"  />
        
        <script type="text/javascript" src="{{$path['js']}}jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="{{$path['js']}}red_background.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
        
    @yield('js')
    </head>
    @php
        $img = "background/Fond" . rand(1, 3) .".jpg";
    @endphp
    <body style="background-image: url('{{$path['image']}}{{$img}}');">
        <div class="header">
            <div class="drapeau">
                @php $isFirst = 1; @endphp
                @foreach ($langues as $langue)
                    @if ($isFirst == 1)
                        <?php /**/ $isFirst = 0 /**/ ?>
                    @else
                        &nbsp;-&nbsp;
                    @endif
                    
                    @if ($langueActuelle == $langue['langue'])
                        {{ $langue['langue'] }}
                    @else
                        <a href = "{{$langue['url']}}">{{ $langue['langue'] }}</a>
                    @endif
                @endforeach
            </div>
                
            <div class="dates2016" style="width:650px">
                <div class="date">
                    <span class="whiteText" style="font-size:1.7em">BRUXELLES</span><br><br><span style="font-size:1.3em">16-17/09/2016</span>
                </div>
                <div class="verticalLine"style="height:120px;"></div>
                <div class="lieux">
                    <span class="whiteText" style="font-size:1.7em">UCCLE</span><br>
                    <span style="font-size:1.7em">CENTRE<br>
                        CULTUREL</span>
                </div>
                <div style="position:absolute; right:-5px; top:65px;width:200px; height:100px;transform:rotate(40deg);-ms-transform:rotate(30deg); /* Internet Explorer */-moz-transform:rotate(30deg); /* Firefox */-webkit-transform:rotate(30deg); /* Safari et Chrome */-o-transform:rotate(30deg); /* Opera */">
                    <div style="position:relative; top:0px; height:3px; width:200px;background-color:white; font-size:1px">&bnsp;</div>
                    <div style="position:relative; top:0px; height:50px; width:200px; font-size:2.5em; color:white; font-weight:bold"><centre>&nbsp;BEST OF</centre></div>
                    <div style="position:relative; top:-10px; height:3px; width:200px;background-color:white; font-size:1px">&bnsp;</div>
                    <div style="position:relative; top:-10px; font-size:2em; color:white;">12 SEANCES</div>
                </div>
            </div>
        </div>
        <div class="menu">
            @yield('menu')
        </div>
        <div class="page">
            <div style="float:none; padding:0px; display: block; min-width:480px;">
                @yield('body')  
                @yield('soutiens')
                @yield('footer')
            </div>
        </div>
    </body>
</html>
