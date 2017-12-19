@extends('partial.2015.layout')

@php
    $url = '';
    foreach($langues as $langue) {
        if ($langue['langue'] == $langueActuelle) {
            $url = $langue['url'];
        }
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
    
    $imgInterdit = '';
    switch ($film->interdictionAge) {
        case "12" : $imgInterdit = '<img src="' . $path['image'] . 'interdit/12.jpg'.'" style= "width:25px; vertical-align: text-top"/>';  break;
        case "16" : $imgInterdit = '<img src="' . $path['image'] . 'interdit/16.gif'.'" style= "width:25px; vertical-align: text-top"/>';  break;
        case "18" : $imgInterdit = '<img src="' . $path['image'] . 'interdit/18.jpg'.'" style= "width:25px; vertical-align: text-top"/>';  break;
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
    TEFF 2015 - Details du film "{{$filmTraduction->nomFilm}}"
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
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
        <br><br>
    </div>
    <div class="conteneurFilmDetail">
        <div class="row">
            <span class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'production')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ") !!}</span>
            <div class="contenu">{{$film->boiteProduction}}</div>
        </div>
        <div class="row">
            <span class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'pays')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ") !!}</span>
            <div class="contenu">{{$paysStr}}</div>
        </div>
        <div class="row">
            <span class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'annee')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ") !!}</span>
            <div class="contenu">{{$film->anneeProduction}}</div>
        </div>
        <div class="row">
            <span class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'duree')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ") !!}</span>
            <div class="contenu">{{$film->dureeMinuteFilm}}'</div>
        </div>
        <div class="row">
            <span class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'genre')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ") !!}</span>
            <div class="contenu">{{$genresStr}}</div>
        </div>
        @if ($imgInterdit != "")
            <div class="row">
                <span class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'recommandation')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ") !!}</span>
                <div class="contenu">{!!$imgInterdit!!}</div>
            </div>
        @endif
        <div class="row">
            <span class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'seance')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ") !!}</span>
            <div class="contenu">
                @foreach ($seances as $seance)
                    @php
                        $dateTime = new DateTime($seance->dateTimeSeance);
                        $year = $dateTime->format('Y');
                        $date = $dateTime->format('d-M-Y H:i');
                        $url = route('2015_seance', ['langue' => $langueActuelle, 'idSeance' => $seance->idSeance]);
                        $lieu = $seance->lieuSeance->traductions->where('initialLangue', $langueActuelle)->first()->nomLieuSeance;
                        $lieu = htmlentities( $lieu, ENT_NOQUOTES, 'utf-8' );
                        $lieu = preg_replace( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $lieu );
                        $lieu = preg_replace( '#&([A-za-z]{2})(?:lig);#', '\1', $lieu );
                        $lieu = preg_replace( '#&[^;]+;#', '', $lieu );
                    @endphp
                    @if ($year == 2015)
                        <a href="{{$url}}" class="buttonRedStyle" style="width:300px; text-align:left">
                            {!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', ' '.$date.'  -  '.$lieu) !!}
                        </a>
                    @endif
                    
                @endforeach
            </div>
        </div>
        
    </div>
    <div style="clear:left;"></div>
    <div class="titreSynopsis">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'synopsis')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ") !!}</span></div>
    {!!$filmTraduction->resumeFilm!!}
</div>

@if ($filmTraduction->lienVideo != "")
<div class="blockVideo espaceBlock">

    <center><iframe src="{{$filmTraduction->lienVideo}}" allowfullscreen=""  frameborder="0"  padding="0" style="width:100%; height:500px;"></iframe></center>

</div>
@endif

<div class="blockMain espaceBlock">
    <div class="titreBlock">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'aPropos')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : " . $realisateur->nomRealisateur) !!}</div>
    <img src="{{$path['image']}}{{$realisateur->urlImageRealisateur}}" class="imgRealisateur" alt="{{$realisateur->nomRealisateur}}">
    {!! $realisateurTraduction->presentationRealisateur !!}
    <div style="clear:left;"></div>
</div>

<div class="blockMain espaceBlock">
    <a class="buttonRedStyle" style="text-align:center; " href="@php echo route('2015_films', ['langue' => $langueActuelle]); @endphp">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'btnRetour')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage ) !!}</a>
</div>
@stop

