<select class="form-control" name="{{ $economicActivitiesAttributeName }}">
    @foreach($economicActivities as $item)
        @if($item->isParent())
            <optgroup label="{{ $item->name }}">
                <option value="{{ $item->id }}" {{ ( $economicActivitiesAttributeValueNow == $item->id ? "selected":"") }}>{{ $item->name }}</option>
                @foreach($item->childrens as $children)
                    <option value="{{ $children->id }}" {{ ( $economicActivitiesAttributeValueNow  == $children->id ? "selected":"") }}>{{ $children->name }}</option>
                @endforeach
            </optgroup>
        @else
            <option value="{{ $item->id }}" {{ ( $economicActivitiesAttributeValueNow == $item->id ? "selected":"") }}>{{ $item->name }}</option>
        @endif
    @endforeach
</select>