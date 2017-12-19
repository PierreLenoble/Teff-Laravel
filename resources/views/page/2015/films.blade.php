@extends('partial.2015.layout')

@php
$i=0;
@endphp

@section('menu')
    @include('partial.2015.menu')
@stop

@section('soutiens')
    @include('partial.2015.soutiens')
@stop

@section('footer')
    @include('partial.2015.footer')
@stop

@section('titre')
    TEFF - 2015 - HomePage
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_listeFilms.css"/>
@stop

@section('js')
@stop

@section('body')
     <table style="width:100%">
            <tr>
                <td style="width:33%;" align="center"><span style="width:220px; font-family: bebas; border:1px solid black; font-size:0.8em; padding:0px 10px;" id="Btn-LMMM">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'LMM')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</span></span></td>
                <td style="width:33%;" align="center"><span style="width:220px; font-family: bebas; border:1px solid black; font-size:0.8em; padding:0px 10px;" id="Btn-CM">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'CM')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</span></td>
                <td style="width:33%;" align="center"><span style="width:220px; font-family: bebas; border:1px solid black; font-size:0.8em; padding:0px 10px; " id="Btn-Tous">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'toutFilm')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</span></td>
            </tr>
        </table>
<div class="conteneurAllFilm grid">
    @foreach ($listeFilms as $film)
        @php
            $traduction = $film->traductions->where('initialLangue', $langueActuelle)->first() ;
            $content = html_entity_decode(strip_tags($traduction->resumeFilm));
            if (str_word_count($content, 0) > 25) {
                $words = str_word_count($content, 2);
                $pos = array_keys($words);
                $content = substr($content, 0, $pos[25]) . '...';
            }else{
                $content=$content;
            }
            
            switch ($film->interdictionAge) {
                case 12:
                    $imgInterdiction = '<img style="height:30px;" src="' . $path['image'] . 'interdit/12.jpg" >';
                    break;
                case 16:
                    $imgInterdiction = '<img style="height:30px;" src="' . $path['image'] . 'interdit/16.gif" >';
                    break;
                case 18:
                    $imgInterdiction = '<img style="height:30px;" src="' . $path['image'] . 'interdit/18.jpg" >';
                    break;
                default:    
                    $imgInterdiction = "";
                    break;
            }
            
            if ($traduction->lienVideo!="") {
                $imgVideo = $path['image']."/icone/annonce.png";
                $icone = '<img style="height:30px;" src="'.$imgVideo.'" alt="contient la bande de lancement"/>';
            } else {
                $icone='';
            }
            
            $class = "";
            $categorie = "";
            
            switch ($film->initialMetrage) {
                case "Clip" :
                    $class = "Clip";
                    $categorie = "Clip";
                    break;
                case "CM" :
                    $class = "CM";
                    $categorie = "Court métrage";
                    break;
                case "MM" :
                    $class = "MM";
                    $categorie = "Moyen métrage";
                    break;
                case "LM" :
                    $class = "LM";
                    $categorie = "Long métrage";
                    break;
            }
            
            if ($i == 0) {
                $cf = 1;
            } else {
                $cf = rand(0,1);
            }
            
            
    
        @endphp
        
        @if ($cf == 1)
            <div class="conteneurFilm1 grid-item" id="Film-{{$class}}-{{$i}} {{$categorie}}">
                <div style="position:relative; top:5px; left:5px; width:205px; height:420px; background-color: rgba(255,255,255,0.5);">
                    <div style="position:relative; top:5px; left:5px; width:195px;height:410px;">
                        <div style="position:relative;  width:195px; height:195px; background: url(&quot;{{$path['image']}}{{$film->urlImageFilm}}&quot;) no-repeat; background-size: 195px; background-position: 0px;">
                            <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box; box-sizing: border-box; border:1px solid black;width:195px; height:195px;">&nbsp;</div>
                            <div style="height:30px; position:absolute; bottom:0px; right:0px;">{!! $icone !!} {!! $imgInterdiction !!}</div>
                        </div>
                        <div style="margin-top:5px;color:darkred;font-size: 1em; font-family: bebas; padding-bottom: 3px; ">{!! str_replace(" ", "&nbsp; &nbsp;",$traduction->nomFilm) !!}</div>
                        <p style="font-family: bebas; color:black; font-size: 0.9em;  ">- {{$film->realisateur->nomRealisateur}} -</p>
                        <p style="padding-top:15px; color:black; font-size: 0.9em;  ">{{$content}}...</p>
                        <a class="buttonRedStyle" style="text-align:center; position:absolute; bottom:0px; width:193px;" href="{{$tabUrlBoutton[$film->idFilm]}}">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'btnVoir')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</a>
                    </div>
                </div>
            </div>
        
        @else
            <div class="conteneurFilm2 grid-item" id="Film-{{$class}}-{{$i}} {{$categorie}}">
                <div style="position:relative; top:5px; left:5px; height:205px; width:420px; background-color: rgba(255,255,255,0.5);">
                    <div style="position:relative; top:5px; left:5px; height:195px;width:410px;">
                        <div style="float:left; position:relative;  height:195px; width:195px; background: url(&quot;{{$path['image']}}{{$film->urlImageFilm}}&quot;) no-repeat; background-size: 195px; background-position: 0px">
                            <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box; box-sizing: border-box; border:1px solid black;width:195px; height:195px;">&nbsp;</div>
                            <div style="height:30px; position:absolute; bottom:0px; right:0px;">{!! $icone !!} {!! $imgInterdiction !!}</div>
                        </div>
                        <div style="position:relative; float:left; display:table; width:200px; height:197px; margin-left:5px">
                            <div style="color:darkred;font-size: 1em; font-family: bebas; padding-bottom: 3px; ">{!! str_replace(" ", "&nbsp; &nbsp;",$traduction->nomFilm) !!}</div>
                            <p style="font-family: bebas; color:black; font-size: 0.9em;  ">- {{$film->realisateur->nomRealisateur}} -</p>
                            <p style="padding-top:15px; color:black; font-size: 0.9em;  ">{{$content}}...</p>
                            <a class="buttonRedStyle" style="text-align:center; position:absolute; width:208px; bottom:0px; left:0px;" href="{{$tabUrlBoutton[$film->idFilm]}}" style="">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'btnVoir')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</a>
                        </div>
                         <div style="clear:left"></div>   
                    </div>
                </div>
            </div>
        @endif
        
        @php
            $i = $i + 1;
        @endphp
    @endforeach
