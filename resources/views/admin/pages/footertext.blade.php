@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4>Footer Text</h4>

    <form method="POST" action="{{ route('admin.footer.text.store') }}">
        @csrf
        <textarea name="text" class="form-control mb-2" required></textarea>
        <button class="btn btn-primary">Update</button>
    </form>

    <table class="table mt-3">
        @foreach($texts as $text)
        <tr>
            <td>{{ $text->text }}</td>
            <td>
                <form method="POST" action="{{ route('admin.footer.text.delete',$text->id) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
