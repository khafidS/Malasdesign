@extends('layouts.admin')

@section('content')
    <div class="container">
      <div class="card">
        <div class="card-header">
          <strong>Tambah Kategori</strong>
        </div>
        <div class="card-body card-block">
          <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name" class="form-control-label">Nama Kategori</label>
              <input  type="text"
                      name="name"
                      value="{{ old('name') }}"
                      class="form-control @error('name') is-invalid @enderror"/>
              @error('name')
                <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group w-50 mx-auto">
              <button class="btn btn-primary btn-block" type="submit">CREATE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection