<!-- resources/views/reviews/index.blade.php -->

@extends('layouts.app')
@section('styles')
    <style>
        .star {
            color: gold;
            font-size: 24px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reviews</div>
                    <a href="{{ route('reviews.create') }}">Add Reviews</a>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Practitioners Id</th>
                                    <th>Patient Name</th>
                                    <th>Patient Email </th>

                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Approved</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->user_id }}</td>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->email }}</td>
                                        <td>
                                            <!-- Displaying stars -->
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <span class="star">&#9733;</span>
                                                @else
                                                    <span class="star">&#9734;</span>
                                                @endif
                                            @endfor
                                        </td>
                                        <td>{{ $review->comment }}</td>
                                        <td>Y</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
