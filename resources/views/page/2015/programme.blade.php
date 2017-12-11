@extends('partial.2015.layout')

@php
    $days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
    $nbBandeau = 0;
    foreach ($lieuxTab as $lieux) {
        foreach ($lieux as $lieu) {
            $nbBandeau = $nbBandeau + 1;
        }
    }
    $heightBandeau = 89;
    $heightHours = 35;
    $widthHours = 120;
    $distanceBetweenHours = 175;
    $startHour = 9;
    $nbHour = 13;
    $widthFleche = 40;
    $widthJour = 83;
    $widthLieux = 80;
    $widthSeanceMin = 250;
    $couleurJour = ["#431C1C", "#441111", "#630002", "#7B0406", "#990005", "#E80007", "grey"];
    $couleurBandeau = ["#a18d8e", "#a08888", "#b17f80", "#bd8181", "#cb7f83", "#f37f82", "lighGrey"];
    $couleurLieux = ["#a18d8e", "#a08888", "#b17f80", "#bd8181", "#cb7f83", "#f37f82", "darkRed"];
    $couleurSeparationBandeau = "#555";
    $couleurFondHeure = "black";
    $couleurSeparationHeure="#00F";
@endphp

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
    <link rel="stylesheet" href="{{$path['css']}}red_programme.css"/>
@stop

@section('js')
@stop

@section('body')


<div style="margin-top:20px; display: block; position:relative; float:none; overflow:hidden; height:{{$heightHours + $nbBandeau*$heightBandeau}}px; border:1px solid black; background-color: white;" id="conteneur">

    <div style="display: table; background-color: {{$couleurFondHeure}}; position:relative; height:{{$heightHours}}px; width: {{($nbHour + 1 ) * $distanceBetweenHours + 0}}px; left:{{$widthFleche + $widthJour + $widthLieux}}px; top:0px; " id="contenu">
        
        @php
        $j = $startHour;
        for ($i = 0; $i <=$nbHour; $i++) {
            if ($j>23) {
                $j=0;
            }

            echo "<div style=\"left: " . ($i * $distanceBetweenHours) . "px; position:absolute; top:   0px; display:table; font-size: 2em; text-align: center; width:" . $widthHours . "px; color:white; font-weight:bold;\" class=\"hour\">" . ($j<10) ? "0".$j : $j . ":00</div>";
            echo "<div style=\"z-index:10; left: " . (($i * $distanceBetweenHours) + ($widthHours / 2)) . "px; position:absolute; top: " . $heightHours . "px; display:table; height:" . $nbBandeau * $heightBandeau . "px; width:1px;    border-left:1px solid rgb(200,50,50);\">&nbsp;</div>";

            }



        foreach ($seances as $seance) {

            $line = 0;
            $i = 0;
            $i1 = 0;
            $saveDate = 0;
                    $dateTmp = new \DateTime($seance->dateTimeSeance);
            echo "search : " . $seance->lieuSeance->traductions->where('initialLangue', $langueActuelle)->first()->nomLieuSeance . "  -  " . $dateTmp->format('d-M-y H:i') ;
            foreach ($lieuxTab as $lieux) {
                foreach ($lieux as $lieu) {
                    $i = $i + 1;
                    
                    if ($lieu == $seance->lieuSeance->traductions->where('initialLangue', $langueActuelle)->first()->nomLieuSeance and $dateTmp->format('dMy') == $dateTab[$i1]->format('dMy')) {
                        $line = $i;
                        echo "\r\n ---->" . $lieu . " - " . $dateTab[$i1]->format('d-M-y H:i') . "<br/>\n\r" ;
                    } else {
                        echo       "\r\n" . $lieu . " - " . $dateTab[$i1]->format('d-M-y H:i') . "<br/>\n\r" ;
                    }
                }
                $i1 = $i1 + 1;
            }
            
            $dateTmp = new \DateTime($seance->dateTimeSeance);
            $left = (0 + $dateTmp->format('H') - $startHour - 1 + $dateTmp->format('i') / 60) * $distanceBetweenHours + $distanceBetweenHours + $widthHours    / 2;
            $widthSeance = ($seance->dureeMinuteSeance / 60) * $distanceBetweenHours;
            if ($widthSeance < $widthSeanceMin) {
                $widthSeance = $widthSeanceMin;
            }

            if (isset($tabImgFilm[$seance->idSeance])) {
                $affiche = $path['image'] . $tabImgFilm[$seance->idSeance];


            @endphp
            <div style="z-index:10;position:absolute; top:{{$heightHours + ($line-1)* $heightBandeau + 3}}px; left:{{$left}}px; width:{{$widthSeance}}px; height:{{$heightBandeau - 5}}px; background-color: rgba(255,255,255,1);webkit-box-sizing: border-box;-moz-box-sizing: border-box; box-sizing: border-box; border:1px solid darkred;">
                <div style="position:relative; top:3px; left:3px; height:{{$heightBandeau - 13}}px;width:{{$widthSeance - 8}}px;">
                    <div style="float:left; position:relative;  height:{{$heightBandeau - 13}}px; width:{{$heightBandeau - 13}}px; background: url(&quot;{{$affiche}}&quot;) no-repeat; background-size: {{($heightBandeau - 13)}}px; background-position: 0px;">
                        <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box; box-sizing: border-box; border:1px solid black;width:{{$heightBandeau - 13}}px; height:{{$heightBandeau - 13}}px;">&nbsp;</div>
                        <div style="height:30px; position:absolute; bottom:0px; right:5px;"></div>
                    </div>
                    <div style="margin-left:4px;position:relative; float:left; display:table; width:{{$widthSeance - $heightBandeau}}px; height:{{$heightBandeau - 13}}px; ">
                        <div style="color:darkred;font-size: 0.8em; font-family: bebas; line-height:1.2em; width: {{$widthSeance - $heightBandeau}}px; height:{{$heightBandeau - 34}}px; overflow:hidden;">{{$dateTmp->format('H:i')}} - {{$seance->traductions->where('initialLangue', $langueActuelle)->first()->nomSeance}}</div>
                        <a class="buttonRedStyle" style="text-align:center; position:absolute; width:{{$widthSeance - $heightBandeau -2}}px; bottom:-2px; left:0px;" href="{{$tabUrl[$seance->idSeance]}}" style="">detail seance</a>   
                    </div>

                     <div style="clear:left;"></div> 
                </div>
            </div>
            @php

            }
        } 
        @endphp
        
          
    </div>
    <div style="top: 0px; position:absolute; left:{{$widthLieux + $widthJour + $widthFleche}}px; width: {{($nbHour + 1) * $distanceBetweenHours}}px; height:{{$heightHours}}px; border-bottom:1px solid rgba(150,0,0,0.5);" >&nbsp;</div>
    <div style="top: 0px; position:absolute; left:{{$widthFleche}}px; width: {{$widthJour + $widthLieux + 2}}px; height:{{$heightHours}}px; background-color: black; color:white" >&nbsp;</div>
    
    @php
        $nbLieux = 0;
        $iDate = 0;
        $iLieux = 0;
        foreach($lieuxTab as $lieux) {
            $iLieux = 0;
            foreach ($lieux as $lieu) {
                @endphp
                <div style="z-index:20; top: {{$heightHours  + $nbLieux * $heightBandeau}}px; position:absolute; left:{{$widthFleche + $widthJour}}px; width: {{$widthLieux}}px; height:{{$heightBandeau}}px; background-color: {{$couleurLieux[$iDate]}}; border:1px solid black; border-bottom:0px;" class="lieuSeance"><p style="padding:5px; font-size:0.8em;">{{$lieu}}</p></div>
                <div style="z-index:9; top: {{$heightHours  + $nbLieux * $heightBandeau}}px; position:absolute; left:{{$widthJour + $widthLieux + $widthFleche +1}}px; width:  {{($nbHour + 1) * $distanceBetweenHours}}px; height:{{$heightBandeau}}px; border-bottom:1px solid #CCC;border-top:1px solid {{$couleurSeparationBandeau}}; background-color:{{$couleurBandeau[$iDate]}}; opacity: 0.7" class="lieuSeance"></div>
                @php
                $iLieux = $iLieux + 1;
                $nbLieux = $nbLieux + 1;
            }
            
            $tmp1 = $dateTab[$iDate]->format('w');
            $tmp2 = $dateTab[$iDate]->format('d-m');
            @endphp
            <div style="z-index:20; top:{{$heightHours + ($nbLieux-$iLieux) * $heightBandeau}}px; position:absolute; left:{{$widthFleche}}px; width: {{$widthJour}}px; height:{{$iLieux * $heightBandeau}}px; background-color: {{$couleurJour[$iDate]}}; color:white; border:1px solid black; padding:0px;" class="lieuSeance"><p style="padding:5px; font-size:1em; font-family: bebas">{{$days[$tmp1]}}</p><p style="padding:0px 5px; font-family: bebas; font-size:1.1em">&nbsp;&nbsp;&nbsp;{{$tmp2}}</p></div>
            @php
            $iDate = $iDate + 1;
        }
    @endphp   
            
        <div style="cursor:pointer; z-index:20;position:absolute; top:0px; left:0px; width:{{$widthFleche}}px; height:{{$heightHours + $nbLieux*$heightBandeau}}px; background-color: white; background-position: center; background-image: url('{{$path['image']}}/programme/arrow_l.png'); background-size: 48px 48px; background-repeat: no-repeat; border-right: 1px solid black;" id="leftArrow"></div>
        <div style="cursor:pointer; z-index:20;position:absolute; top:0px; right:0px; width:{{$widthFleche}}px; height:{{$heightHours + $nbLieux*$heightBandeau}}px; background-color: white; background-position: center; background-image: url('{{$path['image']}}/programme/arrow_r.png'); background-size: 48px 48px; background-repeat: no-repeat; border-left: 1px solid black;" id="rightArrow"></div>
