@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Newsletter Subscription Details</h3>
                    <a href="{{ route('admin.newsletters.index') }}" class="btn btn-secondary float-end">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Email:</strong></label>
                                <p><a href="mailto:{{ $newsletter->email }}">{{ $newsletter->email }}</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Subscribed At:</strong></label>
                                <p>{{ $newsletter->created_at->format('d M Y, H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Last Updated:</strong></label>
                                <p>{{ $newsletter->updated_at->format('d M Y, H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection