@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Event Details</h3>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary float-right">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Logo</th>
                            <td><img src="{{ $event->logo }}" alt="Logo" width="100"></td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td>{!! $event->content !!}</td>
                        </tr>
                        <tr>
                            <th>Event Name</th>
                            <td>{{ $event->event_name }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $event->date }}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{ $event->time }}</td>
                        </tr>
                        <tr>
                            <th>Location Name</th>
                            <td>{{ $event->location_name }}</td>
                        </tr>
                        <tr>
                            <th>Details Description</th>
                            <td>{!! $event->details_description !!}</td>
                        </tr>
                        <tr>
                            <th>Single Page View</th>
                            <td>{{ $event->single_page_view ? 'Yes' : 'No' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection