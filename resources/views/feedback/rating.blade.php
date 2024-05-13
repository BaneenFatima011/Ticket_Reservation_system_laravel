<!-- feedbackForm.blade.php -->

@extends('layout')

@section('content')
<div class="container mx-auto mt-8">
    <div style="background-color:#C19875" class="text-black shadow-md rounded px-8 pt-4 pb-2 w-full max-w-md">
        <h2 class="text-center text-xl font-bold mb-6">Feedback Form</h2>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
        <form action="{{ route('feedback.add') }}" method="POST">
            @csrf
            <input type="hidden" name="passenger_id" value="{{ $passenger}}">
            <input type="hidden" name="booking_id" value="{{ $booking_id}}">
            <div class="mb-4">
                <label for="comments" class="block text-sm font-medium text-gray-700">Comments</label>
                <textarea name="comments" id="comments" rows="4" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 w-full"></textarea>
            </div>
            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                <input type="number" name="rating" id="rating" min="1" max="5" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 w-full">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded-lg">Submit Feedback</button>
        </form>
    </div>
</div>
@endsection
