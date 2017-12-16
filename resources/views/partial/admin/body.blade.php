@extends('partial.admin.layout')

@section('body')
    <div class="layoutCadreGen">
    <div class="layoutHead">
        Administration du site
    </div>
    <div class="layoutMenu">
        <ul class="menu">
            <li>Général
                <ul>
                    <li><a href="@php echo route('admin_allRealisateur'); @endphp">les réalisateurs</a></li>
                    <li><a href="@php echo route('admin_disconnect'); @endphp">les news du site</a></li>
                    <li><a href="@php echo route('admin_disconnect'); @endphp">les films</a></li>
                    <li><a href="@php echo route('admin_disconnect'); @endphp">les evenements</a></li>
                    <li><a href="@php echo route('admin_disconnect'); @endphp">les seance</a></li>
                    <li><a href="@php echo route('admin_disconnect'); @endphp">les traductions</a></li>
                </ul>
            </li>
        </ul>
        <ul class="menu">
            <li>Divers
                <ul>
                    <li><a href="@php echo route('admin_disconnect'); @endphp">deconnection</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="layoutBody">
        @yield('page')  
        <div class="bottomSpacer"></div>
    </div>
    <div class="clear"></div>
    </div>
@stop