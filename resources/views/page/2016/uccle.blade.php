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
    TEFF - 2016 - Uccle
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
    <div class="conteneurArticle" style="">
        <div class="contentArticle" style="width:100%">
            <div class="titreArticle">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'dateTitre')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</div>
            <div style="z-index:20; position:relative; background-color: rgba(255,255,255,0.5); padding:10px; border:1px solid black;">
                <div >
                    {!! $pageTrad->clePages()->where('nomClePage', 'dateTxt')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage !!}
                </div>
            </div>
        </div>
    </div>
    <div class="conteneurArticle" style="">
        <div class="contentArticle" style="width:100%">
            <div class="titreArticle">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'prixTitre')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</div>
            <div style="z-index:20; position:relative; background-color: rgba(255,255,255,0.5); padding:10px; border:1px solid black;">
                <div >
                    {!! $pageTrad->clePages()->where('nomClePage', 'prixTxt')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage !!}
                </div>
            </div>
        </div>
    </div>
    <div class="conteneurArticle" style="">
        <div class="contentArticle" style="width:100%">
            <div class="titreArticle">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'seanceTitre')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</div>
            <div style="z-index:20; position:relative; background-color: rgba(255,255,255,0.5); padding:10px; border:1px solid black;">
                <div >
                    {!! $pageTrad->clePages()->where('nomClePage', 'seanceTxt')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage !!}
                </div>
            </div>
        </div>
    </div>
    <div class="conteneurArticle" style="">
        <div class="contentArticle" style="width:100%">
            <div class="titreArticle">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'partenaireTitre')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</div>
            <div style="z-index:20; position:relative; background-color: rgba(255,255,255,0.5); padding:10px; border:1px solid black;">
                <div >
                    {!! $pageTrad->clePages()->where('nomClePage', 'partenaireTxt')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage !!}
                </div>
            </div>
        </div>
    </div>
        
    <div style="clear:right;"></div>
@stop

