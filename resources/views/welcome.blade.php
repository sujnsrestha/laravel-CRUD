@extends('master')
@section('content')
    @if(session('success'))
        <div class="alert alert-info">
            {{session('success')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-3">
            <form action="{{route('add')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="enter you name" value="{{old('name')}}">
                    <a href="" style="color: red">{{$errors->first('name')}}</a>
                </div>
                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name"
                           placeholder="enter you user_name" value="{{old('user_name')}}">
                    <a href="" style="color: red">{{$errors->first('user_name')}}</a>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="enter you email" value="{{old('email')}}">
                    <a href="" style="color: red">{{$errors->first('email')}}</a>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="enter you password">
                    <a href="" style="color: red">{{$errors->first('password')}}</a>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Retype passswd</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                           placeholder="please confirm your password">
                </div>
                <div class="form-group">
                    <button class="btn btn-info">add</button>
                </div>
            </form>
        </div>
        <div class="col-md-9">
            <table class="table table-hover">
                <tr>
                    <th>s.n</th>
                    <th>name</th>
                    <th>user name</th>
                    <th>email</th>
                    <th>action</th>
                </tr>
                @forelse($userdata as $key=>$user)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->user_name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{route('edit').'/'.$user->id}}" class="btn btn-info btn-sm">edit</a>
                        <a href="{{route('delete').'/'.$user->id}}" class="btn btn-danger btn-sm">delete</a>
                        </td>
                    </tr>
                @empty
                @endforelse
            </table>
            {{$userdata->links()}}
        </div>
    </div>
@stop



