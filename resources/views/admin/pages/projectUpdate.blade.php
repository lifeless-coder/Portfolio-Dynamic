@extends('admin.layouts.app')
{{-- SUCCESS MESSAGE --}}
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
                <input type="file" name="image" class="form-control" required>
            </div>

            <button class="btn btn-success">Edit Project</button>
        </form>

        <!-- PROJECT LIST -->
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th width="120">Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>URL</th>
                    <th width="100">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="{{ asset('img/'.$project->image) }}" width="100">
                    </td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        <a href="{{ $project->project_url }}" target="_blank">View</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this project?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>
</div>
@endsection

{{-- SUCCESS MESSAGE --}}