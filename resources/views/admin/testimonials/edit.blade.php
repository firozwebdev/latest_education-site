@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Testimonial</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="review">Review</label>
                            <input type="text" name="review" class="form-control" value="{{ $testimonial->review }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control wysiwyg" required>{{ $testimonial->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @if($testimonial->image)
                                <img src="{{ asset($testimonial->image) }}" alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="degree_name">Degree Name</label>
                            <input type="text" name="degree_name" class="form-control" value="{{ $testimonial->degree_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="university_id">University</label>
                            <select name="university_id" class="form-control" required>
                                <option value="">Select University</option>
                                @foreach($universities as $university)
                                    <option value="{{ $university->id }}" {{ $testimonial->university_id == $university->id ? 'selected' : '' }}>{{ $university->university_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection