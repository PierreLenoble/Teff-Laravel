@extends('partial.admin.body')

@section('page')
<center><h1>Modification du film '{{$titreFilmFr}}'</h1></center>
@if ($erreur != "")
<div class="msgErr"><p>{!! $erreur !!}</p></div>
<br />
@endif

@if ($confirm != "")
<div class="msgConfirm"><p>{!! $confirm !!}</p></div>
<br />
@endif
<img src='{{$path['image']}}{{$imgFilm}}' name="imageFilm" id="imageFilm" style="visibility:hidden">
<table>
    <tr>
        <td style='width: 200px;'><span class="inputInitule" style="font-size: 0.8em;">Image du film : </span></td>
        <td style='width: 400px;'><input id="ckfinder-input-1" type="text" name="ckfinder-input-1"  value="{{$imgFilm}}" readonly style='width: 400px;'></td>
        <td style='width: 150px;'><button id="ckfinder-modal-1" class="button-a button-a-background" style='width: 145px;'>Browse Server</button></td>
    </tr>
    
    
<form id="form" method="post" action="{{ $newFilmUrl }}" onsubmit="go()">
    {{ csrf_field() }}
    
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Titre du film (fr) : </span></td>
        <td colspan='2' style='width: 550px;'><input id="titreFilmFr" type="text" name="titreFilmFr" value="{{$titreFilmFr}}" style='width: 550px;'></td>
    </tr>
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Titre du film (en) : </span></td>
        <td colspan='2' style='width: 550px;'><input id="titreFilmEn" type="text" name="titreFilmEn" value="{{$titreFilmEn}}" style='width: 550px;'></td>
    </tr>
    
    
    
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Bande d'annonce (fr) : </span></td>
        <td colspan='2' style='width: 550px;'><input id="lienVideoFilmFr" type="text" name="lienVideoFilmFr" value="{{$lienVideoFilmFr}}" style='width: 550px;'></td>
    </tr>
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Bande d'annonce (en) : </span></td>
        <td colspan='2' style='width: 550px;'><input id="lienVideoFilmEn" type="text" name="lienVideoFilmEn" value="{{$lienVideoFilmEn}}" style='width: 550px;'></td>
    </tr>
    
    
    
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">réalisateur : </span></td>
        <td colspan='2' style='width: 550px;'>
            <select id="idRealisateurFilm" name="idRealisateurFilm" style='width: 550px;'>
                @foreach ($realisateurs as $realisateur)
                    @if ($realisateur->idRealisateur == $idRealisateurFilm)
                        <option value="{{$realisateur->idRealisateur}}" selected>{{$realisateur->nomRealisateur}}</option>
                    @else
                        <option value="{{$realisateur->idRealisateur}}" >{{$realisateur->nomRealisateur}}</option>
                    @endif
                
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">année de production: </span></td>
        <td colspan='2' style='width: 550px;'><input id="anneeProductionFilm" type="text" name="anneeProductionFilm" value="{{$anneeProductionFilm}}" style='width: 550px;'></td>
    </tr>
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Interdiction : </span></td>
        <td colspan='2' style='width: 550px;'>
            <select id="interdictionAgeFilm" name="interdictionAgeFilm" style='width: 550px;'>
                <option value="">aucune interdiction</option>
                @if ($interdictionAgeFilm == "12")
                    <option value="12" selected>-12 ans</option>
                @else
                    <option value="12">-12 ans</option>
                @endif
                
                @if ($interdictionAgeFilm == "16")
                    <option value="16" selected>-16 ans</option>
                @else
                    <option value="16">-16 ans</option>
                @endif
                
                @if ($interdictionAgeFilm == "18")
                    <option value="18" selected>-18 ans</option>
                @else
                    <option value="18">-18 ans</option>
                @endif
            </select>
        </td>
    </tr>
    
    
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Metrage : </span></td>
        <td colspan='2' style='width: 550px;'>
            <select id="metrageFilm" name="metrageFilm" style='width: 550px;'>
                @foreach ($metrages as $metrage)
                    @if ($metrageFilm == $metrage->initialMetrage)
                        <option value="{{$metrage->initialMetrage}}" selected>{{$metrage->traductions()->where('initialLangue', 'fr')->first()->nomMetrage}}</option>
                    @else
                        <option value="{{$metrage->initialMetrage}}">{{$metrage->traductions()->where('initialLangue', 'fr')->first()->nomMetrage}}</option>
                    @endif
                @endforeach
                
            </select>
        </td>
    </tr>
    
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Durée du film en minute : </span></td>
        <td colspan='2' style='width: 550px;'><input id="dureeMinuteFilm" type="text" name="dureeMinuteFilm" value="{{$dureeMinuteFilm}}" style='width: 550px;'></td>
    </tr>
    <tr>
        <td><span class="inputInitule" style="font-size: 0.8em;">Boite de production : </span></td>
        <td colspan='2' style='width: 550px;'><input id="boiteProductionFilm" type="text" name="boiteProductionFilm" value="{{$boiteProductionFilm}}" style='width: 550px;'></td>
    </tr>
    
    
    
    
    
    <tr>
        <td valign='top' style="font-size: 0.8em;">Genre du film : </td>
        <td colspan='2' style='width: 550px;'>
            @foreach ($genres as $genre)
                @if (in_array($genre->idGenreFilm, $tabGenreFilm))
                    <input type="checkbox" name="tabGenreFilm[]" value="{{$genre->idGenreFilm}}" checked style="width:20px;">{{$genre->traductions()->where('initialLangue', 'fr')->first()->nomGenreFilm}} <br />
                @else
                    <input type="checkbox" name="tabGenreFilm[]" value="{{$genre->idGenreFilm}}" style="width:20px;">{{$genre->traductions()->where('initialLangue', 'fr')->first()->nomGenreFilm}} <br />
                @endif
            @endforeach
        </td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td valign='top' style="font-size: 0.8em;">Pays du film : </td>
        <td colspan='2' style='width: 550px;'>
            @foreach ($pays as $pay)
                @if (in_array($pay->initialPays, $tabPaysFilm))
                    <input type="checkbox" name="tabPaysFilm[]" value="{{$pay->initialPays}}" checked style="width:20px;"/>{{$pay->traductions()->where('initialLangue', 'fr')->first()->nomPays}} <br />
                @else
                    <input type="checkbox" name="tabPaysFilm[]" value="{{$pay->initialPays}}" style="width:20px;"/>{{$pay->traductions()->where('initialLangue', 'fr')->first()->nomPays}} <br />
                @endif
            @endforeach
        </td>
    </tr>
    
    </table>
    
    <br /><br /><br /><br />
    
    <span class="inputInitule">Synopsis du film en francais : </span><br /><br />
    <textarea name="resumeFilmFr" id="resumeFilmFr">
    {!!$resumeFilmFr!!}
    </textarea>
    
    <br /><br /><br /><br />
    
    <span class="inputInitule">Synopsis du film en anglais : </span><br /><br />
    <textarea name="resumeFilmEn" id="resumeFilmEn">
    {!!$resumeFilmEn!!}
    </textarea>
    <br /><br />
    <input type="hidden" name="urlImageFilm" id = "urlImageFilm">
    <center><input type=submit value="valider les textes et le nom"></center>       
                
</form><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />







<script>
    
    var editeurFr = CKEDITOR.replace('resumeFilmFr', {
            toolbar: 'Basic'
        },
        {
            language: "fr"
        });
    var editeurEn = CKEDITOR.replace('resumeFilmEn',
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
                                    $( "#imageFilm" ).attr("src",file.getUrl());
                                    $( "#imageFilm" ).css("visibility","visible");
                            } );

                            finder.on( 'file:choose:resizedImage', function( evt ) {
                                    var output = document.getElementById( elementId );
                                    output.value = evt.data.resizedUrl;
                                    $( "#imageFilm" ).attr("src",file.getUrl());
                                    $( "#imageFilm" ).css("visibility","visible");
                            } );
                    }
            } );
    }
    
    function go() {
        var fieldImg = document.getElementById( 'ckfinder-input-1' );
        var fieldImgForm = document.getElementById( 'urlImageFilm' );
        fieldImgForm.value = fieldImg.value;
        return true;
    }
    
    if ($( "#imageFilm" ).attr("src") != "{{$path['image']}}") {
         $( "#imageFilm" ).css("visibility","visible");
    }
</script>

@stop

