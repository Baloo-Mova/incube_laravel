<div class="carusel-block">
    <div class="carusel-block-content">
        <div class="carusel-image">
            <a class="img-responsive" href="{{ route('investor.show', ['id'=>$item->id]) }}">
                <img src="{{ route('images.show', ['name'=>'investor','id'=>$item->logo,'height'=>300,'width'=>250]) }}">
            </a>
        </div>
        <h4 class="carusel-block-content-title">
            {!!$item->name!!}
        </h4>
        <div class="carusel-block-content-description">
            {!!$item->description!!}
        </div>
        <a class="show-btn hvr-rectangle-out" href="{{ route('investor.show', ['id'=>$item->id]) }}">Продивитись</a>
    </div>
    <span class="carusel-id-badge">{{ $item->id }}</span>
    @if($item->money!=0)
    <span class="carusel-price-badge">{{ $item->money }} $</span>
    @endif
</div>