
{!! csrf_field() !!}

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

<div class="grid half gap-xl">
    <div>
        <label class="setting-list-label">{{ trans('entities.chapter_icon') }}</label>
        <p class="small">{!! trans('entities.chapter_icon_desc') !!}</p>
    </div>
    <div>
        @include('components.image-picker', [
                    'defaultImage' => url('/book_default_cover.png'),
                    'currentImage' => (isset($model) && $model->image_id) ? $model->getChapterCover(): url('/book_default_cover.png'),
                    'name' => 'icon_chapter',
                    'imageClass' => 'cover',
                ])
    </div>
</div><br/>

<div class="form-group" collapsible id="logo-control">
    <button type="button" class="collapse-title text-primary" collapsible-trigger aria-expanded="false">
        <label for="tags">{{ trans('entities.chapter_tags') }}</label>
    </button>
    <div class="collapse-content" collapsible-content>
        @include('components.tag-manager', ['entity' => isset($chapter)?$chapter:null, 'entityType' => 'chapter'])
    </div>
</div>

<div class="form-group text-right">
    <a href="{{ isset($chapter) ? $chapter->getUrl() : $book->getUrl() }}" class="button outline">{{ trans('common.cancel') }}</a>
    <button type="submit" class="button">{{ trans('entities.chapters_save') }}</button>
</div>
