@extends('admin.layouts.admin-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Country</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.countries.update', $country->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $country->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" name="code" id="code" class="form-control" maxlength="3"
                                    value="{{ $country->code }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                @if ($country->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $country->image) }}" alt="{{ $country->name }}"
                                            width="100" height="60" style="object-fit: cover;">
                                        <p class="text-muted">Current image</p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency Code</label>
                                <input type="text" name="currency" id="currency" class="form-control" maxlength="3"
                                    value="{{ $country->currency }}" placeholder="e.g. USD, EUR, GBP">
                            </div>
                            <div class="form-group">
                                <label for="currency_symbol">Currency Symbol</label>
                                <input type="text" name="currency_symbol" id="currency_symbol" class="form-control"
                                    maxlength="10" value="{{ $country->currency_symbol }}" placeholder="e.g. $, £, €, ¥">
                                <small class="form-text text-muted">Common symbols: $, £, €, ¥, ₹, RM, kr, Fr, د.إ</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
