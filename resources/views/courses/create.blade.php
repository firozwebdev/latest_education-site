@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Course</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="images">Image</label>
                            <input type="file" name="images" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="university_id">University</label>
                            <select name="university_id" class="form-control" required>
                                <option value="">Select University</option>
                                @foreach($universities as $university)
                                    <option value="{{ $university->id }}">{{ $university->university_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject_id">Subject</label>
                            <select name="subject_id" class="form-control">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="offer_card_1">Offer Card 1</label>
                            <input type="text" name="offer_card_1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="offer_card_2">Offer Card 2</label>
                            <input type="text" name="offer_card_2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="qs_ranking">QS Ranking</label>
                            <input type="number" name="qs_ranking" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="course_name">Course Name</label>
                            <input type="text" name="course_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="progress_to">Progress To</label>
                            <input type="text" name="progress_to" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="student_level">Student Level</label>
                            <input type="text" name="student_level" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="study_level">Study Level</label>
                            <select name="study_level" class="form-control">
                                <option value="">Select Study Level</option>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Postgraduate">Postgraduate</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Certificate">Certificate</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" name="duration" class="form-control" placeholder="e.g., 3 years, 6 months, 12 weeks">
                        </div>
                        <div class="form-group">
                            <label for="course_type">Course Type</label>
                            <select name="course_type" class="form-control">
                                <option value="">Select Course Type</option>
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                                <option value="hybrid">Hybrid</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="next_intake">Next Intake</label>
                            <input type="date" name="next_intake" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="entry_score">Entry Score</label>
                            <input type="number" name="entry_score" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tuition_fees">Tuition Fees</label>
                            <input type="number" name="tuition_fees" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control wysiwyg"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.partials.rich-text')
@endsection