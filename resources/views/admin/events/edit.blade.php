@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Event</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            @if($event->logo)
                                <img src="{{ $event->logo }}" alt="Logo" width="100">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control wysiwyg" required>{{ $event->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="event_name">Event Name</label>
                            <input type="text" name="event_name" class="form-control" value="{{ $event->event_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ $event->date }}" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" name="time" class="form-control" value="{{ $event->time }}" required>
                        </div>
                        <div class="form-group">
                            <label for="location_name">Location Name</label>
                            <input type="text" name="location_name" class="form-control" value="{{ $event->location_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="details_description">Details Description</label>
                            <textarea name="details_description" class="form-control wysiwyg" required>{{ $event->details_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="single_page_view">Single Page View</label>
                            <input type="checkbox" name="single_page_view" value="1" {{ $event->single_page_view ? 'checked' : '' }}>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection