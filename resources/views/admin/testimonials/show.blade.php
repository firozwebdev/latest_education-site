@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Testimonial Details</h3>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary float-right">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Review</th>
                            <td>{{ $testimonial->review }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $testimonial->description !!}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $testimonial->name }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="{{ $testimonial->image }}" alt="Image" width="100"></td>
                        </tr>
                        <tr>
                            <th>Degree Name</th>
                            <td>{{ $testimonial->degree_name }}</td>
                        </tr>
                        <tr>
                            <th>University</th>
                            <td>{{ $testimonial->university->university_name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection