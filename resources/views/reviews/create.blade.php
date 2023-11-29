@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-white">Create Review oldalam</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card p-4">
                <div class="card-body">
                    <h4 class="card-title text-center">Add new review</h4>
                    <p class="card-text text-danger">Inpust marked with * must be filled.</p>
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
                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="review" class="form-label">Review szovege*</label>
                                    <input type="text" name="review" value="{{ old('review') }}" id="review"
                                        class="form-control @if ($errors->has('review')) is-invalid @endif ">
                                    @error('review')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating*</label>
                                    <input type="number" step="0.1" value="{{ old('rating') }}" name="rating"
                                        id="rating"
                                        class="form-control @if ($errors->has('rating')) is-invalid @endif">
                                    @error('rating')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-warning w-75">Create Review</button>
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
