@extends('admin.layouts.app')
{{-- SUCCESS MESSAGE --}}
@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card mb-4" id="projects">
    <div class="card-header fw-bold">Projects</div>
    <div class="card-body">

        <div class="card mb-4" id="education">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fw-bold">Project Entries</span>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Add Project</a>
            </div>


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