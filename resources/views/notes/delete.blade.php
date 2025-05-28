@extends('base')

@section('content')

<form id="delete-form" action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="button" id="delete-button"
        style="background-color: #dc3545; padding: 10px 18px; color: white; border: none; border-radius: 6px; font-weight: 500; cursor: pointer;">
        🗑️ Delete
    </button>
</form>

<script>
    document.getElementById('delete-button').addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "This note will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        });
    });
</script>

@endsection