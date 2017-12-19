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
<div class="blockMain">
    {!! $pageTrad->clePages()->where('nomClePage', 'txt_1')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage  !!}
</div>
<div class="blockMain espaceBlock" id="Soutiens">

    <div class="titreSoutiens">
        {!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'sponsort')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : " ) !!}
    </div>
    <div class="divImgSoutiens">
        <div><a href="http://www.loterie-nationale.be/fr/nos-jeux/euro-millions" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/euroMillion.png" alt ="EuroMillion"></a></div>
    </div>
    
    <div class="titreSoutiens">
        {!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'ministere')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ")  !!}
    </div>
    <div class="divImgSoutiens">
        <div><a href="https://www.awiph.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/AWIPH.png" alt="Awiph"></a></div>
        <div><a href="http://www.rtbf.be/cap48/" target="_blank"><img class="maxHeight" src="{{$path['image']}}/soutiensMedia/cap48.png" alt ="Cap48"></a></div>
        <div><a href="http://www.wallonie.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/wallonie.png" alt="Wallonie"></a></div>
        <div><a href="http://phare.irisnet.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/phare.png" alt="Phare"></a></div>
        <div><a href="http://www.federation-wallonie-bruxelles.be" target="_blank"><img class="maxHeight" src="{{$path['image']}}/soutiensMedia/fedBXL_Wall.png" alt="Fédération Wallonie Bruxelles"></a></div>
        <div><a href="http://www.cocof.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/cocof.png" alt="Cocof"></a></div>
        <div><a href="https://www.province.namur.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/provNamur.png" alt="Province de Namur"></a></div>
        <div><a href="http://www.ville.namur.be/" target="_blank"><img class="maxHeight" src="{{$path['image']}}/soutiensMedia/villeNamur.png" alt="Ville de Namur"></a></div>
        <div><a href="https://www.loterie-nationale.be/fr" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/lotterie.png" alt="Lotterie Nationnale"></a></div>
        <div><a href="http://www.ville.namur.be/page.asp?id=5999&langue=FR" target="_blank"><img class="maxHeight" src="{{$path['image']}}/soutiensMedia/cultureNamur.png" alt="Namur Confluent Culture"></a></div>
        <div><a href="https://www.woluwe1150.be/fr/" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/wolluwe.png" alt="Woluwe St Pierre"></a></div>
        <!-- secret. etat des pers. handic. -->
        <div><a href="http://portail.hainaut.be" target="_blank"><img class="maxHeight" src="{{$path['image']}}/soutiensMedia/hainaut.png" alt="Hainaut"></a></div>
        <div><a href="http://www.province.luxembourg.be/fr/accueil.html?IDC=2775#.VgQBRunSNhA" target="_blank"><img class="maxHeight" src="{{$path['image']}}/soutiensMedia/luxembourg.png" alt="Luxembourg"></a></div>
        <div><a href="http://www.belgium.be/fr/la_belgique/pouvoirs_publics/autorites_federales/gouvernement_federal/composition_gouvernement/index_elke_sleurs.jsp" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/sleurs.jpg" alt ="Elke Sleurs, Secrétaire d’Etat aux Personnes handicapées"></a></div>
    </div>

    <div class="titreSoutiens">
        {!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'media')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ")  !!}
    </div>
    <div class="divImgSoutiens">
        <div><a href="http://www.rtbf.be/lapremiere/" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/laUNE.png" alt ="La Une"></a></div>
        <div><a href="http://www.rtbf.be/vivacite/" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/vivacite.png" alt ="Vivacite"></a></div>
        <div><a href="http://www.canalc.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/canalC.png" alt ="Canal C"></a></div>
        <div><a href="http://www.betv.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/beTV.png" alt ="BeTV"></a></div>
        <div><a href="http://www.brightfish.be/fr/home" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/brightfish.png" alt ="BrightFish"></a></div>
        <div><a href="http://www.lalibre.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/libre.png" alt ="Libre"></a></div>
        <div><a href="http://www.dhnet.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/DH.png" alt ="La DH"></a></div>
        <div><a href="http://www.lavenir.net" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/avenir.png" alt ="Vers l'Avenir"></a></div>
        <div><a href="http://www.moustique.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/moustique.png" alt ="Moustique"></a></div>
    </div>

      <div class="titreSoutiens">
        {!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'collaboration')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : ")  !!}
    </div>
    <div class="divImgSoutiens">
        <div><a href="http://www.51namur.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/logo51.png" alt ="Fifty-one Club"></a></div>
        <div><a href="http://www.richelieurope.eu/Namur/" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/clubNamur.png" alt ="club de Namur"></a></div>
        <div><a href="http://www.alteoasbl.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/alteo.png" alt ="Alteo"></a></div>
        <div><a href="http://www.andage.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/andage.png" alt ="Andage"></a></div>
        <div><a href="http://www.amisdesaveugles.be/fr/" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/amisAveugle.png" alt="Les Amis des Aveugle"></a></div>
        <div><a href="http://www.creahm.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/creahm.png" alt="Creahm"></a></div>
        <div><a href="http://www.dgde.cfwb.be/" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/droitsEnfants.png" alt ="Droits de l'Enfant"></a></div>
        <div><a href="http://www.fondationlou.com" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/fondationLou.png" alt ="Fondation Lou"></a></div>
        <div><a href="http://www.horizon2000.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/horizon2000.png" alt ="Horizon2000"></a></div>
        <div><a href="http://www.inforautisme.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/infoAutisme.png" alt="Info Autisme"></a></div>
        <div><a href="http://www.lalumiere.be/fr" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/lumiere.png" alt ="La Lumiere"></a></div>
        <div><a href="http://www.passe-muraille.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/passeMuraille.png" alt ="Passe-Muraille"></a></div>
        <div><a href="http://www.cinematek.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/cinematek.png" alt ="cinematek"></a></div>
        <div><a href="#"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/sbc.png" alt ="SBC"></a></div>
        <div><a href="http://www.setisw.be/pages/1_1-Presentation.html" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/setisWallon.png" alt ="setisWallon"></a></div>
    </div>
    
    

    <div class="titreSoutiens">
        {!! str_replace(" ", "&nbsp;&nbsp;&nbsp;",$pageTrad->clePages()->where('nomClePage', 'fournisseur')->first()->traductions()->where('initialLangue',$langueActuelle)->first()->textPage . " : " ) !!}
    </div>
    <div class="divImgSoutiens">
        <div><a href="http://www.propaganda.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/propa.png" alt="Propa"></a></div>
        <div><a href="http://www.audioscenic.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/audioscenic.png" alt="Audioscenic"></a></div>
        <div><a href="http://www.cinetec.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/cinetec.png" alt="Cinetec"></a></div>
        <div><a href="http://www.egerie-research.be/index.php?page=home" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/egerie.png" alt="Egerie"></a></div>
        <div><a href="http://www.secondfloor.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/secondFloor.png" alt="second floor"></a></div>
        <div><a href="http://fr.skoda.be" target="_blank" ><img class="maxHeight" src="{{$path['image']}}/soutiensMedia/skoda.png" alt="skoda"></a></div>
        <div><a href="http://www.alternative-event.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/alternative2.png" alt="Alternative"></a></div>
        <div><a href="http://www.boomerang.be" target="_blank"><img class="maxWidth" src="{{$path['image']}}/soutiensMedia/boomerang.png" alt="Boomerang"></a></div>
    </div>
</div>
@stop

