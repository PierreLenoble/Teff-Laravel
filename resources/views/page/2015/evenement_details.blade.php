@extends('partial.2015.layout')

@php
    $url = '';
    foreach($langues as $langue) {
        if ($langue['langue'] == $langueActuelle) {
            $url = $langue['url'];
        }
    }
    
    if (str_word_count($evenementTraduction->contenuArticle, 0) > 60) {
        $words = str_word_count($evenementTraduction->contenuArticle, 2);
        $pos = array_keys($words);
        $resumeEvenement = strip_tags(substr($evenementTraduction->contenuArticle, 0, $pos[60]) . '...');
    }else{
        $resumeEvenement=strip_tags($evenementTraduction->contenuArticle);
    }
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
    TEFF - 2015 - Détails de l'évènement "{{$evenementTraduction->titreArticle}}"
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
    


<div class="blockTitre">
    <div>
        <span class="nomFilm">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', $evenementTraduction->titreArticle) !!}</span><br>
    </div>
</div>

<div class="blockMain blockMainFilmDetail">
    <div class="divImgFilmDetail">
        <div style="position:relative;  width:195px; height:195px; background: url(&quot;{{$path['image']}}/{!! $evenement->urlImageArticle !!}&quot;) no-repeat; background-size: 195px; background-position: 0px;">
            <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box; box-sizing: border-box; border:1px solid black;width:195px; height:195px;">&nbsp;</div>
        </div>
        <br><br>
    </div>

    <div class="conteneurFilmDetail">
        <div class="row">
            {!! $evenementTraduction->contenuArticle !!}
        </div>
        <br><br>
        <a href="{{$url_archive_2015_evenements}}" class="buttonRedStyle" style="width:300px;">&lt;&lt;&nbsp;&nbsp;&nbsp;{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Retour aux evenement 2015") !!}</a>
            
    </div>
    <div style="clear:left"></div>
    
</div>
@stop

