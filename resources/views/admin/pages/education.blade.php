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

    @section('content')
    
    @endsection
    