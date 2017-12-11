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
    {!! str_replace(" ", "&nbsp;&nbsp;&nbsp;","Erreur : Seance introuvable") !!}
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
        <p style="font-size:3.5em; padding-top:60px;">Cette Seance n'existe pas</p>
        <div style="clear:left;"></div>
    </div>
@stop
            
