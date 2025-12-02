@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Appointment Details</h3>
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary float-end">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>First Name:</strong></label>
                                <p>{{ $appointment->first_name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Last Name:</strong></label>
                                <p>{{ $appointment->last_name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Email:</strong></label>
                                <p><a href="mailto:{{ $appointment->email }}">{{ $appointment->email }}</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Phone:</strong></label>
                                <p><a href="tel:{{ $appointment->phone }}">{{ $appointment->phone }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Country:</strong></label>
                                <p>{{ $appointment->country }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Appointment Date:</strong></label>
                                <p>{{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Appointment Time:</strong></label>
                                <p>{{ $appointment->appointment_time ? \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') : 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Created At:</strong></label>
                                <p>{{ $appointment->created_at->format('d M Y, H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                    @if($appointment->message)
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label><strong>Message:</strong></label>
                                <p>{{ $appointment->message }}</p>
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