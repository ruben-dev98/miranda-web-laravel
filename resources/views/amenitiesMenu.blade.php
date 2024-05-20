@if ($title)
    <menu class="rooms__menu">
@else
    <menu class="rooms__grid-item-menu rooms__menu offers__menu">
@endif
@foreach ($room['amenities'] as $amenity)
    @if ($amenity !== null)
        <span class="rooms__menu-item">
            <img src="{{ getAmenityIcon($amenity) }}" alt="">
        </span>
    @endif
@endforeach
</menu>
