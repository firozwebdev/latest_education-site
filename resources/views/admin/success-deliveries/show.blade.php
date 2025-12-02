@extends('admin.layouts.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Success Delivery Details</h3>
                    <a href="{{ route('admin.success-deliveries.index') }}" class="btn btn-secondary float-right">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $successDelivery->id }}</td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>{{ $successDelivery->number }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $successDelivery->name }}</td>
                        </tr>
                        <tr>
                            <th>Images</th>
                            <td>
                                @if($successDelivery->images)
                                    <img src="{{ $successDelivery->images }}" alt="Image" width="100">
                                @else
                                    No Image
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection