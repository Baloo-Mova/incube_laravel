<select class="form-control" name="{{ $categoriesAttributeName }}">
    <option value="NULL">Не має</option>
    @foreach($categories as $item)
        @if($item->isParent())
            <optgroup label="{{ $item->name }}">
                <option value="{{ $item->id }}" {{ ( $categoriesAttributeValueNow == $item->id ? "selected":"") }}>{{ $item->name }}</option>
                @foreach($item->childrens as $children)
                    <option value="{{ $children->id }}" {{ ( $categoriesAttributeValueNow  == $children->id ? "selected":"") }}>{{ $children->name }}</option>
                @endforeach
            </optgroup>
        @else
            <option value="{{ $item->id }}" {{ ( $categoriesAttributeValueNow == $item->id ? "selected":"") }}>{{ $item->name }}</option>
        @endif
    @endforeach
</select>