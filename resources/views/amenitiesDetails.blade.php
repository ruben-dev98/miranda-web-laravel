@if($title)
<ul class="offers__amenities-list room-details__amenities-list">
@else
<ul class="room-details__amenities-list">
@endif
    @foreach ($room->amenities as $amenity)
        @if ($amenity !== null)
            <li class="room-details__amenities-list-item">
                <img class="room-details__amenities-list-item-img" src="{{ $amenity->getAmenityIcon() }}" alt="">
                <span class="room-details__amenities-list-item-text">{{ $amenity->name }}</span>
            </li>
        @endif
    @endforeach
</ul>