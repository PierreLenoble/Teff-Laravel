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
<div class="blockTitre">
    <div>
        @php
            $traduction = $seance->traductions->where('initialLangue', $langueActuelle)->first() ;
        @endphp
        <span class="titreArticle">{!! str_replace(" ", "&nbsp; &nbsp;",$traduction->nomSeance) !!}</span><br>
        <span class="dateSeance">
            @php 
                $dateTime = new DateTime($seance->dateTimeSeance);
                $date = $dateTime->format('d-M-Y   H:i') . " -> " . $dateTime->modify('+'.$seance->dureeMinuteSeance.' minutes')->format('H:i');
            @endphp
            {!! str_replace(" ", "&nbsp; &nbsp;",$date) !!}</span><br>

            
    </div>
</div>

<div class="blockMain blockMainSeanceDetail">
    
<div class="conteneurAllFilm grid">
    @foreach ($listeFilms as $film)
        @php
            $traduction = $film->traductions->where('initialLangue', $langueActuelle)->first() ;
            $content = html_entity_decode(strip_tags($traduction->resumeFilm));
            if (str_word_count($content, 0) > 30) {
                $words = str_word_count($content, 2);
                $pos = array_keys($words);
                $content = substr($content, 0, $pos[30]) . '...';
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
        @endphp
        
        <div class="conteneurFilm1 grid-item" style="position:relative" >
                <div style="position:relative; top:5px; left:5px; width:205px; height:420px; background-color: rgba(255,255,255,0.5);">
                    <div style="position:relative; top:5px; left:5px; width:195px;height:410px;">
                        <div style="position:relative;  width:195px; height:195px; background: url(&quot;{{$path['image']}}{{$film->urlImageFilm}}&quot;) no-repeat; background-size: 195px; background-position: 0px;">
                            <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box; box-sizing: border-box; border:1px solid black;width:195px; height:195px;">&nbsp;</div>
                            <div style="height:30px; position:absolute; bottom:0px; right:0px;">{!! $icone !!} {!! $imgInterdiction !!}</div>
                        </div>
                        <div style="color:darkred;font-size: 1em; font-family: bebas ">{!! str_replace(" ", "&nbsp; &nbsp;",$traduction->nomFilm) !!}</div>
                        <p style="font-family: bebas; color:black; font-size: 0.9em;  ">- {{$film->realisateur->nomRealisateur}} -</p>
                        <p style="padding-top:15px; color:black; font-size: 0.9em;  ">{{$content}}...</p>
                        <a class="buttonRedStyle" style="text-align:center; position:absolute; bottom:0px; width:193px;" href="{{$tabUrlBoutton[$film->idFilm]}}">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;","voir fiche") !!}</a>
                    </div>
                </div>
            </div>
        
        
        
        
    @endforeach
</div></div>

<script type="text/javascript" >
        
        var container = document.querySelector('.grid');
        
        
        var msnry = new Masonry( container, {
          itemSelector: '.grid-item',
          columnWidth: 215
        });
  
        
        showAllFilm();
        
        </script>
@stop