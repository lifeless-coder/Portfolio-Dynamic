@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4>Footer Quick Links</h4>

    <form method="POST" action="{{ route('admin.footer.quicklink.store') }}">
        @csrf
        <input type="text" name="name" class="form-control mb-2" placeholder="Link Name" required>
        <input type="text" name="url" class="form-control mb-2" placeholder="URL" required>
        <button class="btn btn-primary">Add</button>
    </form>

    <table class="table mt-3">
        @foreach($links as $link)
        <tr>
            <td>{{ $link->name }}</td>
            <td>{{ $link->url }}</td>
            <td>
                <form method="POST" action="{{ route('admin.footer.quicklink.delete',$link->id) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
