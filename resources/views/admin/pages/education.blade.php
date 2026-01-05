@extends('admin.layouts.app')
    {{-- SUCCESS MESSAGE --}}
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
                    <input type="file" name="image" class="form-control">
                </div>

                <button class="btn btn-success">Add Education</button>
            </form>
        </div>
    </div>

    <!-- EDUCATION LIST -->
    
    <div class="card mb-4" id="education">
        <div class="card-header fw-bold">Education Entries</div>
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
                            <form action="{{ route('admin.education.delete', $education->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this education entry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

   
    
    @endsection
    