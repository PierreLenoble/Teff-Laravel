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
                    <li><a href="@php echo route('admin_allNews'); @endphp">les news du site</a></li>
                    <li><a href="@php echo route('admin_allFilm'); @endphp">les films</a></li>
                    <li><a href="@php echo route('admin_allEvenement2015'); @endphp">les evenements</a></li>
                    <li><a href="@php echo route('admin_allSeance'); @endphp">les seance</a></li>
                    <li><a href="@php echo route('admin_modifTraduction'); @endphp">les traductions</a></li>
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