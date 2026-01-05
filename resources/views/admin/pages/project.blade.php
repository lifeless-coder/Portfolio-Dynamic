@extends('admin.layouts.app')
{{-- SUCCESS MESSAGE --}}
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
                <input type="file" name="image" class="form-control" required>
            </div>

            <button class="btn btn-success">Add Project</button>
        </form>

        <!-- PROJECT LIST -->
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th width="120">Image</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th width="100">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>
                        <img src="{{ asset('img/'.$project->image) }}" width="100">
                    </td>
                    <td>{{ $project->title }}</td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>
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
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection