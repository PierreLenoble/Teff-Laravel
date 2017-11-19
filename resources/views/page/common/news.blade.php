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
    TEFF - Les news du festival
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
    @isset($topArticle)
    <div class="blockTitre">
        <div>
            <span class="titreArticle"></span><br/>
        </div>
    </div>

    <div class="blockMain blockMainArticleDetail">
        <div style="margin-bottom: 50px; ">
            {!! $topArticle.contenuFr !!}
        </div>

        <div style="clear:left;"></div>
    </div>
    @endisset
    
    <div class="blockMain espaceBlock">
        <center><span style="font-size:2em;">Les nouvelles du site</span></center>
    </div>
    
    @foreach ($listeArticles as $article)
    @php
        $traduction = $article->traductions->where('initialLangue', $langueActuelle)->first() ;
        if (str_word_count($traduction->contenuArticle, 0) > 60) {
            $words = str_word_count($traduction->contenuArticle, 2);
            $pos = array_keys($words);
            $content = substr($traduction->contenuArticle, 0, $pos[60]) . '...';
        }else{
            $content=$traduction->contenuArticle;
        }
    @endphp

    <div class="conteneurArticle" style="">
        @if ($loop->index % 2 == 1)
        <div class="contentArticle" style="float:right; ">
        @else
        <div class="contentArticle" style="float:left; ">
        @endif

            <div class="titreArticle">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$traduction->titreArticle) !!}</div>

            <div class="bodyArticle">

                <div class="imageArticle" style="height:100px; width: 100px; background: url('{{$path['image']}}{!! $article->urlImageArticle!!}') no-repeat; background-size: 100px; background-position: 0px; ">
                    <div class="imageArticleBorder">&nbsp;</div>
                </div>
                <div class="texteArticle">


                    {!!strip_tags($content)!!}
                    <a href="{!! $tabUrlBoutton[$article->idArticle] !!}" class="buttonRedStyle btnArticle" >{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;","Lire la suite") !!}</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    @if (count($listeArticles) % 2 == 1)
    <div style="clear:left;"></div>
    @else
    <div style="clear:right;"></div>
    @endif

    @if (count($listeArticles) == 0)
    <div class="warning">----- Bientot des articles -----</div>
    @else
    <div class="bandeauNumPage">

        <a href='{!! $tabUrlPage[0] !!}'>&lt;&lt;</a>&nbsp;&nbsp;

        @if (($numPageActuel - 1) <= 0) 
            <a href='{!! $tabUrlPage[0] !!}'>&lt;</a>&nbsp;&nbsp;
        @else
            <a href='{!! $tabUrlPage[$numPageActuel - 2] !!}'>&lt;</a>&nbsp;&nbsp;
        @endif

        @foreach ($tabUrlPage as $urlPage)
            @if ($loop->iteration == $numPageActuel)
                &nbsp;<b>{{ $loop->iteration }}</b>&nbsp;
            @else
                &nbsp;<a href="{!! $urlPage !!}">{{ $loop->iteration }}</a>&nbsp;
            @endif
        @endforeach

        @if (count($tabUrlPage) == $numPageActuel) 
        <a href='{!! $tabUrlPage[count($tabUrlPage) - 1] !!}'>&gt;</a>&nbsp;&nbsp;
        @else
        <a href='{!! $tabUrlPage[$numPageActuel] !!}'>&gt;</a>&nbsp;&nbsp;
        @endif

        <a href='{!! $tabUrlPage[count($tabUrlPage) - 1] !!}'>&gt;&gt;</a>&nbsp;&nbsp;
    </div>
    @endif
@stop