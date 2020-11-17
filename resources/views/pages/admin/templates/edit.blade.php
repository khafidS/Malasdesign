@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <strong>Ubah Template</strong>
      <small>{{ $items->name }}</small>
    </div>
    <div class="card-body card-block">
      <form action="{{route('templates.update', $items->id)}}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="name" class="form-control-label">Nama Template</label>
        <input  type="text"
                name="name"
                value="{{ old('name') ? old ('name') : $items->name }}"
                class="form-control @error('name') is-invalid @enderror"/>
        @error('name')
          <div class="text-muted">{{ $message }}</div>
        @enderror
      </div>


      <div class="form-group">
        @for ( $i = 0; $i < $j ; $i++)
          <label for="category-@php echo $i; @endphp" class="form-control-label">Kategori ke-@php echo $i+1; @endphp</label>
          <select name="category @php echo $i; @endphp" required class="form-control">
            <option value="{{ $cat[$i]->id }}">Kategori Awal [{{ $cat[$i]->name }}]</option>
            @for ($a = 0; $a < $h; $a++)
            <option value="{{ $categories[$a]->id }}" 
              @if ($cat[$i]->id == $categories[$a]->id) 
                disabled 
              @endif>
              {{ $categories[$a]->name }}
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
        <label for="price" class="form-control-label">Harga Template</label>
        <input  type="number"
                name="price"
                value="{{ old('price') ? old('price') : $items->price }}"
                class="form-control @error('price') is-invalid @enderror"/>
        @error('price')
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
        <label for="description" class="form-control-label">Deskripsi</label>
        <textarea name="description"
                  class="ckeditor form-control @error('description') is-invalid @enderror"
                  style="height: 250px !important; width: 100%;">{{ old('description') ? old('description') : $templates[0]->description}}</textarea>
        @error('description')
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