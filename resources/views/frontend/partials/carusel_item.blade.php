<div class="carusel-block">
    <div class="carusel-block-content">
        <div class="carusel-image">
            <a class="img-responsive" href="{{ route('investor.show', ['id'=>$item->id]) }}">
                <img src="{{ route('images.show', ['name'=>'investor','id'=>$item->logo]) }}">
            </a>
        </div>
        <div class="carusel-block-content-description">
            {{$item->short_name}}
        </div>
        <a class="show-btn hvr-rectangle-out" href="{{ route('investor.show', ['id'=>$item->id]) }}">Продивитись</a>
    </div>
    <span class="carusel-id-badge">{{ $item->id }}</span>

    @if($item->investor_cost!=0)
    <span class="carusel-money-badge">{{ $item->investor_cost }} $</span>
        @endif
</div>