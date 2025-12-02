@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit University</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.universities.update', $university) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select name="country_id" class="form-control" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ $university->country_id == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }} ({{ $country->currency_symbol ?? $country->currency ?? 'No currency' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="university_name">University Name</label>
                            <input type="text" name="university_name" class="form-control" value="{{ $university->university_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="student_level">Student Level</label>
                            <select name="student_level" class="form-control" required>
                                <option value="">Select Level</option>
                                <option value="Undergraduate" {{ $university->student_level == 'Undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                                <option value="Graduate" {{ $university->student_level == 'Graduate' ? 'selected' : '' }}>Graduate</option>
                                <option value="PhD" {{ $university->student_level == 'PhD' ? 'selected' : '' }}>PhD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <select name="duration" class="form-control" required>
                                <option value="">Select Duration</option>
                                <option value="1 year" {{ $university->duration == '1 year' ? 'selected' : '' }}>1 year</option>
                                <option value="2 years" {{ $university->duration == '2 years' ? 'selected' : '' }}>2 years</option>
                                <option value="3 years" {{ $university->duration == '3 years' ? 'selected' : '' }}>3 years</option>
                                <option value="4 years" {{ $university->duration == '4 years' ? 'selected' : '' }}>4 years</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="next_intake">Next Intake</label>
                            <select name="next_intake" class="form-control" required>
                                <option value="">Select Intake</option>
                                <option value="January" {{ $university->next_intake == 'January' ? 'selected' : '' }}>January</option>
                                <option value="September" {{ $university->next_intake == 'September' ? 'selected' : '' }}>September</option>
                                <option value="March" {{ $university->next_intake == 'March' ? 'selected' : '' }}>March</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tuition_fees">Tuition Fees</label>
                            <input type="number" step="0.01" name="tuition_fees" class="form-control" value="{{ $university->tuition_fees }}" required>
                        </div>
                        <div class="form-group">
                            <label for="scholarship">Scholarship</label>
                            <select name="scholarship" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Available" {{ $university->scholarship == 'Available' ? 'selected' : '' }}>Available</option>
                                <option value="Not Available" {{ $university->scholarship == 'Not Available' ? 'selected' : '' }}>Not Available</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ielts_score">IELTS Score</label>
                            <select name="ielts_score" class="form-control" required>
                                <option value="">Select Score</option>
                                <option value="5.5" {{ $university->ielts_score == '5.5' ? 'selected' : '' }}>5.5</option>
                                <option value="6.0" {{ $university->ielts_score == '6.0' ? 'selected' : '' }}>6.0</option>
                                <option value="6.5" {{ $university->ielts_score == '6.5' ? 'selected' : '' }}>6.5</option>
                                <option value="7.0" {{ $university->ielts_score == '7.0' ? 'selected' : '' }}>7.0</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="website_url">Website URL</label>
                            <input type="url" name="website_url" class="form-control" value="{{ $university->website_url }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control wysiwyg" required>{{ $university->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="global_rank">Global Rank</label>
                            <input type="number" name="global_rank" class="form-control" value="{{ $university->global_rank }}" required>
                        </div>
                        <div class="form-group">
                            <label for="in_country_rank">In Country Rank</label>
                            <input type="number" name="in_country_rank" class="form-control" value="{{ $university->in_country_rank }}" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ $university->location }}" required>
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            @if($university->logo)
                                <img src="{{ asset($university->logo) }}" alt="Logo" width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="university_image">University Image</label>
                            <input type="file" name="university_image" class="form-control" accept="image/*">
                            @if($university->university_image)
                                <img src="{{ asset($university->university_image) }}" alt="University Image" width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="university_wise_course">University Wise Course</label>
                            <textarea name="university_wise_course" class="form-control wysiwyg" required>{{ $university->university_wise_course }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.universities.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection