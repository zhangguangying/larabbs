<div class="reply-list">
    @foreach($replies as $index => $reply)
    <div class="media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
        <div class="avatar pull-left">
            <a href="{{ route('users.show', $reply->user_id) }}">
                <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" style="width: 48px;height:48px" class="media-object img-thumbnail">
            </a>
        </div>

        <div class="infos">
            <div class="media-heading">
                <a href="{{ route('users.show', $reply->user_id) }}" title="{{ $reply->user->name }}">
                    {{ $reply->user->name }}
                </a>
                <span> · </span>
                <span class="meta" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>
                <span class="meta pull-right">
                    <!-- 回复删除按钮 -->
                    @can('destroy', $reply)
                    <form action="{{ route('replies.destroy', $reply->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}

                        <button class="btn btn-default btn-xs pull-left">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </form>
                    @endcan
                </span>
            </div>

            <div class="media-content">
                {!! $reply->content !!}
            </div>
        </div>
    </div>
    @endforeach
</div>