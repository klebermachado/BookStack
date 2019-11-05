<div class="relative-position entity-list-item" style="padding: 0">
    <a href="{{ (!!$book->link) ? $book->link : $book->getUrl() }}" class="book entity-list-item" data-entity-type="book" data-entity-id="{{$book->id}}">
        <div class="entity-list-item-image bg-book" style="background-image: url('{{ $book->getBookCover() }}')">
            {{-- @icon('book') --}}
        </div>
        <div class="content">
            <h4 class="entity-list-item-name break-text">{{ $book->name }}</h4>
            <div class="entity-item-snippet">
                <p class="text-muted break-text mb-s">{{ $book->getExcerpt() }}</p>
            </div>
        </div>
    </a>
    @if(auth()->check() && $book->link)
        <a class="list-item-edit" href="{{$book->getUrl()}}">{{ trans('common.edit') }}</a>
    @endif
</div>