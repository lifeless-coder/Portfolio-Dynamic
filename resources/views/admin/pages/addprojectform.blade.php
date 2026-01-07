@extends('admin.layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card mb-4" id="projects">
    <div class="card-header fw-bold">Projects</div>
    <div class="card-body">

        <!-- ADD PROJECT -->
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf

            <div class="mb-3">
                <label>Project Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label>Project URL</label>
                <input type="url" name="project_url" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Project Image</label>
                <input
                    type="file"
                    name="image"
                    class="form-control"
                    accept="image/*"
                    onchange="previewProjectImage(event)"
                    required
                >
            </div>

            <!-- Image Preview -->
            <div class="mb-3">
                <img id="projectImagePreview"
                     src=""
                     alt="Project Image Preview"
                     style="max-width: 220px; display: none; border: 1px solid #ddd; padding: 5px;">
            </div>

            <button class="btn btn-success">Add Project</button>
        </form>

    </div>
</div>

<script>
    function previewProjectImage(event) {
        const preview = document.getElementById('projectImagePreview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    }
</script>
@endsection
