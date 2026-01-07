@extends('admin.layouts.app')
    {{-- SUCCESS MESSAGE --}}
    @section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- education -->
     <div class="card mb-4" id="education">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-bold">Education Entries</span>
        <a href="{{ route('admin.education.create') }}" class="btn btn-success btn-sm">
            Add Education
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Degree</th>
                    <th>Institution</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($educations as $education)
                <tr>
                    <td><img src="{{ asset('img/' . $education->image) }}" alt="Education Image" width="100"></td>
                    <td>{{ $education->degree }}</td>
                    <td>{{ $education->institution }}</td>
                    <td>{{ $education->years }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            {{-- Update button --}}
                            <a href="{{ route('admin.education.edit', $education->id) }}" class="btn btn-primary btn-sm">
                                Update
                            </a>

                            {{-- Delete button --}}
                            <form action="{{ route('admin.education.delete', $education->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this education entry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

   
    
    @endsection
    