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
    TEFF - 2015 - Evenements
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_listeFilms.css"/>
@stop

@section('js')
@stop

@section('body')
<div class="conteneurAllFilm grid">
    @php
    $i=0;
    @endphp
    
    @foreach($listeEvenements as $event)
    
        @php
        if ($i == 0) {
            $cf = 1;
        } else {
            $cf = rand(0,1);
        }
        
        $traduction = $event->traductions->where('initialLangue', $langueActuelle)->first() ;
        if (str_word_count($traduction->contenuArticle, 0) > 30) {
            $words = str_word_count($traduction->contenuArticle, 2);
            $pos = array_keys($words);
            $content = substr($traduction->contenuArticle, 0, $pos[30]) . '...';
        }else{
            $content=$traduction->contenuArticle;
        }
        @endphp
        @if ($cf == 1)
            <div class="conteneurEvent1 grid-item">
                <div style="position:relative; top:5px; left:5px; width:205px; height:420px; background-color: rgba(255,255,255,0.5);">
                    <div style="position:relative; top:5px; left:5px; width:195px;height:410px;">
                        <div style="position:relative;  width:195px; height:195px; background: url(&quot;{{$path['image']}}{!!$event->urlImageArticle!!}&quot;) no-repeat; background-size: 195px; background-position: 0px;">
                            <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box; box-sizing: border-box; border:1px solid black;width:195px; height:195px;">&nbsp;</div>
                        </div>
                        <p style="padding-top:15px; color:black; font-size: 0.9em;  ">{!!strip_tags($content)!!}</p>
                        <a class="buttonRedStyle" style="text-align:center; position:absolute; bottom:0px; width:193px;" href="{{$tabUrlBoutton[$event->idArticle]}}">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'btnVoir')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</a>
                    </div>
                </div>
            </div>
        @else
            <div class="conteneurEvent2 grid-item" style="position:relative">
                <div style="position:relative; top:5px; left:5px; height:205px; width:420px; background-color: rgba(255,255,255,0.5);">
                    <div style="position:relative; top:5px; left:5px; height:195px;width:410px;">
                        <div style="float:left; position:relative;  height:195px; width:195px; background: url(&quot;{{$path['image']}}{!!$event->urlImageArticle!!}&quot;) no-repeat; background-size: 195px; background-position: 0px">
                            <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box; box-sizing: border-box; border:1px solid black;width:195px; height:195px;">&nbsp;</div>
                        </div>
                        <div style="position:relative; float:left; display:table; width:200px; height:197px; margin-left:5px">
                            <p style="padding-top:15px; color:black; font-size: 0.9em;  ">{!!strip_tags($content)!!}</p>
                            <a class="buttonRedStyle" style="text-align:center; position:absolute; width:208px; bottom:0px; left:0px;" href="{{$tabUrlBoutton[$event->idArticle]}}" style="">{!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'btnVoir')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage) !!}</a>
                        </div>
                         <div style="clear:left;"></div>   
                    </div>
                </div>
            </div>
        @endif
        
        @php
        $i = $i + 1;
        @endphp
        
    @endforeach
        </div>
@if ($i==0)
    <div class="warning">bientot les evenements de l'edition 2015</div>
@endif
    <script type="text/javascript" >
        var container = document.querySelector('.grid');
        var msnry = new Masonry( container, {
          itemSelector: '.grid-item',
          columnWidth: 215
        });
    </script>
@stop

