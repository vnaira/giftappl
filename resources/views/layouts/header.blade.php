@section('header')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <ul class="col-md-12 text-right">
                &nbsp;
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
            {{--data-target="#app-navbar-collapse" aria-expanded="false">--}}
            {{--<span class="sr-only">Toggle Navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}

            <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Gift Application') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="">@upperText(Wedding)</a></li>
                    <li><a href="">@upperText(Baby)</a></li>
                    <li><a href="{{ route('login') }}">Wishllist</a></li>
                    <li><a href="{{ route('login') }}">Gift Solution</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" style="color:deepskyblue">Login_</a></li>
                        <li><a href="{{ route('register') }}" style="color:deepskyblue">Registration</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest

                            {{--@auth--}}
                                {{--<a href="{{ url('/home') }}">Home</a>--}}

                                {{--@else--}}
                                    {{--<a href="{{ route('login') }}">Login</a>--}}

                                    {{--@if (Route::has('register'))--}}
                                        {{--<a href="{{ route('register') }}">Register</a>--}}
                                    {{--@endif--}}
                                    {{--@endauth--}}
                </ul>
            </div>
        </div>
    </nav>
@endsection