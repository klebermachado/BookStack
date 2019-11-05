<div class="bookshelf-grid-item grid-card relative-position">
    <a href="{{(!!$shelf->link) ? $shelf->link : $shelf->getUrl()}}"
       data-entity-type="bookshelf" data-entity-id="{{$shelf->id}}" style="text-decoration: none;">
        <div class="bg-shelf featured-image-container-wrap">
            <div class="featured-image-container">
            @if($shelf->cover)
            <img src="{{ $shelf->getBookCover() }}" alt="Icon card"></img>
            @endif
            </div>
        </div>
        <div class="grid-card-content">
            <h2>{{$shelf->getShortName(35)}}</h2>
            @if(isset($shelf->searchSnippet))
                <p class="text-muted">{!! $shelf->searchSnippet !!}</p>
            @else
                <p class="text-muted">{{ $shelf->getExcerpt(130) }}</p>
            @endif
        </div>
        @auth
        <div class="grid-card-footer text-muted text-small">
            @icon('star')<span title="{{$shelf->created_at->toDayDateTimeString()}}">{{ trans('entities.meta_created', ['timeLength' => $shelf->created_at->diffForHumans()]) }}</span>
            <br>
            @icon('edit')<span title="{{ $shelf->updated_at->toDayDateTimeString() }}">{{ trans('entities.meta_updated', ['timeLength' => $shelf->updated_at->diffForHumans()]) }}</span>
        </div>
        @endauth
    </a>
    @if(auth()->check() && $shelf->link)
        <a class="grid-card-edit" href="{{$shelf->getUrl()}}">{{ trans('common.edit') }}</a>
    @endif
</div>