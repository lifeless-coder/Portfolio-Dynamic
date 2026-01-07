@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4" id="education">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-bold">Quick Links</span>
        <a href="{{ route('admin.footer.quicklink.create') }}" class="btn btn-success">Add new</a>
    </div>

    <table class="table mt-3">
        @foreach($links as $link)
        <tr>
            <td>{{ $link->name }}</td>
            <td>{{ $link->url }}</td>
            <td>
                <a href="{{ route('admin.footer.quicklink.update', $link->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.footer.quicklink.delete', $link->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this link?')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
