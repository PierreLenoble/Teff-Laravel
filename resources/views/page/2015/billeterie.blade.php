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
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
<table class="tableInfoPrixResume">
    <tr>
        <th rowspan=2 class="intituleResumePrix"><div>{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'resumePrix')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</div></th>
        <th colspan=2>{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'prevente')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</th>
        <th colspan=2>{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'surPlace')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</th>
    </tr>
    <tr>
        <th class="tarif">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'tarifNormal')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</th>
        <th class="tarif">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'tarifPMR')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</th>
        <th class="tarif">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'tarifNormal')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</th>
        <th class="tarif">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'tarifPMR')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</th>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'passFestival')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</td>
        <td class="prix prevente">20€</td>
        <td class="prix prevente">16€</td>
        <td class="prix surPlace">25€</td>
        <td class="prix surPlace">20€</td>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'passJour')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</td>
        <td class="prix prevente">12€</td>
        <td class="prix prevente">9,60€</td>
        <td class="prix surPlace">15€</td>
        <td class="prix surPlace">12€</td>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'seanceDelocalisee')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</td>
        <td class="prix prevente">2€</td>
        <td class="prix prevente">2€</td>
        <td class="prix surPlace">3€</td>
        <td class="prix surPlace">3€</td>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', '1seance')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</td>
        <td class="prix prevente">5€</td>
        <td class="prix prevente">4€</td>
        <td class="prix surPlace">6€</td>
        <td class="prix surPlace">5€</td>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'galas')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</td>
        <td class="prix prevente">8€</td>
        <td class="prix prevente">6€</td>
        <td class="prix surPlace">10€</td>
        <td class="prix surPlace">8€</td>
    </tr>
</table>

<div class="blockMain espaceBlock">
    {!! $pageTrad->clePages()->where('nomClePage', 'txt_1')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage !!}
</div>

<div class="blockMain espaceBlock">
    {!! $pageTrad->clePages()->where('nomClePage', 'txt_2')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage !!}
    
</div>
@stop

