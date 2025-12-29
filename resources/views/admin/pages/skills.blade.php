@extends('admin.layouts.app')
    {{-- SUCCESS MESSAGE --}}
    @section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @section('content')
    <form action="{{ route('admin.skills.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf

                <div class="mb-3">
                    <label>Skill Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>



                <div class="mb-3">
                    <label>Skill Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <button class="btn btn-success">Add Skill</button>
            </form>

            <!-- SKILL LIST -->
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="120">Image</th>
                        <th>Title</th>
                        <th>Action</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($skills as $skill)
                    <tr>
                        <td>
                            <img src="{{ asset('img/'.$skill->image) }}" width="100">
                        </td>
                        <td>{{ $skill->name }}</td>
                        <td>
                            <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-warning btn-sm"
                                    onclick="return confirm('Update this skill?')">
                                    Update
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.skills.delete', $skill->id) }}" method="POST">
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