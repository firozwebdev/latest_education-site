@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin Dashboard</h3>
                    <div class="card-tools">
                        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <h4>Welcome to Admin Panel!</h4>
                    <p>You are successfully logged in as admin.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection