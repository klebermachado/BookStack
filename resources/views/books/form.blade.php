
{{ csrf_field() }}
<div class="form-group title-input">
    <label for="name">{{ trans('common.name') }}</label>
    @include('form.text', ['name' => 'name'])
</div>

<div class="form-group description-input">
    <label for="description">{{ trans('common.description') }}</label>
    @include('form.textarea', ['name' => 'description'])
</div>

<div class="form-group stretch-inputs">
    <label for="link">Link</label>
    @include('form.text', ['name' => 'link'])
</div>

<div class="form-group" collapsible id="logo-control">
    <button type="button" class="collapse-title text-primary" collapsible-trigger aria-expanded="false">
        <label>{{ trans('common.cover_image') }}</label>
    </button>
    <div class="collapse-content" collapsible-content>
        <p class="small">{{ trans('common.cover_image_description') }}</p>

        @include('components.image-picker', [
            'defaultImage' => url('/book_default_cover.png'),
            'currentImage' => (isset($model) && $model->cover) ? $model->getBookCover() : url('/book_default_cover.png') ,
            'name' => 'image',
            'imageClass' => 'cover'
        ])
    </div>
</div>

<div class="form-group" collapsible id="logo-control">
    <button type="button" class="collapse-title text-primary" collapsible-trigger aria-expanded="false">
        <label>{{ trans('common.cover_color') }}</label>
    </button>
    <div class="collapse-content" collapsible-content>
        <div class="grid half gap-xl">
            <div>
                <label class="setting-list-label">{{ trans('common.cover_color') }}</label>
            </div>
            <div setting-app-color-picker class="text-m-right">
                <input type="color" value="{{ $model->color ?? '#077b70' }}" name="color" id="color" placeholder="#206ea7">
            </div>
        </div>
    </div>
</div>

<div class="form-group" collapsible id="tags-control">
    <button type="button" class="collapse-title text-primary" collapsible-trigger aria-expanded="false">
        <label for="tag-manager">{{ trans('entities.book_tags') }}</label>
    </button>
    <div class="collapse-content" collapsible-content>
        @include('components.tag-manager', ['entity' => $book ?? null, 'entityType' => 'chapter'])
    </div>
</div>

<div class="form-group text-right">
    <a href="{{ $returnLocation }}" class="button outline">{{ trans('common.cancel') }}</a>
    <button type="submit" class="button">{{ trans('entities.books_save') }}</button>
</div>