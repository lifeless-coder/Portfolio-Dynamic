

    @extends('admin.layouts.app')

@section('content')
<h4>Footer Quick Links</h4>

    <form method="POST" action="{{ route('admin.footer.quicklink.store') }}">
        @csrf
        <input type="text" name="name" class="form-control mb-2" placeholder="Link Name" required>
        <input type="text" name="url" class="form-control mb-2" placeholder="URL" required>
        <button class="btn btn-primary">Add</button>
    </form>



</div>
@endsection
