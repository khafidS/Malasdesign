@extends('layouts.admin')

@section('content')
    <div class="container">
      <div class="card">
        <div class="card-header">
          <strong>Tambah Template</strong>
        </div>
        <div class="card-body card-block">
          <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name" class="form-control-label">Nama Template</label>
              <input  type="text"
                      name="name"
                      value="{{ old('name') }}"
                      class="form-control @error('name') is-invalid @enderror"/>
              @error('name')
                <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              @for ($i = 0 ; $i < 2; $i++)
                <label for="category-@php echo $i; @endphp" class="form-control-label">Kategori ke-@php echo $i+1; @endphp</label>
                <select name="category @php echo $i; @endphp" required class="form-control">
                  <option value="" selected disabled> Pilih Kategori Template</option>
                  @for ($a = 0; $a < $count; $a++)
                  <option value="{{ $category[$a]->id }}">
                    {{ $category[$a]->name }}
                  </option>
                  @endfor
                </select>
                @error('category')
                <div class="alert alert-danger" role="alert">
                  {{ $message }}
                </div>
                @enderror
              @endfor
            </div>
            
            <div class="form-group">
              <label for="description" class="form-control-label">Deskripsi Template</label>
              <textarea name="description"
                        class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
              @error('description')
                <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="photo" class="form-control-label">Foto Template</label>
              <input  type="file"
                      name="photo"
                      value="{{ old('photo') }}"
                      accept="image/*"
                      class="form-control @error('photo') is-invalid @enderror"/>
              @error('photo')
                <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="price" class="form-control-label">Harga Template</label>
              <input  type="number"
                      name="price"
                      value="{{ old('price') }}"
                      class="form-control @error('price') is-invalid @enderror"/>
              @error('price')
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