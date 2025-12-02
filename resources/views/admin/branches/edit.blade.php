@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Branch</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.branches.update', $branch) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="branch_name">Branch Name</label>
                            <input type="text" name="branch_name" class="form-control" value="{{ $branch->branch_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="branch_location">Branch Location</label>
                            <input type="text" name="branch_location" class="form-control" value="{{ $branch->branch_location }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $branch->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $branch->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select name="country_id" class="form-control" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ $branch->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="map_images">Map Images URL</label>
                            <input type="url" name="map_images" class="form-control" value="{{ $branch->map_images }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.branches.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection