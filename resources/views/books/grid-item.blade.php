<div class="grid-card relative-position">
    <a href="{{(!!$book->link) ? $book->link : $book->getUrl()}}" data-entity-type="book" data-entity-id="{{$book->id}}" style="text-decoration: none;">
        <div class="bg-book featured-image-container-wrap" @if(!!$book->color) style="background-color: {{ $book->color }}" @endif>
            <div class="featured-image-container">
                @if($book->cover)
                <img src="{{ $book->getBookCover() }}" alt="Icon card"></img>
                @endif
            </div>
        </div>
        <div class="grid-card-content">
            <h2>{{$book->getShortName(35)}}</h2>
            @if(isset($book->searchSnippet))
                <p class="text-muted">{!! $book->searchSnippet !!}</p>
            @else
                <p class="text-muted">{{ $book->getExcerpt(130) }}</p>
            @endif
        </div>
        @auth
        <div class="grid-card-footer text-muted ">
            <p>@icon('star')<span title="{{$book->created_at->toDayDateTimeString()}}">{{ trans('entities.meta_created', ['timeLength' => $book->created_at->diffForHumans()]) }}</span></p>
            <p>@icon('edit')<span title="{{ $book->updated_at->toDayDateTimeString() }}">{{ trans('entities.meta_updated', ['timeLength' => $book->updated_at->diffForHumans()]) }}</span></p>
        </div>
        @endauth
    </a>
    @if(auth()->check() && $book->link)
    <a class="grid-card-edit" href="{{$book->getUrl()}}">{{ trans('common.edit') }}</a>
    @endif
</div>