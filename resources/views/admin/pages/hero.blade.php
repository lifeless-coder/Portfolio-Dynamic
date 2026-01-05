@extends('admin.layouts.app')

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
                <input type="file" name="path" class="form-control" id="heroInput" accept="image/*">
            </div>

            <!-- IMAGE PREVIEW -->
            <div class="mb-3">
                <h5>Preview:</h5>
                <img id="heroPreview" 
                     src="{{ $hero ? asset('img/' . $hero->path) : '' }}" 
                     class="rounded d-block img-fluid" 
                     style="width: 100px; height: auto;">
            </div>

            <button class="btn btn-primary">Save Hero Image</button>
            <button type="button" class="btn btn-secondary" id="cancelBtn">Cancel</button>
        </form>
    </div>
</div>

<!-- JS FOR PREVIEW + CANCEL -->
<script>
    const input = document.getElementById('heroInput');
    const preview = document.getElementById('heroPreview');
    const cancelBtn = document.getElementById('cancelBtn');

    // Store original image URL
    const originalSrc = preview.src;

    // Preview selected image
    input.addEventListener('change', function(event) {
        const [file] = input.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    });

    // Cancel button: reset input and restore original image
    cancelBtn.addEventListener('click', function() {
        input.value = null;        // Clear file input
        preview.src = originalSrc;  // Restore original image
    });
</script>
@endsection
