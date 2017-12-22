@extends('partial.admin.body')

@section('page')

@php
    $titre = "";
    switch ($typeArticle) {
        case "Evenement 2015" : 
            $titre = "Création d'un évènements 2015"; 
            break;

        case "News" : 
            $titre = "Création d'une news";  
            break;
    }
@endphp
<center><h1>{{$titre}}</h1></center>
@if ($erreur != "")
<div class="msgErr"><p>{!! $erreur !!}</p></div>
<br />
@endif

@if ($confirm != "")
<div class="msgConfirm"><p>{!! $confirm !!}</p></div>
<br />
@endif
<img src='{{$path['image']}}{{$imgArticle}}' name="imageArticle" id="imageArticle" style="visibility:hidden">
@php
    $image = "";
    switch ($typeArticle) {
        case "Evenement 2015" : 
            $image = "Image de l'évènements 2015 : "; 
            break;

        case "News" : 
            $image = "Image de la news : ";  
            break;
    }
@endphp
<table>
    <tr>
        <td style='width: 200px;'><span class="inputInitule" style="font-size: 0.8em;">{{$image}}</span></td>
        <td style='width: 400px;'><input id="ckfinder-input-1" type="text" name="ckfinder-input-1"  value="{{$imgArticle}}" readonly style='width: 400px;'></td>
        <td style='width: 150px;'><button id="ckfinder-modal-1" class="button-a button-a-background" style='width: 145px;'>Browse Server</button></td>
    </tr>
    
<form id="form" method="post" action="{{ $newArticleUrl }}" onsubmit="go()">
    {{ csrf_field() }}
    @php
        $titre = "";
        switch ($typeArticle) {
            case "Evenement 2015" : 
                $titre = "Titre de l'évènements 2015"; 
                break;

            case "News" : 
                $titre = "Titre de la news";  
                break;
        }
    @endphp
        <tr>
            <td><span class="inputInitule" style="font-size: 0.8em;">{{$titre}} (fr) : </span></td>
            <td colspan='2' style='width: 550px;'><input id="titreArticleFr" type="text" name="titreArticleFr" value="{{$titreArticleFr}}" style='width: 550px;'></td>
        </tr>
        <tr>
            <td><span class="inputInitule" style="font-size: 0.8em;">{{$titre}} (en) : </span></td>
            <td colspan='2' style='width: 550px;'><input id="titreArticleEn" type="text" name="titreArticleEn" value="{{$titreArticleEn}}" style='width: 550px;'></td>
        </tr>
    </table>
    
    <br /><br /><br /><br />
    @php
        $contenuTitre = "";
        switch ($typeArticle) {
            case "Evenement 2015" : 
                $contenuTitre = "Contenu de l'évènements 2015"; 
                break;

            case "News" : 
                $contenuTitre = "Contenu de la news";  
                break;
        }
    @endphp
    <span class="inputInitule">{{$contenuTitre}} en francais : </span><br /><br />
    <textarea name="contenuArticleFr" id="presentationFr">
    {!!$contenuArticleFr!!}
    </textarea>
    
    <br /><br /><br /><br />
    
    <span class="inputInitule">{{$contenuTitre}}  en anglais : </span><br /><br />
    <textarea name="contenuArticleEn" id="presentationEn">
    {!!$contenuArticleEn!!}
    </textarea>
    <br /><br />
    <input type="hidden" name="urlImageArticle" id = "urlImageArticle">
    <input type="hidden" name="typeArticle" id = "typeArticle" value="{{$typeArticle}}">
    <center><input type=submit value="valider les textes et le nom"></center>       
                
</form><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<script>
    
    var editeurFr = CKEDITOR.replace('presentationFr', {
            toolbar: 'Basic'
        },
        {
            language: "fr"
        });
    var editeurEn = CKEDITOR.replace('presentationEn',
        {
            toolbar: 'Basic'
        },
        {
            language: "fr"
        });
        
        
    CKFinder.setupCKEditor(editeurFr, null, {} );
    CKFinder.setupCKEditor(editeurEn, null, {} );

    var button1 = document.getElementById( 'ckfinder-modal-1' );
    var img = document.getElementById( 'ckfinder-modal-1' );

    button1.onclick = function() {
            selectFileWithCKFinder( 'ckfinder-input-1' );
    };

    function selectFileWithCKFinder( elementId ) {
            CKFinder.modal( {
                    chooseFiles: true,
                    width: 800,
                    height: 600,
                    onInit: function( finder ) {
                            finder.on( 'files:choose', function( evt ) {
                                    var file = evt.data.files.first();
                                    var output = document.getElementById( elementId );
                                    output.value = file.getUrl();
                                    $( "#imageArticle" ).attr("src",file.getUrl());
                                    $( "#imageArticle" ).css("visibility","visible");
                            } );

                            finder.on( 'file:choose:resizedImage', function( evt ) {
                                    var output = document.getElementById( elementId );
                                    output.value = evt.data.resizedUrl;
                                    $( "#imageArticle" ).attr("src",file.getUrl());
                                    $( "#imageArticle" ).css("visibility","visible");
                            } );
                    }
            } );
    }
    
    function go() {
        var fieldImg = document.getElementById( 'ckfinder-input-1' );
        var fieldImgForm = document.getElementById( 'urlImageArticle' );
        fieldImgForm.value = fieldImg.value;
        return true;
    }
    
    if ($( "#imageArticle" ).attr("src") != "{{$path['image']}}") {
         $( "#imageArticle" ).css("visibility","visible");
    }
</script>

@stop

