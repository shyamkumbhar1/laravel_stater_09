<!-- resources/views/reviews/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Review</div>

                    <div class="card-body">
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <select name="rating" id="rating" class="form-control">
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea name="comment" id="comment" rows="5" class="form-control"></textarea>
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
