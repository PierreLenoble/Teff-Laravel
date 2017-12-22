@extends('partial.admin.body')

@section('page')
<center><h1>Modification du réalisateur "{{$nomRealisateur}}"</h1></center>
@if ($erreur != "")
<div class="msgErr"><p>{!! $erreur !!}</p></div>
<br />
@endif

@if ($confirm != "")
<div class="msgConfirm"><p>{!! $confirm !!}</p></div>
<br />
@endif
<img src='{{$path['image']}}{{$imgRealisateur}}' name="imageRealisateur" id="imageRealisateur">
<table>
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Image du réalisateur : </span></td>
        <td><input id="ckfinder-input-1" type="text" name="ckfinder-input-1"  value="{{$imgRealisateur}}" readonly></td>
        <td><button id="ckfinder-modal-1" class="button-a button-a-background">Browse Server</button></td>
    </tr>
    
    
<form id="form" method="post" action="{{ $modifRealisateurUrl }}" onsubmit="go()">
    {{ csrf_field() }}
    
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Nom du réalisateur : </span></td>
        <td colspan='2' style='width: 550px;'><input id="nomRealisateur" type="text" name="nomRealisateur" value="{{$nomRealisateur}}" style='width: 550px;'></td>
    </tr>

    </table>
    
    <br /><br /><br /><br />
    
    <span class="inputInitule">Texte de presentation du réalisateur en francais : </span><br /><br />
    <textarea name="presentationFr" id="presentationFr">
    {!!$presentationFr!!}
    </textarea>
    
    <br /><br /><br /><br />
    
    <span class="inputInitule">Texte de presentation du réalisateur en anglais : </span><br /><br />
    <textarea name="presentationEn" id="presentationEn">
    {!!$presentationEn!!}
    </textarea>
    <br /><br />
    <input type="hidden" name="imgRealisateur" id = "imgRealisateur">
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
                                    $( "#imageRealisateur" ).attr("src",file.getUrl());
                            } );

                            finder.on( 'file:choose:resizedImage', function( evt ) {
                                    var output = document.getElementById( elementId );
                                    output.value = evt.data.resizedUrl;
                                    
                                    $( "#imageRealisateur" ).attr("src",file.getUrl());
                            } );
                    }
            } );
    }
    
    function go() {
        var fieldImg = document.getElementById( 'ckfinder-input-1' );
        var fieldImgForm = document.getElementById( 'imgRealisateur' );
        fieldImgForm.value = fieldImg.value;
        return true;
    }
    
</script>

@stop

