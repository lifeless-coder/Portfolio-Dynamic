@extends('admin.layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.skills.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf

    <div class="mb-3">
        <label>Skill Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Skill Image</label>
        <input 
            type="file" 
            name="image" 
            class="form-control" 
            accept="image/*"
            onchange="previewImage(event)"
            required
        >
    </div>

    <!-- Image Preview -->
    <div class="mb-3">
        <img id="imagePreview" src="" alt="Image Preview"
             style="max-width: 150px; display: none; border: 1px solid #ddd; padding: 5px;">
    </div>

    <button class="btn btn-success">Add Skill</button>
</form>

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            imagePreview.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        }
    }
</script>
@endsection
