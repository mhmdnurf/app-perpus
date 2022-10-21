@extends('layouts.main')
@section('container')
    <form action="/data-peminjaman" method="POST">
        @csrf
        <label for="member">Nomor Anggota</label>
        <select name="member_id" class="form-control">
            <option></option>
            @foreach ($members as $member)
                <option value="{{ $member->id }}">{{ $member->member_id }}</option>
            @endforeach
        </select>

        <label for="book_id">Nama Anggota</label>
        <input id="book_id" type="text" name="book_id" id="book_search" required readonly
            class="form-control @error('book_id')
        is-invalid
    @enderror">
        @error('book_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
        <a href="/data-buku" class="btn btn-danger">Cancel</a>
    </form>
@endsection

<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
