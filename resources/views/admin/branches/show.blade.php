@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Branch Details</h3>
                    <a href="{{ route('admin.branches.index') }}" class="btn btn-secondary float-right">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Branch Name</th>
                            <td>{{ $branch->branch_name }}</td>
                        </tr>
                        <tr>
                            <th>Branch Location</th>
                            <td>{{ $branch->branch_location }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $branch->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $branch->email }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $branch->country->name }}</td>
                        </tr>
                        <tr>
                            <th>Map Images</th>
                            <td><img src="{{ $branch->map_images }}" alt="Map" width="100"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection