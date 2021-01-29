@extends('layout.base')

@section('content')
<h1>Welcome!</h1>

<h3>Overview for the next two weeks</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th>From</th>
      <th>To</th>
      <th>Booker</th>
      <th>Country</th>
      <th># visitors</th>
      <th>Room</th>
  </thead>
  <tbody>
    @foreach($bookings as $booking)
    <tr @if ($booking->isNow())
      class="booking__now @if ($booking->color()['luma'] > 180.0) reversed @endif"
      style="background-color: {{$booking->color()['color'] }}" @endif>
      <td>{{ $booking->arrival->format('d/m/Y') }}</td>
      <td>{{ $booking->departure->format('d/m/Y') }}</td>
      <td>
        <a href="{{ route('planning', ['date' => $booking->arrival->toDateString()]) }}">
          {{ $booking->customer->name }}
        </a>
      </td>
      <td>{{ $booking->customer->country_str }}</td>
      <td>{{ $booking->guests }}</td>
      <td>
        {{ $booking->rooms[0]->name }}
        @if ($booking->rooms[0]->properties->options['part'] != -1)
          &mdash; room {{ $booking->rooms[0]->properties->options['part']+1 }}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<h3 class="mt-5">Leave today</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th>From</th>
      <th>To</th>
      <th>Booker</th>
      <th># visitors</th>
      <th>Room</th>
      <th>Price</th>
  </thead>
  <tbody>
    @foreach($leaving as $booking)
    <tr @if ($booking->isNow())
      class="booking__now @if ($booking->color()['luma'] > 180.0) reversed @endif"
      style="background-color: {{$booking->color()['color'] }}" @endif>
      <td>{{ $booking->arrival->format('d/m/Y') }}</td>
      <td>{{ $booking->departure->format('d/m/Y') }}</td>
      <td>
        <a href="{{ route('planning', ['date' => $booking->arrival->toDateString()]) }}">
          {{ $booking->customer->name }}
        </a>
      </td>
      <td>{{ $booking->guests }}</td>
      <td>{{ $booking->rooms[0]->name }}</td>
      <td>&euro;&nbsp;{{ $booking->basePrice * (1-$booking->discount) }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
