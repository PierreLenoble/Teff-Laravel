@extends('partial.admin.body')

@section('page')
    <div class="titrePage">Les films</div>
    
    @if ($erreur != "")
    <div class="msgErr"><p>{!! $erreur !!}</p></div>
    <br />
    @endif
    
    @if ($confirm != "")
    <div class="msgConfirm"><p>{!! $confirm !!}</p></div>
    <br />
    @endif
    
    <a class="buttonPetitBleu" href="{{ $newFilmUrl}}">Ajouter un nouveau film</a>
    <br /><br />

    @foreach ($films as $film)
    <table>
        <tr>
            <th colspan="4" style="width:755px; height:25px; border: 1px solid #3e3e3e; font-size:1.2em; line-height: 25px; vertical-align: middle; font-weight:bold; text-align: center; background-color: #F3D3D3">
                {{ $film->traductions()->where('initialLangue', 'fr')->first()->nomFilm }}
            </th>
        </tr>
        <tr>
            <td style="border:1px solid black; vertical-align: top; text-align: center; margin:auto;">
            <center>
                <img src="{{ $path['image'] }}{{ $film->urlImageFilm }}"/>
            </center>
            <center>
                <a class="buttonAction" href="@php echo route('admin_modifFilm', ['idFilm' => $film->idFilm]);  @endphp ">Modifier</a>
                @if ($film->filmParSeances()->count() == 0)
                <br>
                    <a id="delete-{{$loop->iteration}}" class="buttonPetitBleu" href="@php echo route('admin_deleteFilm', ['idFilm' => $film->idFilm]);  @endphp ">Supprimer</a>
                @endif
                </center>
            </td>
            <td class="tdTextFr" style = "border-color: darkblue; background-color: lightblue; ">
                <div style="color:darkblue; border-color: lightblue;min-height:175px; height:100% ">
                    <b><u>synopsis Fr : </u></b><br><br>
                    {!!  $film->traductions()->where('initialLangue', 'fr')->first()->resumeFilm !!}
                </div>
            </td>
            
            <td class="tdTextFr" style = "border-color: black;background-color: #EEC; ">
                <div style="color:#882; border-color: #EEC; min-height:175px; height:100% ">
                    <b><u>synopsis En : </u></b><br><br>
                    
                    {!!  $film->traductions()->where('initialLangue', 'en')->first()->resumeFilm !!}
                </div>
            </td>
            
        </tr>
        @if ($film->filmParSeances()->count() > 0)
        <tr>
            
            <td colspan="3" class="tdTextFr"  style = "border-color: #555; min-height: 15px;">
                <div style="background-color: #CCC; color:#555; border-color: #CCC;">
                    <b><u>Séances :</u></b><br><br>
                
                    @php
                        $filmParSeances = $film->filmParSeances()->get();
                        $last="";
                    @endphp
                    
                    @foreach ($filmParSeances as $seance)
                        @php
                            $dateTime = new DateTime($seance->seance()->first()->dateTimeSeance);
                            $date = $dateTime->format('d-M-Y H:i');
                            echo $date." - ".$seance->seance()->first()->traductions()->where('initialLangue', 'fr')->first()->nomSeance."<br>";
                        @endphp
                    @endforeach  
                </div>
            </td>
        </tr>
        @endif
    </table>
        
    <br>
    <br>
    <br>
    <br>
    <br>
    @endforeach
    
    @if ($films->count()==0)
        <div class="warning">----- Il n'y a aucun réalisateur -----</div>
    @endif
    
    <script type="text/javascript">
        $(function() {
            $('a[id^="delete-"]').click(function(){
                return confirm("Êtes-vous sur de vouloir supprimer ce film ?");
            });
        });
    </script>
@stop

