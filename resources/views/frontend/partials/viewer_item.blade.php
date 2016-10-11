<div class="col-md-4 col-sm-6 col-xs-12">
    <div class="carusel-block">
        <a href="{{ route("project_viewer.show",['material'=>$item->id]) }}">
          
            <div class="carusel-block-content">
                <div class="carusel-image">
                    <img class="carusel-block-img img-responsive" src="{{ route('images.show', ['id'=> (empty($item->logo)?'empty':$item->logo),'height'=>168,'width'=>250]) }}">
                </div>
                <h4 class="carusel-block-content-title">
                    {!! $item->form_type_id == 5 ? $item->second_name.$item->first_name.$item->last_name : $item->name !!}
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
</div>