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
    TEFF - Article - {{$article->traductions->where('initialLangue', $langueActuelle)->first()->titreArticle}}
@stop

@section('css')
@stop

@section('js')
@stop

@section('body')
    <div class="blockTitre">
        <div>
            <span class="titreArticle">{{$article->traductions->where('initialLangue', $langueActuelle)->first()->titreArticle}}</span><br/>
        </div>
    </div>
    <div class="blockMain blockMainArticleDetail">
        <div style="margin-bottom: 50px; ">
            <img src="{!! $path['image'] !!}{!! $article->urlImageArticle !!}" alt="{{$article->traductions->where('initialLangue', $langueActuelle)->first()->titreArticle}}" style="float:left;vertical-align: text-top; border:0px;  margin-right:20px; margin-bottom: 20px; width:250px" />
            {!! $article->traductions->where('initialLangue', $langueActuelle)->first()->contenuArticle !!}
        </div>
        <div style="clear:left"></div>
        <div style="text-align: right; position:relative; height:50px; ">
            <a class="buttonRedStyle" style="width:350px; position:absolute; right:0px; bottom:0px;" href="{!! $urlBack !!}">retour&nbsp;&nbsp;&nbsp;aux&nbsp;&nbsp;&nbsp;nouvelles&nbsp;&nbsp;&nbsp;du&nbsp;&nbsp;&nbsp;site</a>
        </div>
    </div>
@stop
            
