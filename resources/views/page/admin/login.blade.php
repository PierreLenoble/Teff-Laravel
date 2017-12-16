@extends('partial.admin.layout')

@section('body')
<div style="height:100%; width:100%; ">
<table id="page-login-center-table">
    <tr>
        <td id="page-login-center-td">
            <div id="page-login-center-global">
                
                
                
            <div class="lineLogin1"></div>
            <div class="lineLogin2"></div>
            <div class="lineLogin3"></div>
            <div class="lineLogin4">
            <form action="{{ $urlLogin }}" method="post">
                {{ csrf_field() }}
                <div class="wrapLogin"></div>
                    <table style="margin-left: auto; margin-right: auto;">
                        <tr>
                            <td colspan="2" class="titreLogin">Administration EOP!</td>
                        </tr>
                        <tr>
                            <td class="intituleLogin">login : </td>
                            <td><input type="text" name="login" value="" /></td>
                        </tr>
                        <tr>
                            <td class="intituleLogin">password : </td>
                            <td><input type="password" name="password" value="" /></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="sendLogin"><input type="submit" value="connection" /></td>
                        </tr>
                    </table>
                </form>
                <div class="wrapLogin"></div>
            </div>
            <div class="lineLogin3"></div>
            <div class="lineLogin2"></div>
            <div class="lineLogin1"></div>
            @if ($erreur != "")
                <div class="lineLogin1"></div>
                <div class="lineLogin2"></div>
                <div class="lineLogin3"></div>
                <div class="lineLoginWarning">
                    {{ $erreur }}
                </div>
                <div class="lineLogin3"></div>
                <div class="lineLogin2"></div>
                <div class="lineLogin1"></div>
            @endif
        </div>
            
            
                
                
        </td>
    </tr>
</table>
</div>
@stop

