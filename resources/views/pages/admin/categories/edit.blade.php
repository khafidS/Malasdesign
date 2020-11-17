@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <strong>Ubah Kategori</strong>
      <small>{{ $items->name }}</small>
    </div>
    <div class="card-body card-block">
      <form action="{{route('categories.update', $items->id)}}" method="POST">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="name" class="form-control-label">Nama Kategori</label>
        <input  type="text"
                name="name"
                value="{{ old('name') ? old ('name') : $items->name }}"
                class="form-control @error('name') is-invalid @enderror"/>
        @error('name')
          <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group w-50 mx-auto">
        <button class="btn btn-primary btn-block" type="submit">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection