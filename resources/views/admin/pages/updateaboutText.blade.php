@extends('admin.layouts.app')
    {{-- SUCCESS MESSAGE --}}
    @section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
{{-- ABOUT TEXT --}}
<div class="card mb-4" id="about">
    <div class="card-header fw-bold">About Me</div>
    <div class="card-body">
        <form action="{{ route('admin.about.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" 
                    value="{{ old('title', $about ? $about->title : '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" 
                    value="{{ old('subtitle', $about ? $about->subtitle : '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $about ? $about->description : '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>

        
@endsection
