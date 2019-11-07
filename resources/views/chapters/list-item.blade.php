<div class="relative-position entity-list-item" style="padding: 0;">
    <a href="{{ (!!$chapter->link) ? $chapter->link : $chapter->getUrl() }}" class="chapter entity-list-item @if($chapter->hasChildren()) has-children @endif" data-entity-type="chapter" data-entity-id="{{$chapter->id}}">
        <span class="icon text-chapter">@icon('chapter')</span>
        @if ($chapter->image_id)
        <div>
            <img src="{{ $chapter->getChapterCover() }}" style="
                padding-right: 10px;
                width: 50px;
                display: inline-block;
                outline: none;
            ">
        </div>
        @endif
        <div class="content">
            <h4 class="entity-list-item-name break-text">{{ $chapter->name }}</h4>
            <div class="entity-item-snippet">
                <p class="text-muted break-text mb-s">{{ $chapter->getExcerpt() }}</p>
            </div>
        </div>
    </a>
    @if(auth()->check() && $chapter->link)
        <a class="list-item-edit" href="{{$chapter->getUrl()}}">{{ trans('common.edit') }}</a>
    @endif
</div>
@if ($chapter->hasChildren())
    <div class="chapter chapter-expansion">
        <span class="icon text-chapter">@icon('page')</span>
        <div class="content">
            <button type="button" chapter-toggle
                    aria-expanded="false"
                    class="text-muted chapter-expansion-toggle">@icon('caret-right') <span>{{ trans_choice('entities.x_pages', $chapter->pages->count()) }}</span></button>
            <div class="inset-list">
                <div class="entity-list-item-children">
                    @include('partials.entity-list', ['entities' => $chapter->pages])
                </div>
            </div>
        </div>
    </div>
@endif