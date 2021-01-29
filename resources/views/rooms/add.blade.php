@extends('layout.base')

@section('content')
<h1>Add Room</h1>

<div class="row justify-content">
  <div class="col-md-auto">

@if(isset($room))
  <form action="{{ route('room.edit', $room->id) }}" method="POST">
@else
  <form action="{{ route('room.add') }}" method="POST">
@endif
  {{ csrf_field() }}
  <fieldset>
    <div class="form-group">
      <label for="nameInput">Naam</label>
      <input class="form-control" name="name" id="nameInput" placeholder="Naam" autocomplete="off" type="text" required @if(isset($room)) value="{{ $room->name }}" @endif>
    </div>
    <div class="form-group">
      <label for="bedsSelect"># bedden</label>
      <select class="form-control" name="beds" id="bedsSelect">
        @for($i=0; $i<10; $i++)
          <option @if(isset($room) && $room->beds == ($i+1)) selected @endif>{{ $i+1 }}</option>
        @endfor
      </select>
    </div>
    <div class="form-group">
      <label for="layoutInput">Indeling</label>
      <input class="form-control" name="layout" id="layoutInput" placeholder="Indeling" autocomplete="off" type="text" required @if(isset($room)) value="{{ $room->layoutStr }}" @endif>
    </div>
    @if(isset($room))
      <button type="submit" class="btn btn-primary">Save!</button>
    @else
      <button type="submit" class="btn btn-primary">Add!</button>
    @endif
  </fieldset>
</form>
</div>
</div>
@endsection
