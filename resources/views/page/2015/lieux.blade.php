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
    TEFF - 2015 - Billeterie
@stop

@section('css')
    <link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
<div class="blockMain espaceBlock">
    {!! $pageTrad->clePages()->where('nomClePage', 'txt_1')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage  !!}
    
    <ul>
        @php
            foreach($lieuSeance as $lieux) {
                $lieu = $lieux->traductions->where('initialLangue', $langueActuelle)->first();
                if (strlen($lieu->nomLieuSeance) > 0 && !(substr($lieu->nomLieuSeance, strlen($lieu->nomLieuSeance)-1, 1) == ".") && strlen($lieux->codePostalLieuSeance) > 0) {
                @endphp
                <li class="decaleDroite">
                    {{$lieu->nomLieuSeance}} : <br/>
                    <p class="infoPratiqueAdresse">
			{{$lieux->adresse1LieuSeance}} <br/>
                        {{$lieux->adresse2LieuSeance}}<br/>
                        {{$lieux->codePostalLieuSeance}} {{$lieux->localiteLieuSeance}}
                    </p>
                </li>
                @php
                }
            }
        @endphp
        
    </ul>
    
    {!! $pageTrad->clePages()->where('nomClePage', 'txt_2')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage  !!}
</div>
@stop