</div>    
    @if ($i==0)
        <h1>il n'y a pas encore de film</h1>
    @endif

<script type="text/javascript" >
        
        var container = document.querySelector('.grid');
        
        
        var msnry = new Masonry( container, {
          itemSelector: '.grid-item',
          columnWidth: 215
        });
  
        function hideAllFilm(){
            $("div[id^='Film-']").css("display", "none");
        }
        
        function showAllFilm(){
            $("div[id^='Film-']").css("display", "block");
        }
        
        function setBtn(type){
            $("[id^='Btn-']").attr("class","buttonRedStyle");
            if (type==="CM" || type==="MM" || type==="LM" || type==="Clip" || type==="LMMM" || type==="Tous"){
                $("#Btn-"+type).attr("class","btnListeFilmTitre");
                hideAllFilm();
            }
        }
        
        $("#Btn-LMMM").click(function(e){
            setBtn("LMMM");
            $("div[id^='Film-LM']").css("display", "inline-table");
            $("div[id^='Film-MM']").css("display", "inline-table");
            msnry.layout(); 
        });
        
        $("#Btn-CM").click(function(e){
            setBtn("CM");
            $("div[id^='Film-CM']").css("display", "inline-table");
            msnry.layout();
        });
        
        $("#Btn-Tous").click(function(e){
            setBtn("Tous");
            showAllFilm();
            msnry.layout();
        });
        setBtn("Tous");
        showAllFilm();
        
        </script>
@stop