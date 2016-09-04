<div class="carusel-block">
    <div class="carusel-block-content">
        <a class="img-responsive" href="{{ route('investor.show', ['id'=>$item->id]) }}">
            <img src="{{ route('images.show', ['name'=>'investor','id'=>$item->logo]) }}">
        </a>
        <div class="carusel-block-content-description">
            {{$item->short_name}}
        </div>
        <a class="show-btn hvr-rectangle-out" href="{{ route('investor.show', ['id'=>$item->id]) }}">Продивитись</a>
    </div>
    <span class="carusel-badge">{{ $item->id }}</span>
</div>