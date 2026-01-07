@extends('admin.layouts.app')

@section('content')
<div class="container">
    

    <form method="POST" action="{{ route('admin.footer.text.store') }}">
        @csrf

        <div class="mb-3">
                    <input type="text"
       name="text"
       class="form-control"
       value="{{ old('text', $text->text ?? '') }}"
       required>

                </div>
        <button class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
