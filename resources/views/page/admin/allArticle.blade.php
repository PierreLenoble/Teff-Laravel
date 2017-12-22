@extends('partial.admin.body')

@section('page')
    <div class="titrePage">
        @php
            $titre = "";
            switch ($typeArticle) {
                case "Evenement 2015" : 
                    $titre = "Les évènements 2015"; 
                    break;

                case "News" : 
                    $titre = "Les news";  
                    break;
            }
        @endphp
        {{$titre}}
    </div>
    
    @if ($erreur != "")
    <div class="msgErr"><p>{!! $erreur !!}</p></div>
    <br />
    @endif
    
    @if ($confirm != "")
    <div class="msgConfirm"><p>{!! $confirm !!}</p></div>
    <br />
    @endif
    
    
    <a class="buttonPetitBleu" href="{{ $newArticleUrl}}">
        @php 
        switch ($typeArticle) {
            case "Evenement 2015" : echo "Ajouter un nouvel évènement 2015"; break;
            case "News" : echo "Ajouter une nouvelle news"; break;
        }
        @endphp
    </a>
    <br /><br />

    @foreach ($articles as $article)
    <table>
        <tr>
            <th colspan="4" style="width:755px; height:25px; border: 1px solid #3e3e3e; font-size:1.2em; line-height: 25px; vertical-align: middle; font-weight:bold; text-align: center; background-color: #F3D3D3">
                <u>Article {{ $article->ordreArticle }} : </u>
            </th>
        </tr>
        <tr>
            <td style="border:1px solid black; vertical-align: top; text-align: center; margin:auto; " rowspan="2">
                <center>
                    <img src="{{ $path['image'] }}{{ $article->urlImageArticle }}" style = "width:200px"/>
                </center>
                <center>
                @php
                    $route = "";
                    switch ($typeArticle) {
                        case "Evenement 2015" : 
                            $route = route('admin_modifEvenement2015', ['idEvenement2015' => $article->idArticle]); 
                            break;
                            
                        case "News" : 
                            $route = route('admin_modifNews', ['idNews' => $article->idArticle]);  
                            break;
                    }
                @endphp
                <a class="buttonAction" href="{!! $route !!}">Modifier</a>
                <br>
                @php
                    $route = "";
                    switch ($typeArticle) {
                        case "Evenement 2015" : 
                            $route = route('admin_deleteEvenement2015', ['idEvenement2015' => $article->idArticle]); 
                            break;
                            
                        case "News" : 
                            $route = route('admin_deleteNews', ['idNews' => $article->idArticle]);  
                            break;
                    }
                @endphp
                <a id="delete-{{$loop->iteration}}" class="buttonPetitBleu" href="{!! $route !!}">Supprimer</a>
                <br/>
                <br/>
                </center>
            </td>
            <td class="tdTextFr" style = "border-color: darkblue; background-color: lightblue; ">
                <div style="color:darkblue; border-color: lightblue; width:250px;">
                    <b><u>titre Fr : </u></b><br><br>
                    {{ $article->traductions()->where('initialLangue', 'fr')->first()->titreArticle }}
                </div>
            </td>
            
            <td class="tdTextFr" style = "border-color: black;background-color: #EEC; ">
                <div style="color:#882; border-color: #EEC; width:250px;">
                    <b><u>article En : </u></b><br><br>
                    {{ $article->traductions()->where('initialLangue', 'en')->first()->titreArticle }}
                </div>
            </td>
            
        </tr>
        <tr>
            <td class="tdTextFr" style = "border-color: darkblue; background-color: lightblue; ">
                <div style="color:darkblue; border-color: lightblue;min-height:175px; height:100% ; overflow: hidden; width:250px;">
                    <b><u>article Fr : </u></b><br><br>
                    @php
                        $len = 250;
                        $txt = $article->traductions()->where('initialLangue', 'fr')->first()->contenuArticle;
                        $txt = html_entity_decode(strip_tags($txt));
                        if (str_word_count($txt, 0) > $len) {
                            $words = str_word_count($txt, 2);
                            $pos = array_keys($words);
                            $txt = substr($txt, 0, $pos[$len]) . '[...]';
                        }
                        @endphp
                    {!!  $txt !!}
                </div>
            </td>
            <td class="tdTextFr" style = "border-color: black;background-color: #EEC; ">
               <div style="color:#882; border-color: #EEC; min-height:175px; height:100%; overflow: hidden; width:250px;">
                    <b><u>article En : </u></b><br><br>
                    @php
                        $len = 250;
                        $txt = $article->traductions()->where('initialLangue', 'en')->first()->contenuArticle;
                        $txt = html_entity_decode(strip_tags($txt));
                        if (str_word_count($txt, 0) > $len) {
                            $words = str_word_count($txt, 2);
                            $pos = array_keys($words);
                            $txt = substr($txt, 0, $pos[$len]) . '[...]';
                        }
                        @endphp
                    {!!  $txt !!}
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
    
    @if ($articles->count()==0)
        <div class="warning">
            @php
                switch ($typeArticle) {
                    case "Evenement 2015" : echo "----- Il n'y a aucun evenement 2015 -----"; break;
                    case "News" : echo "----- Il n'y a aucune news-----"; break;
                }
            @endphp
        </div>
    @endif
    
    <script type="text/javascript">
        $(function() {
            $('a[id^="delete-"]').click(function(){
                @php
                    switch ($typeArticle) {
                        case "Evenement 2015" : echo "return confirm(\"Êtes-vous sur de vouloir supprimer cet evenement 2015 ?\");"; break;
                        case "News" : echo "return confirm(\"Êtes-vous sur de vouloir supprimer cette news ?\");"; break;
                    }
                @endphp
                
            });
        });
    </script>
@stop

