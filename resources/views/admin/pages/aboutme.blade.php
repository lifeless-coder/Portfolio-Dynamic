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
        <form action="{{ route('admin.about.text.edit') }}" method="GET">
            <button type="submit" class="btn btn-primary">Update About Me</button>
        </form>

        @if($about)
        <hr>
        <h5>Current About Me:</h5>
        <p><strong>Title:</strong> {{ $about->title }}</p>
        <p><strong>Subtitle:</strong> {{ $about->subtitle }}</p>
        <p><strong>Description:</strong> {{ $about->description }}</p>
        @endif
    </div>
</div>


@endsection
