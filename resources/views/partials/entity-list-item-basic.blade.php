<?php $type = $entity->getType(); ?>
<a href="{{ (!!$entity->link) ? $entity->link : $entity->getUrl() }}" class="{{$type}} {{$type === 'page' && $entity->draft ? 'draft' : ''}} {{$classes ?? ''}} entity-list-item" data-entity-type="{{$type}}" data-entity-id="{{$entity->id}}">
    <span role="presentation" class="icon text-{{$type}}">@icon($type)</span>
    <div class="content">
            <h4 class="entity-list-item-name break-text">{{ $entity->name }}</h4>
            {{ $slot ?? '' }}
    </div>
</a>