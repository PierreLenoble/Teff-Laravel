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
    
    <p class="titreMain">Les lieux du festival : </p>

    <p class="ssTitre">Mardi 10 novembre 2015 (Séances délocalisées) :</p>
    <p>12 séances : avant-premières publiques et séances pédagogiques scolaires </p><br/>
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
    
    <p class="ssTitre">Mercredi 11 > dimanche 15 novembre 2015 :</p>
    <img src="{{$path['image']}}/infosPratiques/PlanNamur.jpg" width="350px;" height="230px;"/>
    <img src="{{$path['image']}}/infosPratiques/PhotoNamur.jpg"  width="350px;" height="230px;"/>
    <p>
    Maison de la Culture de la Province de Namur<br/>
    Avenue Golenvaux 14<br/>
    5000 Namur
    </p>

    <p class="ssTitre">Plan d’accès à partir de Bruxelles :</p>
    <ul>
        <li class="decaleDroite">Prendre la E411 en direction de Namur.</li>
        <li class="decaleDroite">Ensuite prendre la Sortie 14 (Bouge, Expo, CHR, Namur centre). </li>
        <li class="decaleDroite">Ensuite, suivre la direction Namur centre. </li>
    </ul>

    <p class="ssTitre">Plan d’accès à partir de Liège :</p>
    <ul>
        <li class="decaleDroite">Prendre la E25/A602 en direction de St-Laurent, E42-Namur.</li>
        <li class="decaleDroite">Suivre la direction A602, E42.</li>
        <li class="decaleDroite">Continuer sur E42/A15 en direction de la E411 Luxembourg, Namur</li>
        <li class="decaleDroite">Ensuite prendre la sortie 14 (Bouge, Expo, CHR, Namur centre). </li>
    </ul>

    <p class="ssTitre">Plan d’accès à partir de Charleroi :</p>
    <ul>
        <li class="decaleDroite">Prendre la A54 et E42 en direction de Charleroi-Gosselies.</li>
        <li class="decaleDroite">Ensuite prendre la E420/A54 en direction de Bruxelles, Liège, Mons, Charleroi aéroport.</li>
        <li class="decaleDroite">Continuer sur l’ E42/A15, puis prendre la sortie 12 (Namur, Gembloux, La Bruyère, Namur). </li>
    </ul>
</div>
@stop

