<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GiftApplication') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



</head>
<body>
<div id="app">
    @section('header')
        @include('layouts.header')
    @endsection
    @yield('header')
    <div class="container marketing">

        <div class="row">
            <div class="col-md-12">


                @section('menu-bar')
                    <div class="row">
                        <div class="col-md-12">
                            <ul id="navigation-user" class="list-inline">
                                <li class="list first">
                                    <a title="gifts I'm asking for" href="/list/" class="selected">@upperText(my lists)</a>
                                </li>
                                <li class="gift">
                                    <a title="people I'm shopping for" data-toggle="modal" data-target="#createNew">@upperText(Create new list)</a>
                                </li>
                                <li class="group">
                                    <a title="who can see each other's lists" href="/group/">@upperText(my preferences)</a>
                                </li>
                                <li class="event">
                                    <a title="upcoming gift occasions" href="/event/">@upperText(FRIENDS LIST)</a>
                                </li>
                                <li class="settings">
                                    <a title="settings" href="/settings/">@upperText(settings)</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endsection
                @yield('menu-bar')
            </div>
        </div>
        <div class="row">
            @section('sidebar')
            @endsection
            @yield('sidebar')
            <div class="col-md-3">

            </div>

            @yield('content')
        </div>
    </div><!-- /.container -->


</div>



<form action="{{ url('giftlist') }}" method="post">
    {{--@csrf--}}
{{ csrf_field() }}
<!-- Modal create new list -->
    {{--<div class="modal fade" id="newList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h3 class="modal-title" id="exampleModalLabel">@upperText(Create new list )</h3>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="modal-footer">--}}
                        {{--<div class="typebtn" id="forme" data-value="forme">For me</div>--}}
                        {{--<div class="typebtn"  id="forfriend" data-value="forfriend">For Friend</div>--}}
                        {{--<div class="typebtn" id="forchild" data-value = "forchild">For child</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<input type="hidden" id="listType" name="type" value="{{old('listType')}}">--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- Modal create new list -->
    <div class="modal fade" id="createNew" tabindex="-1" role="dialog" aria-labelledby="createNewList" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="createNewList">@upperText(Create new list )</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{--@if ($errors->any())--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div><br />--}}
                {{--@endif--}}
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif


                <div class="modal-body">
                    <div class="form-group">
                        <label for="listName">List Name</label>
                        <input type="text" class="form-control" id="listName" name="name" value="{{old('name')}}" placeholder="your list name">
                        <small id="listName" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class='col-sm-12'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker2'>
                                <input type='text' class="form-control" id='datetimepicker' name="date"/>
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4" style="margin-left:38px">

                           <p> <lable>For me</lable>
                            <input type="radio" name="type" value="1"></p>
                            <p> <lable>For a friend</lable>
                            <input type="radio" name="type" value="2"></p>
                            <p><lable>For child</lable>
                            <input type="radio" name="type" value="3"></p>
                        </div>
                    </div>
                    <!-- Material switch -->
                    <div class="form-group">
                        <label class="switch">
                            <p></p>
                            <input type="checkbox" name="public" checked>
                            <span class="slider round"></span>
                            <p>public</p>
                        </label>
                    </div>

                    {{--datepicker--}}
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </div>
        </div>
    </div>
</form>




@section('footer')
    @include('layouts.footer')
@endsection
@yield('footer')
@yield('additional-scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/datepicker.js') }}"></script>
</body>
</html>
