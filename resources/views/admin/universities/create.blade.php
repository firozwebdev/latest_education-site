@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add University</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.universities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select name="country_id" class="form-control" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }} ({{ $country->currency_symbol ?? $country->currency ?? 'No currency' }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="university_name">University Name</label>
                            <input type="text" name="university_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="student_level">Student Level</label>
                            <select name="student_level" class="form-control" required>
                                <option value="">Select Level</option>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Graduate">Graduate</option>
                                <option value="PhD">PhD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <select name="duration" class="form-control" required>
                                <option value="">Select Duration</option>
                                <option value="1 year">1 year</option>
                                <option value="2 years">2 years</option>
                                <option value="3 years">3 years</option>
                                <option value="4 years">4 years</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="next_intake">Next Intake</label>
                            <select name="next_intake" class="form-control" required>
                                <option value="">Select Intake</option>
                                <option value="January">January</option>
                                <option value="September">September</option>
                                <option value="March">March</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tuition_fees">Tuition Fees</label>
                            <input type="number" step="0.01" name="tuition_fees" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="scholarship">Scholarship</label>
                            <select name="scholarship" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ielts_score">IELTS Score</label>
                            <select name="ielts_score" class="form-control" required>
                                <option value="">Select Score</option>
                                <option value="5.5">5.5</option>
                                <option value="6.0">6.0</option>
                                <option value="6.5">6.5</option>
                                <option value="7.0">7.0</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="website_url">Website URL</label>
                            <input type="url" name="website_url" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control wysiwyg" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="global_rank">Global Rank</label>
                            <input type="number" name="global_rank" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="in_country_rank">In Country Rank</label>
                            <input type="number" name="in_country_rank" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="university_image">University Image</label>
                            <input type="file" name="university_image" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="university_wise_course">University Wise Course</label>
                            <textarea name="university_wise_course" class="form-control wysiwyg" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.universities.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection