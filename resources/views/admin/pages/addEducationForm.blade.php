@extends('admin.layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- education -->
<div class="card mb-4" id="education">
    <div class="card-header fw-bold">Education</div>
    <div class="card-body">
        <form action="{{ route('admin.education.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Degree</label>
                <input type="text" name="degree" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Institution</label>
                <input type="text" name="institution" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Years</label>
                <input type="text" name="years" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input
                    type="file"
                    name="image"
                    class="form-control"
                    accept="image/*"
                    onchange="previewEducationImage(event)"
                    required
                >
            </div>

            <!-- Image Preview -->
            <div class="mb-3">
                <img id="educationImagePreview"
                     src=""
                     alt="Image Preview"
                     style="max-width: 180px; display: none; border: 1px solid #ddd; padding: 5px;">
            </div>

            <button class="btn btn-success">Add Education</button>
        </form>
    </div>
</div>

<script>
    function previewEducationImage(event) {
        const preview = document.getElementById('educationImagePreview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    }
</script>
@endsection
