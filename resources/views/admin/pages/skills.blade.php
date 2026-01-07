@extends('admin.layouts.app')
{{-- SUCCESS MESSAGE --}}
@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card mb-4" id="education">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-bold">Skill Entries</span>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-success">Add Skill</a>
    </div>



    <!-- SKILL LIST -->
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th width="120">Image</th>
                <th>Title</th>
                <th></th>
                <th width="100"></th>
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
                    <form action="{{ route('admin.skills.edit', $skill->id) }}" method="GET">
                        @csrf
        
                        <button class="btn btn-warning btn-sm">
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