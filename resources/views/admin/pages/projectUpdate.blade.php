@extends('admin.layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card mb-4" id="projects">
    <div class="card-header fw-bold">Projects</div>
    <div class="card-body">

        <!-- EDIT PROJECT -->
        <form action="{{ route('admin.projects.update', $project->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Project Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $project->title) }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea
                    name="description"
                    class="form-control"
                    rows="3"
                    required
                >{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Project URL</label>
                <input
                    type="url"
                    name="project_url"
                    class="form-control"
                    value="{{ old('project_url', $project->project_url) }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label>Project Image</label>
                <input
                    type="file"
                    name="image"
                    class="form-control"
                    accept="image/*"
                    onchange="previewProjectImage(event)"
                >
                <small class="text-muted">
                    Leave empty to keep existing image
                </small>
            </div>

            <!-- IMAGE PREVIEW -->
            <div class="mb-3">
                <img
                    id="projectImagePreview"
                    src="{{ asset('img/'.$project->image) }}"
                    alt="Project Image"
                    style="max-width: 220px; border: 1px solid #ddd; padding: 5px;"
                >
            </div>

            <button class="btn btn-success">Save Changes</button>
        </form>

        
    </div>
</div>

<script>
    function previewProjectImage(event) {
        const preview = document.getElementById('projectImagePreview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    }
</script>
@endsection
