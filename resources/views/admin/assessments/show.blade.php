@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Assessment Details</h3>
                    <a href="{{ route('admin.assessments.index') }}" class="btn btn-secondary float-end">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>First Name:</strong></label>
                                <p>{{ $assessment->first_name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Last Name:</strong></label>
                                <p>{{ $assessment->last_name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Email:</strong></label>
                                <p><a href="mailto:{{ $assessment->email }}">{{ $assessment->email }}</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Phone:</strong></label>
                                <p><a href="tel:{{ $assessment->phone }}">{{ $assessment->phone }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Country:</strong></label>
                                <p>{{ $assessment->country }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Created At:</strong></label>
                                <p>{{ $assessment->created_at->format('d M Y, H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                    @if($assessment->message)
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label><strong>Message:</strong></label>
                                <p>{{ $assessment->message }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection