@extends('layouts.app')

@section('sidebar')
    <div class="col-md-5">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">List Name</th>
                <th scope="col">Event Date</th>
                <th scope="col">Public list</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($giftlists as $product)
                <tr>
                    <td><a href="">{{$product['name']}}</a></td>
                    <td>{{$product['date']}}</td>
                    <td>{{$product['public'] == 1 ? 'Yes' : 'No'}}</td>
                    <td>
                        <a href="/giftlist/{{$product['id']}}/edit" data-id="{{$product['id']}}" data-target="#editList">Edit</a>
                        <form action="{{ route('giftlist.destroy', $product['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('content')
    <div class="col-md-7">
        content
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
                @if(isset($list))
                    <h4>{{$list['name']}}</h4>

                    <form action="{{ route('giftlist.destroy', $list['id'])}}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Add item</button>
                    </form>
                @endif
{{--{{var_dump($list)}}--}}

        </div>
    </div>
@endsection


<form action="{{ url('giftlist') }}" method="post">
{{--@csrf--}}
{{ csrf_field() }}
<!-- Modal create new list -->
    <div class="modal fade" id="editList" tabindex="-1" role="dialog" aria-labelledby="createNewList" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="createNewList">@upperText(Edit gift list )</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

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
