@extends('partial.admin.body')

@section('page')
    
    <div class="titrePage">Les traductions</div>
    
    @if ($erreur != "")
    <div class="msgErr"><p>{!! $erreur !!}</p></div>
    <br />
    @endif
    
    @if ($confirm != "")
    <div class="msgConfirm"><p>{!! $confirm !!}</p></div>
    <br />
    @endif
    
    @php
        $lastPage = "";
        $i = 1;
    @endphp
    
        <form id="form" method="post" action="{{ $modifTraductionUrl }}">
            {{ csrf_field() }}
    @foreach ($traductions as $traduction)
        @if ($lastPage != $traduction['nomPage'])
        <hr>
        <h1>{{$traduction['nomPage']}}</h1>
        @php
            $lastPage = $traduction['nomPage'];
        @endphp
        @endif
        
        @php
            if ($i==1) {
                $style = "border:1px solid black;";
                $i=0;
            } else {
                $style = "border:1px solid green;";
                $i=1;
            }
        @endphp
        <table style="width:755px; border:1px solid black">
            <tr>
                <td style="height:25px; border: 1px solid #3e3e3e; font-size:1.2em; line-height: 25px; vertical-align: middle; font-weight:bold; text-align: center; background-color: #F3D3D3">
                    {{$traduction['nomClePage']}}
                </td>
            </tr>
            <tr>
                <td style = "border: 1px solid black;background-color: #EEC;">
                    <u>Traduction francaise : </u><br><br>
                    @if(in_array($traduction['id'], $tabTxt))
                        <textarea name="{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}_fr" id="{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}_fr">
                            {!! $traduction['fr'] !!}
                        </textarea>

                        <script>
                            var editeurFr = CKEDITOR.replace("{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}_fr", {toolbar: 'Basic'}, {language: "fr"});
                        </script>
                    @else
                        <input style="width:100%" name="{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}_fr" id="{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}.fr" value="{{$traduction['fr']}}">
                    @endif
                    <br><br>
                </td>
            </tr>
            <tr>
                <td style = "border: 1px solid darkblue; background-color: lightblue; ">
                    <u>Traduction anglaise : </u><br><br>
                    @if(in_array($traduction['id'], $tabTxt))
                        <textarea name="{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}_en" id="{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}.en">
                            {!! $traduction['en'] !!}
                        </textarea>

                        <script>
                            var editeurFr = CKEDITOR.replace("{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}_en", {toolbar: 'Basic'}, {language: "fr"});
                        </script>
                    @else
                        <input style="width:100%" name="{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}_en" id="{{$traduction['nomPage']}}_{{$traduction['nomClePage']}}_en" value="{{$traduction['en']}}">
                    @endif<br><br>
                </td>
            </tr>
        </table>
        <br><br>
        <input type=submit value="valider les traductions">
        <br><br>
        
        
    @endforeach
    </form>
@stop

