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
            <form action="{{ route('admin.education.update', $education->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Degree</label>
                    <input type="text" name="degree" class="form-control"
                    value="{{ old('degree', $education->degree) }}" required>
                </div>

                <div class="mb-3">
                    <label>Institution</label>
                    <input type="text" name="institution" class="form-control"
                    value="{{ old('institution', $education->institution) }}" required>
                </div>

                <div class="mb-3">
                    <label>Years</label>
                    <input type="text" name="years" class="form-control" 
                    value="{{ old('years', $education->years) }}" required>
                </div>

                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" id="aboutInput" accept="image/*">
                </div>

                 {{-- IMAGE PREVIEW --}}
            <div class="mb-3">
                <h5>Preview:</h5>
                <img id="aboutPreview" 
                     src="{{ $education->image ? asset('img/' . $education->image) : '' }}" 
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
    