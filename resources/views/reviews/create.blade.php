<!-- resources/views/reviews/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Review</div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <div class="card-body">
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <div class="form-group">

                                <input name="user_id" type="hidden"  rows="5" class="form-control" value="5">
                            </div>
                            <div class="form-group">
                                <label for="comment">Name:</label>
                                <input name="name" id="comment" rows="5" class="form-control" value="{{ old('name') }}" >
                            </div>
                            <div class="form-group">
                                <label for="comment">Email:</label>
                                <input name="email" id="comment" rows="5" class="form-control" value="{{ old('email') }}" >
                            </div>


                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <select name="rating" id="rating" class="form-control" value="{{ old('rating') }}" >
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea name="comment" id="comment" rows="5" class="form-control" value="{{ old('comment') }}" ></textarea>
                            </div>
                            <div class="form-group">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
