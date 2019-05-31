@extends('layouts.app')

@section('header')
    @parent
@endsection

@section('content')
    <div class="col-md-8">

        <div class="col-lg-12">

            <form action="{{route('giftlist.update', $list['id'])}}" method="post">
                @method('PATCH')
                @csrf

            <!-- Modal create new list -->
                <div class="" id="editList" tabindex="-1" role="dialog" aria-labelledby="createNewList" aria-hidden="true">
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
                                    <input type="text" class="form-control" id="listName" name="name" value="{{$list['name']}}" placeholder="your list name">
                                    <small id="listName" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>

                                <div class='col-sm-12'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker2'>
                                            <input type='text' class="form-control" id='datetimepicker' name="date" value="{{$list['date']}}"/>
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
                                            <input type="radio" name="type" value="1" {{$list['type']== 1? 'checked': ''}}></p>
                                        <p> <lable>For a friend</lable>
                                            <input type="radio" name="type" value="2" {{$list['type']== 2? 'checked': ''}}></p>
                                        <p><lable>For child</lable>
                                            <input type="radio" name="type" value="3" {{$list['type']== 3? 'checked': ''}}></p>
                                    </div>
                                </div>
                                <!-- Material switch -->
                                <div class="form-group">
                                    <label class="switch">
                                        <p></p>
                                        <input type="checkbox" name="public" {{isset($list['public']) && $list['public']== 0 ? '' :'checked'}} >
                                        <span class="slider round"></span>
                                        <p>public</p>
                                    </label>
                                </div>

                                {{--datepicker--}}
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" > {{$list['description']}}</textarea>
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

        </div>
    </div>

@endsection