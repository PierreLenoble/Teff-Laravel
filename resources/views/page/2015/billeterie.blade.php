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
        <th rowspan=2 class="intituleResumePrix"><div>{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Resume des prix") !!}</div></th>
        <th colspan=2>{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Prevente") !!}</th>
        <th colspan=2>{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Sur place") !!}</th>
    </tr>
    <tr>
        <th class="tarif">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Tarif normal") !!}</th>
        <th class="tarif">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Tarif personne en situation de handicap") !!}</th>
        <th class="tarif">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Tarif normal") !!}</th>
        <th class="tarif">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Tarif personne en situation de handicap") !!}</th>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Pass festival") !!}</td>
        <td class="prix prevente">20€</td>
        <td class="prix prevente">16€</td>
        <td class="prix surPlace">25€</td>
        <td class="prix surPlace">20€</td>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Pass journalier") !!}</td>
        <td class="prix prevente">12€</td>
        <td class="prix prevente">9,60€</td>
        <td class="prix surPlace">15€</td>
        <td class="prix surPlace">12€</td>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Seance delocalisee") !!}</td>
        <td class="prix prevente">2€</td>
        <td class="prix prevente">2€</td>
        <td class="prix surPlace">3€</td>
        <td class="prix surPlace">3€</td>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "1 seance") !!}</td>
        <td class="prix prevente">5€</td>
        <td class="prix prevente">4€</td>
        <td class="prix surPlace">6€</td>
        <td class="prix surPlace">5€</td>
    </tr>
    <tr class="ligne">
        <td class="intitule">{!! str_replace(' ', '&nbsp;&nbsp;&nbsp;', "Galas") !!}</td>
        <td class="prix prevente">8€</td>
        <td class="prix prevente">6€</td>
        <td class="prix surPlace">10€</td>
        <td class="prix surPlace">8€</td>
    </tr>
</table>

<div class="blockMain espaceBlock">
    <p style="padding-bottom: 10px; font-size: 0.8em">Pour les pass et tickets achetés en prévente : vous présenter au desk billetterie sur le lieu du festival pour les retirer (avec votre preuve d'achat).</p>
    <p style="padding-bottom: 10px; font-size: 0.8em">Les préventes sont clôturées le 10 novembre. Après cette date, seuls les achats sur place seront possibles.</p>
    <p style="padding-bottom: 10px; font-size: 0.8em">Les séances « pédagogiques » sont gratuites pour les écoles (sur réservation) et accessibles au grand public aux mêmes conditions que les autres séances (ticket ou pass). </p>
</div>

<div class="blockMain espaceBlock">
    <b>Les préventes sont clôturées, mais n’hésitez pas à nous rejoindre à Namur.</b><br>
    <br>
    Bien qu’il y ait pas mal de réservation, la capacité de la salle nous laisse une certaine marge (avec le balcon, si nécessaire).<br>
    Au plaisir de vous y accueillir.<br>
</div>
@stop

