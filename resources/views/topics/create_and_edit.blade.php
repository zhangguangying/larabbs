@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <h2 class="text-center">
                    <i class="glyphicon glyphicon-edit"></i> 
                    @if($topic->id)
                        编辑话题
                    @else
                        创建话题
                    @endif
                </h2>

                @include('common.error')

                @if($topic->id)
                <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
                @else
                <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required/>
                    </div> 
                    
                    <div class="form-group">
                        <select name="category_id" id="" class="form-control" required>
                            <option value="" hidden disabled selected>请选择分类</option>
                            @foreach($categories as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div> 
                    
                    <div class="form-group">
                        <textarea name="body" id="editor" class="form-control" rows="3" placeholder="请至少填入3个字符的内容" required>{{ old('body', $topic->body) }}</textarea>
                    </div> 
                

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                        <a class="btn btn-link pull-right" href="{{ route('topics.index') }}"><i class="glyphicon glyphicon-backward"></i>  返回</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection