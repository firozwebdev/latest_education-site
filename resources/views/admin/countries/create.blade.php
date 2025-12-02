@extends('admin.layouts.admin-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Country</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.countries.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" name="code" id="code" class="form-control" maxlength="3"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency Code</label>
                                <input type="text" name="currency" id="currency" class="form-control" maxlength="3"
                                    placeholder="e.g. USD, EUR, GBP">
                            </div>
                            <div class="form-group">
                                <label for="currency_symbol">Currency Symbol</label>
                                <input type="text" name="currency_symbol" id="currency_symbol" class="form-control"
                                    maxlength="10" placeholder="e.g. $, £, €, ¥">
                                <small class="form-text text-muted">Common symbols: $, £, €, ¥, ₹, RM, kr, Fr, د.إ</small>
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
