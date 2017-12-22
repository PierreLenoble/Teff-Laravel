@extends('partial.admin.body')

@section('page')
<center><h1>Modification de la séance du 
    @php
        $dateTime = new DateTime($dateSeance);
        $date = $dateTime->format('d-M-Y à H:i');
        echo $date." à ".$nomLieuSeance."<br>";
        $date = $dateTime->format('d-m-Y');
        $heure = $dateTime->format('H');
        $minute = $dateTime->format('i');
    @endphp
    </h1>
</center>

@if ($erreur != "")
<div class="msgErr"><p>{!! $erreur !!}</p></div>
<br />
@endif

@if ($confirm != "")
<div class="msgConfirm"><p>{!! $confirm !!}</p></div>
<br />
@endif
    
<form id="form" method="post" action="{{ $modifSeanceUrl }}" onsubmit="go()">
    {{ csrf_field() }}
    <center>
    <table id="tableForm" name="tableForm">
        <tr>
            <td><span class="inputInitule" style="font-size: 0.8em;">Date de la séance : </span></td>
            <td style='width: 550px;'>
                <select id="dateSeance" type="text" name="dateSeance" style="width: 400px;">
                    <option value="10-11-2015" @if($date == "10-11-2015") selected @endif>10-11-2015</option>
                    <option value="11-11-2015" @if($date == "11-11-2015") selected @endif>11-11-2015</option>
                    <option value="12-11-2015" @if($date == "12-11-2015") selected @endif>12-11-2015</option>
                    <option value="13-11-2015" @if($date == "13-11-2015") selected @endif>13-11-2015</option>
                    <option value="14-11-2015" @if($date == "14-11-2015") selected @endif>14-11-2015</option>
                    <option value="15-11-2015" @if($date == "15-11-2015") selected @endif>15-11-2015</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><span class="inputInitule" style="font-size: 0.8em;">Heure de la séance : </span></td>
            <td>
                <select id="heureSeance" type="text" name="heureSeance" style="width: 200px;">
                    @for ($i = 9; $i < 23; $i++)
                        <option value="{{$i}}" @if($heure == $i) selected @endif>
                            @if ($i<10)
                                0{{$i}} heure
                            @else
                                {{$i}} heure
                            @endif
                        </option>
                    @endfor
                </select>
                <select id="minuteSeance" type="text" name="minuteSeance" style="width: 200px;">
                    @for ($i = 0; $i < 60; $i=$i+5)
                        @php
                            if ($i<10) {
                                $tmp="0".$i;
                            } else {
                                $tmp="".$i;
                            }
                        @endphp
                        <option value="{{$tmp}}" @if($minute == $i) selected @endif>
                            {{$tmp}} minutes
                        </option>
                    @endfor
                </select>
            </td>
        </tr>

        <tr>
            <td><span class="inputInitule" style="font-size: 0.8em;">Lieu de la séance : </span></td>
            <td>
                <select id="lieuSeance" type="text" name="lieuSeance" style="width: 400px;">
                    @foreach($lieuSeances as $lieu)
                        @php
                            if($lieu->adminNomLieuSeance == $lieuSeance) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                        @endphp
                        <option value="{{$lieu->adminNomLieuSeance}}" {{$selected}}>
                            {{$lieu->adminNomLieuSeance}}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td><span class="inputInitule" style="font-size: 0.8em;">Durée de la séance : </span></td>
            <td>
                <input id="dureeSeance" type="text" name="dureeSeance" style="width: 400px;" value="{{$dureeSeance}}"/> Minutes
            </td>
        </tr>

        <tr>
            <td><span class="inputInitule" style="font-size: 0.8em;">Nom de la séance (fr) : </span></td>
            <td>
                <input id="nomSeanceFr" type="text" name="nomSeanceFr" style="width: 400px;" value="{{$nomSeanceFr}}"/>
            </td>
        </tr>

        <tr>
            <td><span class="inputInitule" style="font-size: 0.8em;">Nom de la séance (en) : </span></td>
            <td>
                <input id="nomSeanceEn" type="text" name="nomSeanceEn" style="width: 400px;" value="{{$nomSeanceEn}}"/>
            </td>
        </tr>
        <tr id="trBtnFilms">
            <td colspan=2>
                <br /><br />
                <center><input type="button" value="Ajouter un film" id="addLine"></center><br />
                <center><input type="button" value="Supprimer un film" id="suppLine"></center><br /><br />

            </td>
        </tr>
    @php
        $nbFilm = 0;
    @endphp
    
    @foreach($filmParSeances as $filmParSeance)
        @php
            $nbFilm++;
        @endphp
        <tr id="film-{{$nbFilm}}">
            <td><span class="inputInitule">Film n°{{$nbFilm}} : </span></td>
            <td>
                <select id="film{{$nbFilm}}" name="film[]">
                    <option value="">[Choisir]</option>
                    @foreach($films as $film )
                        @php
                            if($filmParSeance == $film->idFilm) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                        @endphp
                        <option value="{{$film->idFilm}}" {{$selected}}>{{$film->traductions()->where('initialLangue', 'fr')->first()->nomFilm}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    @endforeach
    </table>
    <br /><br /><br />
    <input type=submit value="valider les textes et le nom">
    </center>
                
</form>







<script>
    nbFilm={{count($filmParSeances)}};
    option=''
    @foreach($films as $film)
        +'        <option value="{{$film->idFilm}}">{{$film->traductions()->where('initialLangue', 'fr')->first()->nomFilm}}</option>'
    @endforeach
    ;
    $('#addLine').click(function() {
        nbFilm++;
        $('#tableForm').append('<tr id="film-'+nbFilm+'">'
        +'<td><span class="inputInitule">Film n°'+nbFilm+' : </span></td>'
        +'<td>'
        +'  <select id="film'+nbFilm+'" name="film['+nbFilm+']">'
        +'      <option value="">[Choisir]</option>'
        + option
        +'  </select>'
        +'</td></tr>');
    });
    $('#suppLine').click(function() {

        if (($('#tableForm tr:last').attr('id').split('-')[0]==='film')){
            $('#tableForm tr:last').remove();
            nbFilm--;
        }
    });
    
</script>

@stop

