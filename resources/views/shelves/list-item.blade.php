<div class="relative-position entity-list-item" style="padding: 0">
    <a href="{{ (!!$shelf->link) ? $shelf->link : $shelf->getUrl() }}" class="shelf entity-list-item" data-entity-type="bookshelf" data-entity-id="{{$shelf->id}}">
        <div class="entity-list-item-image bg-shelf @if($shelf->image_id) has-image @endif" style="@if(!!$shelf->color) background-color: {{ $shelf->color }}; @endif background-image: url('{{ $shelf->getBookCover() }}')">
            {{-- @icon('bookshelf') --}}
        </div>
        <div class="content py-xs">
            <h4 class="entity-list-item-name break-text">{{ $shelf->name }}</h4>
            <div class="entity-item-snippet">
                <p class="text-muted break-text mb-none">{{ $shelf->getExcerpt() }}</p>
            </div>
        </div>
    </a>
    @if(auth()->check() && $shelf->link)
        <a class="list-item-edit" href="{{$shelf->getUrl()}}">{{ trans('common.edit') }}</a>
    @endif
</div>
<div class="entity-shelf-books grid third gap-y-xs entity-list-item-children">
    @foreach($shelf->books as $book)
        <div>
            <a href="{{ $book->getUrl('?shelf=' . $shelf->id) }}" class="entity-chip text-book">
                @icon('book')
                {{ $book->name }}
            </a>
        </div>
    @endforeach
</div>