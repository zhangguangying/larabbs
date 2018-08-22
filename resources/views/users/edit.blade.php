@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-default col-md-10 col-md-offset-1">
        <div class="panel-heading">
            <h4>
                <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
            </h4>
        </div>

        @include('common.error')

        <div class="panel-body">
            <form action="{{ route('users.update', Auth::id()) }}" method="POST" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="name-field">用户名</label>
                    <input type="text" class="form-control" name="name" id="name-field" value="{{ old('name', $user->name) }}">
                </div>

                <div class="form-group">
                    <label for="email-field">邮箱</label>
                    <input type="text" class="form-control" name="email" id="email-field" value="{{ old('name', $user->email) }}">
                </div>

                <div class="form-group">
                    <label for="introduction-field">个人简介</label>
                    <textarea name="instroduction" id="introduction-field" class="form-control" cols="30" rows="10">
                        {{ old('introduction', $user->introduction) }}
                    </textarea>
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection