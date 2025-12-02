@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Course</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            @if($course->logo)
                                <img src="{{ $course->logo }}" alt="Logo" width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="images">Image</label>
                            <input type="file" name="images" class="form-control" accept="image/*">
                            @if($course->images)
                                <img src="{{ $course->images }}" alt="Image" width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="university_id">University</label>
                            <select name="university_id" class="form-control" required>
                                <option value="">Select University</option>
                                @foreach($universities as $university)
                                    <option value="{{ $university->id }}" {{ $course->university_id == $university->id ? 'selected' : '' }}>{{ $university->university_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject_id">Subject</label>
                            <select name="subject_id" class="form-control">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $course->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="offer_card_1">Offer Card 1</label>
                            <input type="text" name="offer_card_1" class="form-control" value="{{ $course->offer_card_1 }}" required>
                        </div>
                        <div class="form-group">
                            <label for="offer_card_2">Offer Card 2</label>
                            <input type="text" name="offer_card_2" class="form-control" value="{{ $course->offer_card_2 }}" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" value="{{ $course->city }}" required>
                        </div>
                        <div class="form-group">
                            <label for="qs_ranking">QS Ranking</label>
                            <input type="number" name="qs_ranking" class="form-control" value="{{ $course->qs_ranking }}" required>
                        </div>
                        <div class="form-group">
                            <label for="course_name">Course Name</label>
                            <input type="text" name="course_name" class="form-control" value="{{ $course->course_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="progress_to">Progress To</label>
                            <input type="text" name="progress_to" class="form-control" value="{{ $course->progress_to }}" required>
                        </div>
                        <div class="form-group">
                            <label for="student_level">Student Level</label>
                            <input type="text" name="student_level" class="form-control" value="{{ $course->student_level }}" required>
                        </div>
                        <div class="form-group">
                            <label for="next_intake">Next Intake</label>
                            <input type="date" name="next_intake" class="form-control" value="{{ $course->next_intake }}" required>
                        </div>
                        <div class="form-group">
                            <label for="entry_score">Entry Score</label>
                            <input type="number" name="entry_score" class="form-control" value="{{ $course->entry_score }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tuition_fees">Tuition Fees</label>
                            <input type="number" name="tuition_fees" class="form-control" value="{{ $course->tuition_fees }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control wysiwyg">{{ $course->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.partials.rich-text')
@endsection