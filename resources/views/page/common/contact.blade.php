@extends('partial.2016.layout')

@section('titre')
    TEFF 2016 - Contact
@stop

@section('css')
<link rel="stylesheet" href="{{$path['css']}}red_article.css"/>
@stop

@section('js')
@stop

@section('body')
<div class="blockMain">
        <p><strong>"EOP!" Asbl  (Extra & Ordinary People !) Festival international de films</strong></p>
        Siège social : Rue des Trois Tilleuls, 57, 1170 Bruxelles<br/>
        <br/>
        Siège d’exploitation : 212, chée de la Hulpe, 1170 Bruxelles<br/>
        <br/>
        Tel : +32 (0)2/673.27.89   <br/><br/>
        Mail : eop AROBASE hotmail.be <br/>
        <br/>
        N° entreprise / TVA : 0831.049.775 <br/>
        <br/>
        <br/>
        <p><strong>Personne de contact : Luc Boland</strong></p>
        Tel : +32 (0)476/66.76.13<br/>
        Mail : eop AROBASE skynet.be<br/>
        <br/>
        <br/>
        <p><strong>Direction générale et artistique : Luc Boland</strong></p>
        Tel : +32 (0)476/66.76.13<br/>
        Mail : eop AROBASE skynet.be<br/>
        <br/>
        <br/>
        <p><strong>Administration et finance : Mr Gilles Orts</strong></p>
        Tel : +32 (0)484/28.78.29 <br/>
        Mail : eopfestival AROBASE hotmail.be<br/>
        <br/>
        <br/>
        <p><strong>Ressources humaines et bénévolat : Vincent Boland</strong></p>
        Tel : +32 (0)473/502.733 <br/>
        Mail : eventlou AROBASE gmail.com<br/>
</div>
@stop

@section('menu')
    @include('partial.2016.menu')
@stop

@section('soutiens')
    @include('partial.2016.soutiens')
@stop

@section('footer')
    @include('partial.2016.footer')
@stop
