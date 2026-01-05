@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4>Footer Contact</h4>

    <form method="POST" action="{{ route('admin.footer.contact.store') }}">
        @csrf
        <input type="text" name="text" class="form-control mb-2" required>
        <button class="btn btn-primary">Add</button>
    </form>

    <table class="table mt-3">
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->text }}</td>
            <td>
                <form method="POST" action="{{ route('admin.footer.contact.delete',$contact->id) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
