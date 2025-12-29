@extends('admin.layouts.app')
{{-- SUCCESS MESSAGE --}}
@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@section('content')
<div class="card mb-4" id="about">
    <div class="card-header fw-bold">About Me</div>
    <div class="card-body">
        <form action="{{ route('admin.about.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $about ? $about->title : '') }}" required>
            </div>
            <div class="mb-3">
                <label>Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $about ? $about->subtitle : '') }}" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description', $about ? $about->description : '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update About Me</button>
        </form>

        @if($about)
        <h5>Current About Me:</h5>
        <p><strong>Title:</strong> {{ $about->title }}</p>
        <p><strong>Subtitle:</strong> {{ $about->subtitle }}</p>
        <p><strong>Description:</strong> {{ $about->description }}</p>
        @endif
    </div>
</div>


<div class="card mb-4" id="hero">
    <div class="card-header fw-bold">About Me Image</div>
    <div class="card-body">
        <form action="{{ route('admin.aboutme.storeImage') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Upload About Me Image</label>
                <input type="file" name="path" class="form-control" required>
            </div>
            <button class="btn btn-primary">Save About Me Image</button>
        </form>

        <div>
            <h5>Current About Me Image:</h5>
            @if($about_img)
            <img src="{{ asset('img/' . $about_img->path) }}" class="rounded  d-block img-fluid" alt="..." style="width: 100px; height: auto;">
            @else
            <p>No about me image uploaded yet.</p>
            @endif
        </div>
    </div>
</div>








@endsection