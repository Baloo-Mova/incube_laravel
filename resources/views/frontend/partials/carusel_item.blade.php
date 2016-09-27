<div class="carusel-block">
    @if($item->form_type_id==3)
            <a href="{{ route('designer.show', [$item->id]) }}">
           
            @else
        <a href="{{ route(strtolower($item->formType->name).'.show', [$item->id]) }}">
           
            @endif
        <div class="carusel-block-content">
            <div class="carusel-image">
                <img class="img-responsive" src="{{ route('images.show', ['id'=> (empty($item->logo)?'empty':$item->logo),'height'=>168,'width'=>250]) }}">
            </div>
            <h4 class="carusel-block-content-title">
                {!!$item->name!!}
            </h4>
            <div class="carusel-block-content-description">
                {!!$item->description!!}
            </div>
        </div>
        <span class="carusel-id-badge">{{ $item->id }}</span>
        @if($item->money!=0)
            <span class="carusel-price-badge">{{ $item->money }} $</span>
        @endif
    </a>
</div>