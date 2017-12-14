@extends('partial.2015.layout')

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
    TEFF - 2015 - Billeterie
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_infosPratiques.css"/>
@stop

@section('js')
@stop

@section('body')
@php
$titres = [
    $pageTrad->clePages->where('nomClePage', 'chienTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'infoTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'audioTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'ssTitreTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'interpreteTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'traductionTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'difficulteTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'PMRTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'parkingPMRTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'parkingTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'TECTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'serviceTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'attentionTitre')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : "
 ];
    
$contents = [
    $pageTrad->clePages->where('nomClePage', 'chienTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'infoTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'audioTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'ssTitreTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'interpreteTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'traductionTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'difficulteTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'PMRTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'parkingPMRTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'parkingTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'TECTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'serviceTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : ",
    $pageTrad->clePages->where('nomClePage', 'attentionTxt')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage . " : "
];
$imgs = [
    "Picto01.png",
    "Picto02.png",
    "Picto03.png",
    "Picto04.png",
    "Picto05.png",
    "Picto05.png",
    "Picto11.png",
    "Picto07.png",
    "Picto08.png",
    "Picto09.png",
    "Picto10.png",
    "Picto06.png",
    "Picto12b.png"
    ];
    @endphp
<div class="blockMain espaceBlock">
    {!!$pageTrad->clePages->where('nomClePage', 'txt_1')->first()->traductions->where('initialLangue',$langueActuelle)->first()->textPage!!}

</div>
<div class="conteneurInfos">
    @for ($i = 0; $i <= 12; $i++)
    <div class="infoConteneur">
        <p class="infoTitre">{{$titres[$i]}}</p>
        <div class="blockInfoPrat">
            <img src="{{$path['image']}}infosPratiques/{{$imgs[$i]}}" alt="{{$titres[$i]}}" class="infoImage"/>
            <p class="infoCorps">{!!$contents[$i]!!}</p>
            <div style="clear:left;"></div>
        </div>
    </div>
    @endfor
</div>
@stop

