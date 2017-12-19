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
    TEFF - Contact
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
<div class="blockMain">
    {!! $pageTrad->clePages()->where('nomClePage', 'txt_1')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage !!}
    
</div>
@stop