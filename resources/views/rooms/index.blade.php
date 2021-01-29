@extends('layout.base')

@section('content')
<h1>Rooms and Beds</h1>

<p><a href="{{ route('room.add') }}" type="button" class="btn btn-primary">Add room</a></p>

<table class="table table-striped table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th width="60"></th>
            <th>Name</th>
            <th># beds</th>
            <th width="5%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('room.sort.up', $room->id) }}"
                            class="btn btn-primary btn-sm"
                            data-id="{{ $room->id }}"
                            data-sort="{{ $room->sorting }}">
                                <i class="fa fa-chevron-up"></i>
                        </a>
                        <a href="{{ route('room.sort.down', $room->id) }}"
                            class="btn btn-primary btn-sm"
                            data-id="{{ $room->id }}"
                            data-sort="{{ $room->sorting }}">
                                <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->beds }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('room.edit', $room->id) }}"
                            class="btn btn-success btn-sm">edit</a>
                        <a href="{{ route('room.del', $room->id) }}"
                            class="btn btn-success btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
