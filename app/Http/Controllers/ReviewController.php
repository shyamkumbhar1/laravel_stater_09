<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::all();

        return view('reviews.index', compact('reviews'));
    }


    public function create()
    {
        return view('reviews.create');
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'rating' => 'required|numeric|min:1|max:5',
                'comment' => 'required|string',
            ]);


            $review = new Review;

            $review->user_id = '12';
            $review->name = $request->name;
            $review->email = $request->email;
                   $review->rating = $request->rating;
            $review->comment = $request->comment;
            $review->patient_ip_address = $request->ip();

            $review->save();

            return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
        } catch (\Exception  $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();

        }catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->with('error', 'An error occurred while saving the review.');
        }


    }
}
