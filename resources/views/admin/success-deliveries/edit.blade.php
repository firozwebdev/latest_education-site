@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Success Delivery</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.success-deliveries.update', $successDelivery) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $successDelivery->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Change Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Upload a new image to replace the existing one (optional)</small>
                            @if($successDelivery->image)
                                <div class="mt-2">
                                    <label>Current Image:</label><br>
                                    <img src="{{ asset('storage/' . $successDelivery->image) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="youtube_link">YouTube Link</label>
                            <input type="url" name="youtube_link" class="form-control" value="{{ $successDelivery->youtube_link }}" placeholder="https://www.youtube.com/watch?v=...">
                            <small class="text-muted">Add a YouTube video link (optional)</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.success-deliveries.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection