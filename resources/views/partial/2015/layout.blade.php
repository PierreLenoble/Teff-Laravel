<html>
    <head>
        <title>@yield('titre')</title>
        <meta charset="UTF-8">
        @yield('css')
        <link rel="stylesheet" href="{{$path['css']}}red_reset.css" media="screen" />
        <link rel="stylesheet" href="{{$path['css']}}red_style.css" media="screen" />
        <link rel="stylesheet" href="{{$path['css']}}red_styleXXL.css" media="screen and (min-width: 1400px)"  />
        <link rel="stylesheet" href="{{$path['css']}}red_styleXL.css" media="screen and (max-width: 1399px)"  />
        <link rel="stylesheet" href="{{$path['css']}}red_styleL.css" media="screen and (max-width: 967px)"  />
        <link rel="stylesheet" href="{{$path['css']}}red_styleM.css" media="screen and (max-width: 650px)"  />
        <link rel="stylesheet" href="{{$path['css']}}red_styleS.css" media="screen and (max-width: 497px)"  />
        
        <script type="text/javascript" src="{{$path['js']}}jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="{{$path['js']}}red_background.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
        
    @yield('js')
    </head>
    <body style="background-image: url('{{$path['image']}}background/Fond1.jpg');">
        <div class="header">
            <div class="drapeau">
                <?php /**/ $isFirst = 1 /**/ ?>
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
            <div class="edition">3<div>eme</div> EDITION</div>
                             
            <div class="dates" style="width:650px">
                <div class="date">
                    10/11/2015<br><br><br><br><br><br><span class="whiteText">11 > 15/11/2015</span>
                </div>
                <div class="verticalLine"></div>
                <div class="lieux">
                    BRUXELLES<br>LIEGE<br>MONS<br>CHARLEROI<br>LIBRAMONT<br><br><span class="whiteText">NAMUR</span>
                </div>
            </div>
          </div>  
            <div class="citation"><div class="block"><img src="{{$path['image']}}citations/citation2.png"></div> </div>   
        
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
    
        <!--script type="text/javascript" >
        window.onload = function () {
            $('body').css('height', '10000px');
            alert('ok');
        };
        </script-->
</html>
