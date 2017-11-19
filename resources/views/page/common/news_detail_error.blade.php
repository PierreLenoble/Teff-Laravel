@extends('partial.2016.layout')

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
    TEFF : Erreur - Article de News introuvable
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
    <div class="blockMain">
        <img src="{!! $path['image'] !!}err/warn.png" style="float:left; width:420px;">
        <p style="font-size:5em; text-align: center"><b>Erreur</b></p>
        <p style="font-size:3.5em; padding-top:60px;">Cette news n'existe pas / plus</p>
        <div style="clear:left;"></div>
    </div>
@stop
            
