@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Event</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control wysiwyg" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="event_name">Event Name</label>
                            <input type="text" name="event_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" name="time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="location_name">Location Name</label>
                            <input type="text" name="location_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="details_description">Details Description</label>
                            <textarea name="details_description" class="form-control wysiwyg" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="single_page_view">Single Page View</label>
                            <input type="checkbox" name="single_page_view" value="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection