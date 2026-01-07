@extends('admin.layouts.app')
    {{-- SUCCESS MESSAGE --}}
    @section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- education -->
     <div class="card mb-4" id="education">
        <div class="card-header fw-bold">SKill</div>
        <div class="card-body">
            <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"
                    value="{{ old('name', $skill->name) }}" required>
                </div>


                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" id="aboutInput" accept="image/*">
                </div>

                 {{-- IMAGE PREVIEW --}}
            <div class="mb-3">
                <h5>Preview:</h5>
                <img id="aboutPreview" 
                     src="{{ $skill->image ? asset('img/' . $skill->image) : '' }}" 
                     class="rounded d-block img-fluid" 
                     style="max-width: 200px; height: auto;">
            </div>

            <button class="btn btn-primary">Save Changes</button>
            <button type="button" class="btn btn-secondary" id="cancelAboutBtn">Cancel</button>

            </form>
        </div>
    </div>

    {{-- JS: Preview and Cancel --}}
<script>
    const aboutInput = document.getElementById('aboutInput');
    const aboutPreview = document.getElementById('aboutPreview');
    const cancelBtn = document.getElementById('cancelAboutBtn');

    // Save original image src
    const originalSrc = aboutPreview.src;

    // Preview new image
    aboutInput.addEventListener('change', function() {
        const [file] = aboutInput.files;
        if (file) {
            aboutPreview.src = URL.createObjectURL(file);
        }
    });

    // Cancel: restore original image
    cancelBtn.addEventListener('click', function() {
        aboutInput.value = null;       // Clear input
        aboutPreview.src = originalSrc; // Restore original
    });
</script>

    
    
   
    
    @endsection
    