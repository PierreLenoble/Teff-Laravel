@extends('partial.2016.layout')

@section('titre')
    TEFF 2016 - L'association
@stop

@section('css')
<link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
<div class="blockMain">
    
    <p class="titreMain"><img height=200px src="{{$path['image']}}common/association/logoEOP.jpg"></p>
    <p>L’objectif premier de l’association est l’organisation d’un festival de films sur la thématique du handicap, de la déficience et de la différence.</p>
    <p>« EOP ! » ambitionne de développer au travers de ses activités un travail d’éducation, de sensibilisation, et de réflexion collective sur la représentation des personnes déficientes et/ou en situation de handicap, à travers un choix d'œuvres audiovisuelles belges et étrangères, de fiction ou de documentaire, mettant en exergue les capacités des personnes concernées.</p>
    <p>L’association vise ainsi à soutenir la diffusion, mais aussi à encourager et promouvoir la création de films traitant de ces sujets et le partage d’expériences interculturelles et universelles.</p>
    <p>L’association peut accomplir tous les actes se rapportant directement ou indirectement à son objet social et notamment toutes activités mettant en valeur les capacités des personnes déficientes et/ou en situation de handicap : sportives ou culturelles (présentation de films, concerts, expositions d’art, conférences et débats, etc.).</p>
    <br/><br/>
    <p align="right">(Extrait des statuts de l’asbl « EOP ! »)</p>
    <p class="ssTitre">Le conseil d’administration de l’asbl « EOP ! » est composé de :</p>
    <ul>
        <li class="decaleDroite">Mme Claire Colart</li>
        <li class="decaleDroite">Mme Cecile Histas</li>
        <li class="decaleDroite">Karin Van der Staeten</li>
        <li class="decaleDroite">Mr Luc Boland (Secrétaire et Administrateur délégué)</li>
        <li class="decaleDroite">Mr Yves Gerard</li>
        <li class="decaleDroite">Mr Damien Helbig (Président)</li>
        <li class="decaleDroite">Mr Serge Kestemont</li>
        <li class="decaleDroite">Mr Gilles Orts (Trésorier)</li>
        <li class="decaleDroite">Mr Franck Villano</li>
    </ul>

    <p class="ssTitre">Organisation du festival :</p>
    <ul>
        <li class="decaleDroite">Directeur général et artistique & Administrateur délégué : Luc Boland</li>
        <li class="decaleDroite">Directeur administratif et financier : Mr Gilles Orts</li>
        <li class="decaleDroite">Directeur technique : Mr Franck Villano</li>
        <li class="decaleDroite">Directeur des ressources humaines : Mr Vincent Boland</li>
    </ul>
    <br/>
    <p><b>Envie de vous joindre à nous dans cette aventure ?</b></p>
    <br/>
    <p>Vous pouvez adresser votre candidature de membre de l’asbl en adressant un courrier ou un courriel à l’association.</p>
    <br/>
    <p class="decaleDroite">
        Extra & Ordinary People asbl<br/>
        Rue des trois Tilleuls, 57<br/>
        1170 Bruxelles<br/><br/>
        eop AROBASE skynet.be 
    </p>
    
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
