@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h1 class="text-white">Review Index oldalam</h1>
        @if (Session::has('message'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    <strong>Holy guacamole!</strong> {{ Session::get('message') }}
                </div>

            </div>
        </div>
    @endif
              <table
                class="table table-striped
            table-hover	 
            table-borderless
            table-secondary
            align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="w-75">Review </th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider"> 
                    @foreach ($reviews as $item)
                        <tr class="table-secondary">
                            <td scope="row">{{ $item->review }}</td>
                            <td >{{ $item->rating }}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <form action="{{route('reviews.show', $item)}}" method="GET">
                                            <button type="submit" class="btn btn-primary">Show</button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form action="{{route('reviews.edit', $item)}}" method="GET">
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form action="{{route('reviews.destroy', $item)}}" method="POST"> 
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection