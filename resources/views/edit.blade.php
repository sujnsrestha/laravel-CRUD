@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{route('editAction')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="criteria" value="{{$data->id}}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="enter you name" value="{{$data->name}}">
                    <a href="" style="color: red">{{$errors->first('name')}}</a>
                </div>
                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name"
                           placeholder="enter you user_name" value="{{$data->user_name}}">
                    <a href="" style="color: red">{{$errors->first('user_name')}}</a>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="enter you email" value="{{$data->email}}">
                    <a href="" style="color: red">{{$errors->first('email')}}</a>
                </div>
                <div class="form-group">
                    <button class="btn btn-info">update</button>
                </div>
            </form>
        </div>
    </div>
@stop



