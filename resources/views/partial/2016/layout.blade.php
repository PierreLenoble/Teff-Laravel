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
                <a href="/en/2016/uccle"><img src="{{$path['image']}}langues/en.png"></a>
            </div>
                
            <div class="dates" style="width:650px">
                <div class="date">
                    <span class="whiteText" style="font-size:1.7em">BRUXELLES</span><br><br><span style="font-size:1.3em">16-17/09/2016</span>
                </div>
                <div class="verticalLine"style="height:120px;"></div>
                <div class="lieux">
                    <span class="whiteText" style="font-size:1.7em">UCCLE</span><br>
                    <span style="font-size:1.7em">CENTRE<br>
                        CULTUREL</span>
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
    
        <!--script type="text/javascript" >
        window.onload = function () {
            $('body').css('height', '10000px');
            alert('ok');
        };
        </script-->
</html>