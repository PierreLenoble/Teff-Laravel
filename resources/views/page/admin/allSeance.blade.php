@extends('partial.admin.body')

@section('page')
    <div class="titrePage">Les séances</div>
    
    @if ($erreur != "")
    <div class="msgErr"><p>{!! $erreur !!}</p></div>
    <br />
    @endif
    
    @if ($confirm != "")
    <div class="msgConfirm"><p>{!! $confirm !!}</p></div>
    <br />
    @endif
    
    <a class="buttonPetitBleu" href="{{ $newSeanceUrl}}">Ajouter une nouvelle seance</a>
    <br /><br />

    @foreach ($seances as $seance)
    <table>
        <tr>
            <th colspan="2" style="width:755px; height:25px; border: 1px solid #3e3e3e; font-size:1.2em; line-height: 25px; vertical-align: middle; font-weight:bold; text-align: center; background-color: #F3D3D3">
                @php
                    $dateTime = new DateTime($seance->dateTimeSeance);
                    $date = $dateTime->format('d-M-Y H:i');
                    echo $date." - ".$seance->lieuSeance()->first()->traductions()->where('initialLangue', 'fr')->first()->nomLieuSeance."<br>";
                @endphp

            </th>
        </tr>
        <tr>
            <td style="border:1px solid black; vertical-align: top; text-align: center; margin:auto; width:100px;" rowspan="2">
                <center>
                    <br>
                    <a class="buttonAction" href="@php echo route('admin_modifSeance', ['idSeance' => $seance->idSeance]);  @endphp ">Modifier</a>
                    <br>
                    <a id="delete-{{$loop->iteration}}" class="buttonPetitBleu" href="@php echo route('admin_deleteSeance', ['idSeance' => $seance->idSeance]);  @endphp ">Supprimer</a>
                </center>
            </td>
            <td class="tdTextFr" style = "border-color: black;background-color: #EEC; ">
                <div style="color:#882; border-color: #EEC;">
                    <b><u>nom de la séance (Fr) : </u></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {!!  $seance->traductions()->where('initialLangue', 'fr')->first()->nomSeance !!}
                </div>
            </td>
        </tr>
        <tr>
            
            <td class="tdTextFr" style = "border-color: darkblue; background-color: lightblue; ">
                <div style="color:darkblue; border-color: lightblue;">
                    <b><u>nom de la séance (En) : </u></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {!!  $seance->traductions()->where('initialLangue', 'en')->first()->nomSeance !!}
                </div>
            </td>
            
        </tr>
        
    </table>
        
    <br>
    <br>
    <br>
    <br>
    <br>
    @endforeach
    
    
    <script type="text/javascript">
        $(function() {
            $('a[id^="delete-"]').click(function(){
                return confirm("Êtes-vous sur de vouloir supprimer cette séance ?");
            });
        });
    </script>
@stop

