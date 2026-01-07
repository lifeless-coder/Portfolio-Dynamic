@extends('admin.layouts.app')
{{-- SUCCESS MESSAGE --}}
@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- ABOUT TEXT --}}
<div class="card mb-4" id="about">
    <div class="card-header fw-bold">About Me</div>
    <div class="card-body">
        <form action="{{ route('admin.about.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control"
                    value="{{ old('title', $about ? $about->title : '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subtitle</label>
                <input type="text" name="subtitle" class="form-control"
                    value="{{ old('subtitle', $about ? $about->subtitle : '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $about ? $about->description : '') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload About Me Image</label>
                <input type="file" name="path" class="form-control" id="aboutInput" accept="image/*">
            </div>

            {{-- IMAGE PREVIEW --}}
            <div class="card-header fw-bold">About Me Image</div>
            <div class="mb-3">
                <h5>Preview:</h5>
                <img id="aboutPreview"
                    src="{{ $about_img ? asset('img/' . $about_img->path) : '' }}"
                    class="rounded d-block img-fluid"
                    style="max-width: 200px; height: auto;">
            </div>

            <button type="button" class="btn btn-secondary" id="cancelAboutBtn">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>

        </form>

        

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
                aboutInput.value = null; // Clear input
                aboutPreview.src = originalSrc; // Restore original
            });
        </script>
        @endsection