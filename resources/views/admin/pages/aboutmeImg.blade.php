@extends('admin.layouts.app')
    {{-- SUCCESS MESSAGE --}}
    @section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
{{-- ABOUT IMAGE --}}
<div class="card mb-4" id="about-image">
    <div class="card-header fw-bold">About Me Image</div>
    <div class="card-body">
        <form action="{{ route('admin.aboutme.storeImage') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Upload About Me Image</label>
                <input type="file" name="path" class="form-control" id="aboutInput" accept="image/*">
            </div>

            {{-- IMAGE PREVIEW --}}
            <div class="mb-3">
                <h5>Preview:</h5>
                <img id="aboutPreview" 
                     src="{{ $about_img ? asset('img/' . $about_img->path) : '' }}" 
                     class="rounded d-block img-fluid" 
                     style="max-width: 200px; height: auto;">
            </div>

            <button class="btn btn-primary">Save About Me Image</button>
            <button type="button" class="btn btn-secondary" id="cancelAboutBtn">Cancel</button>
        </form>
    </div>
</div>

{{-- JS: Preview and Cancel --}}
<script>
    const aboutInput = document.getElementById('aboutInput');
    const aboutPreview = document.getElementById('aboutPreview');
    const cancelBtn = document.getElementById('cancelAboutBtn');

    // Save original image src
    const originalSrc = aboutPreview.src;

    // Preview new image
    aboutInput.addEventListener('change', function() {
        const [file] = aboutInput.files;
        if (file) {
            aboutPreview.src = URL.createObjectURL(file);
        }
    });

    // Cancel: restore original image
    cancelBtn.addEventListener('click', function() {
        aboutInput.value = null;       // Clear input
        aboutPreview.src = originalSrc; // Restore original
    });
</script>
@endsection
