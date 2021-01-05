<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" style="list-style:none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLanguages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('titles.languages')}}
                            </a>
                            <div class="dropdown-menu nav-item" aria-labelledby="navbarDropdownLanguages">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item"  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        <!-- Authentication Links -->
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->hasRole('superAdmin'))
                            <li class="nav-item">
                                <a class="nav-link">Parents</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link">Students</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link">Stages</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link">Levels</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function()
    {
        $('#stage').on('change' , function () {
            let value = $(this).val();
            $.ajax({
                method  : "GET",
                url : "../../getLevels/" + value,
                success:function(data) {
                    console.log(data.data);
                    var levels = ' ';
                    for(var i = 0; i< data.data.length; i++ ) {
                        levels += '<option value="' + data.data[i]['id'] + '">';
                        if(data.data[i]['name'] == 'titles.one_level'){
                            levels += 'الصف الاول   -  Level One';
                        }
                        if(data.data[i]['name'] == 'titles.two_level'){
                            levels += 'الصف الثاني   -  Level Two';
                        }
                        if(data.data[i]['name'] == 'titles.three_level'){
                            levels += 'الصف الثالث   -   Level Three';
                        }
                        if(data.data[i]['name'] == 'titles.four_level'){
                            levels += 'الصف الرابع   -  Level Four';
                        }
                        if(data.data[i]['name'] == 'titles.five_level'){
                            levels += 'الصف الخامس   -  Level Five';
                        }
                        if(data.data[i]['name'] == 'titles.six_level'){
                            levels += 'الصف السادس   -   Level Six ';
                        }
                        levels += '</option>';
                    }
                    $('#level').html(levels);
                }
            })
        })

    })
</script>
</body>
</html>
