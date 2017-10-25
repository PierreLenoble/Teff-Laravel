@extends('partial.2016.layout')

@section('titre')
    TEFF 2016 - Uccle
@stop

@section('css')
<link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
    <div class="conteneurArticle" style="">
        <div class="contentArticle" style="width:100%">
            <div class="titreArticle">Dates&nbsp;&nbsp;et&nbsp;&nbsp;lieu</div>
            <div style="z-index:20; position:relative; background-color: rgba(255,255,255,0.5); padding:10px; border:1px solid black;">
                <div >
                    Vendredi 16 et samedi 17 septembre 2016
                    <br/>
                    <br/>
                    <b>Centre Culturel d’Uccle : 47, rue Rouge – 1180 Bruxelles</b>
                </div>

            </div>
        </div>
    </div>
    <div class="conteneurArticle" style="">
        <div class="contentArticle" style="width:100%">
            <div class="titreArticle">Prix&nbsp;&nbsp;&amp;&nbsp;&nbsp;Billetterie</div>
            <div style="z-index:20; position:relative; background-color: rgba(255,255,255,0.5); padding:10px; border:1px solid black;">
                <div >
                    <b>Prix : </b><br/><br/>
                    <table style="border:1px solid black">
                        <tr>
                            <td style="border:1px solid black; padding : 5px">Séances ordinaires</td>
                            <td style="border:1px solid black; padding:5px">5 € + frais de réservation si envoi postal des billets</td>
                        </tr>
                        <tr>
                            <td style="border:1px solid black; padding:5px">Pass pour l'ensemble des séances</td>
                            <td style="border:1px solid black; padding:5px">12 € + frais de réservation si envoi postal des billets</td>
                        </tr>
                        <tr>
                            <td style="border:1px solid black; padding:5px">Séances pédagogiques scolaires</td>
                            <td style="border:1px solid black; padding:5px">gratuites</td>
                        </tr>
                    </table>
                    <br/>
                    <b>Billetterie</b><br/><br/>
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;Séance ordinaires : </b><br/><br/>
                    <ul style="margin-left: 35px">
                        <li>Retrait sur place (Centre Culturel d’Uccle 47, rue Rouge – 1180 Bruxelles)</li>
                        <li>En ligne : site du CCU (<a href="http://ccu.be/index.php?page=reservationlist" target="_blank">http://ccu.be/index.php?page=reservationlist</a>)<br><br></li>
                        <li><b><u>Contact</u></b> : Numéro de téléphone du CCU : <b>02/374.64.84</b><br>
                        (tickets envoyés par la poste ou retrait sur place)
                    </ul><br/><br/>
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;Séance pédagogiques : </b><br/><br/>
                    <ul style="padding-left: 35px">
                        <li>via ce formulaire à renvoyer avant le 10/09/2016 (<a href="{{$path['download']}}/formulaire-pedagogique-eop-2016.pdf">Télécharger le formulaire</a>)</li>
                        <li><b><u>Contact :</u> 02/673.27.89</b> </li>
                        <li>Dossier pédagogique sur demande (pdf = gratuit – papier= 20 €)</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="conteneurArticle" style="">
        <div class="contentArticle" style="width:100%">
            <div class="titreArticle">Seances</div>
            <div style="z-index:20; position:relative; background-color: rgba(255,255,255,0.5); padding:10px; border:1px solid black;">
                <div >
                    <b>Ces projections sont « full accessibilité » </b>: sous-titrage, traduction des débats en LS, audiodescription des films et accessibilité pour les PMR à l’exception de la séance carte blanche du festival de Cannes ( sans STT ni AD).<br>
                    <br>
                    Pour voir la fiche de chaque film et sa bande annonce : lien direct sur le titre des films<br>
                    <br>
                    <u><b>VENDREDI 16/09/2016</b></u><br>
                    <br>
                    <b>Vendredi 16 septembre 2016 à 09h00 : Séance 1 - Pédagogique écoles fondamentales</b> (8 – 12 ans) (projection : 37’ + débats. Fin à 10h30)<br>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '785']); ?>">MACROPOLIS</a> de Joël Simon (UK)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '779']); ?>">LA PETITE CASSEROLE D’ANATOLE de Eric Montchaud</a> (FR)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '767']); ?>">FIXING LUKA</a> de Jessica Ashman (UK)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '765']); ?>">CUERDAS</a> de Pedro Solis Garcia (SP)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '808']); ?>">DANS LES YEUX D’UN ENFANT</a> de Thomas Rhazi (Fr) </li>
                    </ul>
                    <br><br/><br/>
                    <b>Vendredi 16 septembre 2016 à 10h45 : Séance 2 - Pédagogique écoles du secondaire inférieur</b> (12 – 16 ans) (projection : 37’ + débats. Fin à 12h15)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '808']); ?>">DANS LES YEUX D’UN ENFANT</a> de Thomas Rhazi</a> (Fr)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '765']); ?>">CUERDAS</a> de Pedro Solis Garcia (SP)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '772']); ?>">HERE IN SILENCE</a> de Jake Willis (Aus)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '770']); ?>">GLIMPSE FOR HEAVEN</a> de Diego Robles (USA)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '797']); ?>">THE COMMUTE</a> de Jake Mcafee (USA) </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '804']); ?>">CARLY'S CAFE</a> de Miles Jay (CA) </li>
                    </ul>
                    <br>
                     <br/><br/>
                    
                    <b>Vendredi 16 septembre 2016 à 13h00 : 3 - Pédagogique écoles fondamentales (8 – 12 ans) </b>(projection : 37’ + débats. Fin à 14h30)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '785']); ?>">MACROPOLIS</a> de Joël Simon (UK)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '779']); ?>">LA PETITE CASSEROLE D’ANATOLE</a> de Eric Montchaud (FR)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '767']); ?>">FIXING LUKA</a> de Jessica Ashman (UK)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '765']); ?>">CUERDAS</a> de Pedro Solis Garcia (SP)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '808']); ?>">DANS LES YEUX D’UN ENFANT</a> de Thomas Rhazi (Fr) </li>
                    </ul>
                    <br>
                    <br/><br/>
                    <b>Vendredi 16 septembre 2016 à 15h00 : Séance 4 – Sexualité et handicap (-16 ans) </b>(projection : 65’ + débats. Fin à 17h10)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '783']); ?>">LE PREMIER PAS</a> de Vanessa Clément (FR)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '790']); ?>">PRENDS-MOI</a> de Anaïs Barbeau-Lavalette & André Turpin (CA)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '792']); ?>">SCRUBBERS</a> de Christopher Cass (USA)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '805']); ?>">AUTISM IN LOVE</a> de Michelle Friedline (USA) </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '777']); ?>">KRUTCH</a> de Clark Matthews (USA)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '758']); ?>">ATLANTIC AVENUE</a> de Laure de Clermont (FR) </li>
                    </ul>
                    <br>
                    
                    <br/><br/>
                    <b>Vendredi 16 septembre 2016 à 17h30 : Séance 5 – Coups de cœurs (courts-métrages) </b>(projection : 70’ + débats. Fin à 18h50)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '757']); ?>">A GOOD LIFE, TOO</a> : ALONZO CLEMONS de Joseph Le Baron (USA) </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '813']); ?>">AU DELA DES MOTS</a> de Jérome Thomas / olivier Marchal (FR)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '760']); ?>">BLIND DEVOTION</a> de Edward Young Lee (USA)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '779']); ?>">LA FILLE AUX BOUEES ROSES</a> de Sarah Laure Estragnat (FR)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '798']); ?>">THE KISS</a> de Charlie Swinbourne (UK)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '786']); ?>">MANO A MANO (MAIN DANS LA MAIN)</a> de Ignacio Tatay (SP) </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '788']); ?>">PERFECT</a> de Karim Ayari (CA)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '807']); ?>">JESSE</a> de Adam Goldhammer (CA)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '759']); ?>">BASTION</a> de Ray Jacobs (UK)  </li>
                    </ul>
                    <br>
                    <br/><br/>
                    <b>Vendredi 16 septembre 2016 à 20h00 : Séance 6 – Palmarès 2015 (courts-métrages) </b>(projection : 78’ + débats. Fin à 21h45 + Drink)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '808']); ?>">DANS LES YEUX D’UN ENFANT</a> de Thomas Rhazi (Fr)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '805']); ?>">AUTISM IN LOVE</a> de Michelle Friedline (USA) </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '756']); ?>">A COLD LAND</a> de Shahriar Pourseyedian (IR) </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '802']); ?>">WORKMATE</a> de Genevieve Clay Smith (AUS) </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '773']); ?>">I DON'T CARE</a> de Carolina Giammetta (UK)  </li>
                        <li>EEN LIFT GEEFT JE VLEUGELS ! de Goyens Roel (B)</li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '765']); ?>">CUERDAS</a> de Pedro Solis Garcia (SP) </li>
                    </ul>
                    <br>
                     
                    <br>
                    <u><b>SAMEDI 17/09/16</b></u><br>
                    <br>
                     
                    <b>Samedi 17 septembre 2016 à 10h00 : Séance 7 – Famille (courts-métrages – dessins animés) </b>(projection :45 + débats. Fin à 11h00 + Petit déjeuner offert)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '808']); ?>">DANS LES YEUX D’UN ENFANT</a> de Thomas Rhazi (Fr)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '785']); ?>">MACROPOLIS</a> de Joël Simon (UK)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '779']); ?>">LA PETITE CASSEROLE D’ANATOLE</a> de Eric Montchaud (FR) </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '766']); ?>">LE VOYAGE DE MARIA</a> de Miguel Gallardo (SP)  </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '767']); ?>">FIXING LUKA (SAUVER LUKA)</a> de Jessica Ashman (UK) </li>
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '765']); ?>">CUERDAS (LA CORDE)</a> de Pedro Solis Garcia (SP) </li>
                    </ul>
                    <br>
                     <br/><br/>
                    <b>Samedi 17 septembre 2016 à 11h15 : Séance 8 – Pub, Com et handicap </b>(projection : 58’ + débats. Fin à 12h30)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '806']); ?>">34 PUBLICITES ET FILMS DE COMMUNICATION</a> à propos du handicap issus de 14 pays </li>
                    </ul>
                    <br>
                     <br/><br/>
                    <b>Samedi 17 septembre 2016 à 13h30 : Séance 9 – Prix du public 2015 : GABOR </b>(projection : 58’ + débats. Fin à 12h30)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '768']); ?>">GABOR</a> de Sebastián Alfie (SP)  </li>
                    </ul>
                    <br>
                     <br/><br/>
                    <b>Samedi 17 septembre 2016 à 15h15: Séance 10 – Prix CAP48 2015 : GLANCE UP </b>(projection : 60’ + débats. Fin à 16h35)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '769']); ?>">GLANCE UP</a> de Enric Ribes & Oriol Martinez (SP)  </li>
                    </ul>
                    <br>
                     <br/><br/>
                    <b>Samedi 17 septembre 2016 à 17h00 : Séance 11 – CARTE BLANCHE CANNES </b>(projection : 60’ + débats. Fin à 18h30)<br/>
                    <br><img src="{{$path['image']}}2016/homePage/BandeauFIFH.JPG">
                    <br><br>
                    <ul style="padding-left: 10px">
                        <li>Une sélection de courts-métrages du FESTIVAL INTERNATIONAL DU FILM sur le handicap DE CANNES 2016</li>
                        <li>Partenaire de l’Extraordinary Film Festival, le Festival International du Film sur le Handicap de Cannes tient sa 
                            première édition en même temps que notre événement à Uccle. Simultanément à Cannes sera projeté une sélection de 
                            courts-métrages du TEFF : 
                            <ul style="position:relative; left:25px; top:10px">
                                <li>OLTRE LA LINEA - Chi lo tira?  De Paolo Geremei (I)</li>
                                <li>PARA SONIA de Sergio Milan (SP)</li>
                                <li>INSIGHT de André-Alexandre Gangl (FR)</li>
                                <li>BLIND SEAM de Eric G. Du Bellay (ISL)</li>
                                <li>PASSE COMPOSE de Ted Hardy-Carnac (F)</li>
                                <li>FAITES-VOUS DU BIEN, REVOYEZ VOS CONCEPTS de Ariana Chediak (BR)</li>
                                <li>LE SECRET DE MAËL de Franck Hérouard (FR)</li>
                                <li>MON PETIT FRERE DE LA LUNE de Frédéric Philibert (FR)</li>
                            </ul>
                        </li>
                    </ul>
                     <br/><br/>
                    <b>Samedi 17 septembre 2016 à 2h00 : Séance 12 – Grand Prix RTBF 2015 </b>MARGARITA WITH A STRAW (projection : 100’ + débats)<br/>
                    <br>
                    <ul style="padding-left: 10px">
                        <li><a href="<?php echo route('2016_filmDetails', ['langue' => 'fr', 'idFilm' => '787']); ?>">MARGARITA WITH A STRAW</a> de Shonali Bose (IN/USA)  </li>
                    </ul>
                    <br>
                     
                    
                </div>

            </div>
        </div>
    </div>
    <div class="conteneurArticle" style="">
        <div class="contentArticle" style="width:100%">
            <div class="titreArticle">Nos&nbsp;&nbsp;partenaires</div>
            <div style="z-index:20; position:relative; background-color: rgba(255,255,255,0.5); padding:10px; border:1px solid black;">
                <div >
                    Ces séances sont nées à l’initiative du département de l’Echevine de l’Egalité des Chances et de la Santé d’Uccle, Mme Catherine Roba-Rabier.<br/>
                    Avec le soutien du Collège des Bourgmestre et Echevins d’Uccle, du Ministère de la Santé de la Région de Bruxelles Capitale, de La COCOF, de Phare, du Délégué générale aux Droits de l’Enfant.<br/>
                    En partenariat avec la Fédération Laïque de Centres de Planning Familial<br/>
                </div>

            </div>
        </div>
    </div>
        
    <div style="clear:right;"></div>
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
