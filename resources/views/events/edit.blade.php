@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card p-4">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit {{$esemeny->name}}</h4>
                    <div class="text-center">
                        <img class="event-img" src="{{asset('storage/event_thumbnails/'. $esemeny->thumbnail)}}" alt="random kep">
                    </div>
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
                       
                    <div class="row">
                        <div class="col">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>Holy guacamole!</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('events.update', $esemeny) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="" class="form-label">Name*</label>
                                    <input type="text" name="name" value="{{old('name', $esemeny->name)}}" id="name" class="form-control @if($errors->has('name')) is-invalid @endif ">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Start Event*</label>
                                    <input type="datetime-local" value="{{old('start', $esemeny->start)}}" name="start" id="start" class="form-control @if($errors->has('start')) is-invalid @endif">
                                    @error('start')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Short Description*</label>
                                    <input type="text" value="{{old('shortDescription', $esemeny->shortDescription)}}" name="shortDescription" id="shortDescription"
                                        class="form-control @if($errors->has('shortDescription')) is-invalid @endif">
                                    @error('shortDescription')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Long Description*</label>
                                    <input type="text" name="longDescription" value="{{old('longDescription', $esemeny->longDescription)}}" id="longDescription" class="form-control @if($errors->has('longDescription')) is-invalid @endif">
                                    @error('longDescription')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <label for="" class="form-label">Event image</label>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control @if($errors->has('thumbnail')) is-invalid @endif">
                                    @error('thumbnail')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-3 text-center  ">
                                    <button type="submit" class="btn btn-warning w-75">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
@endsection
