<div class="carusel-block">
        <a href="{{ route('project_viewer.show', [$item->id]) }}">
        <div class="carusel-block-content">
            <div class="carusel-image">
                <img class="img-responsive" src="{{ route('images.show', ['id'=> (empty($item->logo)?'empty':$item->logo),'height'=>168,'width'=>250]) }}">
            </div>
            <h4 class="carusel-block-content-title">
                @if($item->form_type_id == 5)
                    {!! $item->second_name." ".$item->first_name." ".$item->last_name !!}
                @else
                    {!! $item->name !!}
                @endif
            </h4>
            <div class="carusel-block-content-description">
                {!! $item->description !!}
            </div>
        </div>
        <span class="carusel-id-badge">{{ $item->id }}</span>
        @if($item->money!=0)
            <span class="carusel-price-badge">{{ $item->money }} $</span>
        @endif
    </a>
</div>