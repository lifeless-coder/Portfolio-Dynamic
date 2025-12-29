@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Dashboard</h3>

    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Total Users</h5>
                    <h3>120</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Reports</h5>
                    <h3>45</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Active Issues</h5>
                    <h3>8</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
