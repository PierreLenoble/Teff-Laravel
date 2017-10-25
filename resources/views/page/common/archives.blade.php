@extends('partial.2016.layout')

@section('titre')
    TEFF - Archive
@stop

@section('css')
<link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
    <div class="blockMain">
        <a href="<?php echo route('2011_homePage', ['langue' => $langueActuelle]); ?>">Archive 2011</a>
        <a href="<?php echo route('2012_homePage', ['langue' => $langueActuelle]); ?>" >Archive 2012</a>
        <a href="<?php echo route('2013_homePage', ['langue' => $langueActuelle]); ?>">Archive 2013</a>
        <a href="<?php echo route('2014_homePage', ['langue' => $langueActuelle]); ?>">Archive 2014</a>
        <a href="<?php echo route('2015_homePage', ['langue' => $langueActuelle]); ?>">Archive 2015</a>
    </div>
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
