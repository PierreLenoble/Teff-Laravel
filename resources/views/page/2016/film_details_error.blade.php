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
    {!! str_replace(" ", "&nbsp;&nbsp;&nbsp;","Erreur : Film introuvable") !!}
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
    <div class="blockMain">
        <img src="{!! $path['image'] !!}err/warn.png" style="float:left; width:420px;">
        <p style="font-size:5em; text-align: center"><b>{!! $commonTrad->clePages()->where('nomClePage', 'erreur')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage  !!}</b></p>
        <p style="font-size:3.5em; padding-top:60px;">{!! $pageTrad->clePages()->where('nomClePage', 'errtxt')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage  !!}</p>
        <div style="clear:left;"></div>
    </div>
@stop
            
