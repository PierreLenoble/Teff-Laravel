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
    TEFF - 2015 - HomePage
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
    <div class="blockMain espaceBlock">
        <div class="archive2015Home">

            <div class="fleche">
                 <img src="{{$path['image']}}/archives/fleche2015.png" class="imgFleche">
            </div>
            <div class="logo">
                 <img src="{{$path['image']}}/archives/logoTeff.png" class="imgLogo">
            </div>
        </div>
    </div>
@stop

