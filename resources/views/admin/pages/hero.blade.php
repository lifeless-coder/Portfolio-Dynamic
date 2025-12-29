@extends('admin.layouts.app')
    {{-- SUCCESS MESSAGE --}}
    @section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- HERO -->
    <div class="card mb-4" id="hero">
        <div class="card-header fw-bold">Hero Image</div>
        <div class="card-body">
            <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Upload Hero Image</label>
                    <input type="file" name="path" class="form-control" required>
                </div>
                <button class="btn btn-primary">Save Hero Image</button>
            </form> 

            <div>
                <h5>Current Hero Image:</h5>
                @if($hero)
                    <img src="{{ asset('img/' . $hero->path) }}" class="rounded  d-block img-fluid" alt="..." style="width: 100px; height: auto;">
                @else
                    <p>No hero image uploaded yet.</p>
                @endif
            </div>
        </div>
    </div>

    @endsection

