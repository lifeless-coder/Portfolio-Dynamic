@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4>Edit Quick Link</h4>

    <form method="POST" action="{{ route('admin.footer.quicklink.storeupdate', $link->id) }}">
        @csrf
        @method('PUT')

        <input type="text"
               name="name"
               class="form-control mb-2"
               placeholder="name"
               value="{{ old('name', $link->name) }}"
               required>

        <input type="text"
               name="url"
               class="form-control mb-2"
               placeholder="url"
               value="{{ old('url', $link->url) }}"
               required>

        <button class="btn btn-primary" type="submit">Save Changes</button>
    </form>
</div>
@endsection
