@extends('layouts.app')

{{--@section('menu-bar')--}}
{{--menubar--}}
{{--@endsection--}}
@section('sidebar')
    <div class="col-md-4">
        left
    </div>
@endsection
@section('content')
    {{--<div class="col-md-8">--}}
        {{--content--}}
        {{--<div class="panel-body">--}}
            {{--@if (session('status'))--}}
                {{--<div class="alert alert-success">--}}
                    {{--{{ session('status') }}--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--@if (Session::has('message'))--}}
                {{--<div class="alert alert-info">{{ Session::get('message') }}</div>--}}
            {{--@endif--}}
            {{--<table class="table">--}}
                {{--<thead class="thead-dark">--}}
                {{--<tr>--}}
                    {{--<th scope="col">#</th>--}}
                    {{--<th scope="col">Product Name</th>--}}
                    {{--<th scope="col">Product Description</th>--}}
                    {{--<th scope="col">Company</th>--}}
                    {{--<th scope="col">Available</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach($giftlist as $product)--}}
                    {{--<tr>--}}
                        {{--<th scope="row">{{$product->id}}</th>--}}
                        {{--<td>{{$product->name}}</td>--}}
                        {{--<td>{{$product->description}}</td>--}}
                        {{--<td>{{$product->date}}</td>--}}
                        {{--<td>{{$product->public ? 'Yes' : 'No'}}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}

        {{--</div>--}}
    {{--</div>--}}
@endsection
