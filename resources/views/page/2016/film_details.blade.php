@extends('partial.2016.layout')

@php
    $url = '';
    foreach($langues as $langue) {
        if ($langue['langue'] == $langueActuelle) {
            $url = $langue['url'];
        }
    }
    
    if (str_word_count($filmTraduction->resumeFilm, 0) > 60) {
        $words = str_word_count($filmTraduction->resumeFilm, 2);
        $pos = array_keys($words);
        $resumeFilm = strip_tags(substr($filmTraduction->resumeFilm, 0, $pos[60]) . '...');
    }else{
        $resumeFilm=strip_tags($filmTraduction->resumeFilm);
    }
    
    $paysStr = '';
    foreach($pays as $enrPays) {
        $paysStr .= $enrPays . " - ";
    }
    $paysStr = substr($paysStr, 0,strlen($paysStr) - 3);
    
    
    $genresStr = '';
    foreach($genres as $enrGenre) {
        $genresStr .= $enrGenre . " - ";
    }
    $genresStr = substr($genresStr, 0,strlen($genresStr) - 3);
    
    
@endphp

@section('menu')
    @include('partial.2016.menu')
@stop

@section('soutiens')
    @include('partial.2016.soutiens')
@stop

@section('footer')
    @include('partial.2016.footer')
@stop

@section('titre')
    TEFF 2016 - Uccle
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
    <meta property="og:url"           content="{{ $url }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{!! $filmTraduction->nomFilm !!}" />
    <meta property="og:description"   content="{!! $resumeFilm !!}" />
    <meta property="og:image"         content="{!! $film->urlImageFilm !!}" />
@stop

@section('menu')
    @include('partial.2016.menu')
@stop

@section('soutiens')
    @include('partial.2016.soutiens')
@stop

@section('footer')
    @include('partial.2016.footer')
@stop

@section('body')
<div class="blockTitre">
    <div>
        <span class="nomFilm">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', $filmTraduction->nomFilm) !!}</span><br>
        <span class="realisateurFilm">- {!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', $realisateur->nomRealisateur) !!} -</span>
    </div>
</div>
<div class="blockMain blockMainFilmDetail">
    <div class="divImgFilmDetail">
        <div style="position:relative;  width:195px; height:195px; background: url(&quot;{{$path['image']}}{!! $film->urlImageFilm !!}&quot;) no-repeat; background-size: 195px; background-position: 0px;">
            <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box; box-sizing: border-box; border:1px solid black;width:195px; height:195px;">&nbsp;</div>
        </div>
            <div class="fb-share-button" data-href="{{$url}}" data-type="button_count"></div>
        <br><br>
    </div>
    <div class="conteneurFilmDetail">
        <div class="row">
            <span class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', 'Production : ') !!}</span>
            <div class="contenu">{{$film->boiteProduction}}</div>
        </div>
        <div class="row">
            <span class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', 'Pays : ') !!}</span>
            <div class="contenu">{{$paysStr}}</div>
        </div>
        <div class="row">
            <span class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', 'Annee : ') !!}</span>
            <div class="contenu">{{$film->anneeProduction}}</div>
        </div>
        <div class="row">
            <span class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', 'Duree : ') !!}</span>
            <div class="contenu">{{$film->  dureeMinuteFilm}} minutes</div>
        </div>
        <div class="row">
            <span class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', 'Genre : ') !!}</span>
            <div class="contenu">{{$genresStr}}</div>
        </div>
        @if ($imgInterdit != "")
            <div class="row">
                <span class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', 'Recommandation : ') !!}</span>
                <div class="contenu">{!!$imgInterdit!!}</div>
            </div>
        @endif
        
    </div>
    <div style="clear:left;"></div>
    <div class="titreSynopsis">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', 'Synopsis : ') !!}</div>
    {!!$resumeFilm!!}
</div>

@if ($filmTraduction->lienVideo != "")
<div class="blockVideo espaceBlock">

    <center><iframe src="{{$filmTraduction->lienVideo}}" allowfullscreen=""  frameborder="0"  padding="0" style="width:100%; height:500px;"></iframe></center>

</div>
@endif

<div class="blockMain espaceBlock">
    <div class="titreBlock">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', 'A propos du realisteur : ') !!}</div>
    <img src="{{$path['image']}}{{$realisateur->urlImageRealisateur}}" class="imgRealisateur" alt="Realisateur : {{$realisateur->nomRealisateur}}">
    {!! $realisateurTraduction->presentationRealisateur !!}
    <div style="clear:left;"></div>
</div>

@stop