</div>
<script type="text/javascript" >
    var step={{$distanceBetweenHours}};
    
    function getDimention(str) {
        return str.substring(0, str.length - 2);
    }
    
    $("#rightArrow").click(function(e){
        var leftPosition = getDimention($("#contenu").css('left'));
        var widthContenu = getDimention($("#contenu").css("width"));
        var widthConteneur = getDimention($("#conteneur").css("width"));
        var widthArrow = getDimention($("#leftArrow").css("width"));
        var movable = parseInt(widthContenu) - parseInt(widthConteneur) +  parseInt(widthArrow) ;
        if (movable > 0) {
            var nextLeftPosition = parseInt(leftPosition) - parseInt(step);
            if (nextLeftPosition > -movable ) {
                leftPosition = nextLeftPosition;
            } else {
                leftPosition = movable * (-1);
            }
        }
        
        leftPosition = leftPosition + "px";
        $("#contenu").css('left', leftPosition);
    });
    
    $("#leftArrow").click(function(e){
        var leftPosition = getDimention($("#contenu").css('left'));
        var borneMin = {{$widthFleche}} + {{$widthJour}} + {{$widthLieux}};
        var nextLeftPosition = parseInt(leftPosition) + parseInt(step);
        if (nextLeftPosition < borneMin ) {
            leftPosition = nextLeftPosition;
        } else {
            leftPosition = borneMin;
        }
        leftPosition += "px";
        $("#contenu").css('left', leftPosition);
    });
</script>
@stop

