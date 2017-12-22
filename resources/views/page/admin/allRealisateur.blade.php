@extends('partial.admin.body')

@section('page')
    <div class="titrePage">Les réalisateurs</div>
    
    @if ($erreur != "")
    <div class="msgErr"><p>{!! $erreur !!}</p></div>
    <br />
    @endif
    
    @if ($confirm != "")
    <div class="msgConfirm"><p>{!! $confirm !!}</p></div>
    <br />
    @endif
    
    <a class="buttonPetitBleu" href="{{ $newRealisateurUrl}}">Ajouter un nouveau réalisateur</a>
    <br /><br />

    @foreach ($realisateurs as $realisateur)
    <table>
        <tr>
            <th colspan="4" style="width:755px; height:25px; border: 1px solid #3e3e3e; font-size:1.2em; line-height: 25px; vertical-align: middle; font-weight:bold; text-align: center; background-color: #F3D3D3">{{ $realisateur->nomRealisateur }}</th>
        </tr>
        <tr>
            <td style="border:1px solid black; vertical-align: top; text-align: center; margin:auto;">
            <center>
                <img src="{{ $path['image'] }}{{ $realisateur->urlImageRealisateur }}"/>
            </center>
            <center>
                <a class="buttonAction" href="@php echo route('admin_modifRealisateur', ['idRealisateur' => $realisateur->idRealisateur]);  @endphp ">Modifier</a>
                @if ($realisateur->films()->count() == 0)
                <br>
                    <a id="delete-{{$loop->iteration}}" class="buttonPetitBleu" href="@php echo route('admin_deleteRealisateur', ['idRealisateur' => $realisateur->idRealisateur]);  @endphp ">Supprimer</a>
                @endif
                </center>
            </td>
            <td class="tdTextFr" style = "border-color: darkblue; background-color: lightblue; ">
                <div style="color:darkblue; border-color: lightblue;min-height:175px; height:100% ">
                    <b><u>presentation Fr : </u></b><br><br>
                    {!!  $realisateur->traductions()->where('initialLangue', 'fr')->first()->presentationRealisateur !!}
                </div>
            </td>
            
            <td class="tdTextFr" style = "border-color: black;background-color: #EEC; ">
                <div style="color:#882; border-color: #EEC; min-height:175px; height:100% ">
                    <b><u>presentation En : </u></b><br><br>
                    
                    {!!  $realisateur->traductions()->where('initialLangue', 'en')->first()->presentationRealisateur !!}
                </div>
            </td>
            
        </tr>
        @if ($realisateur->films()->count() > 0)
        <tr>
            
            <td colspan="3" class="tdTextFr"  style = "border-color: #555; min-height: 15px;">
                <div style="background-color: #CCC; color:#555; border-color: #CCC;">
                    <b><u>Films réalisés :</u></b><br><br>
                
                    @foreach ($realisateur->films()->get() as $film)
                    
                    {{$film->traductions()->where('initialLangue', 'fr')->first()->nomFilm}}<br>
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
    
    @if ($realisateurs->count()==0)
        <div class="warning">----- Il n'y a aucun réalisateur -----</div>
    @endif
    
    <script type="text/javascript">
        $(function() {
            $('a[id^="delete-"]').click(function(){
                return confirm("Êtes-vous sur de vouloir supprimer ce réalisateur ?");
            });
        });
    </script>
@stop

