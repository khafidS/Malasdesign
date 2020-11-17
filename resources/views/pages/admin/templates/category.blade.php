@extends('layouts.admin')

@section('content')
    <div class="container">
      <div class="card">
        <div class="card-header">
          <strong>Tambah Category Template</strong>
        </div>
        <div class="card-body card-block">
          <form action="{{ route('template-category.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name" class="form-control-label">Pilih Template</label>
                <select name="template" class="form-control">
                  <option value="" selected disabled> Pilih Template </option>
                  @for ($i = 0; $i < $count_temp; $i++)
                      <option value="{{ $templates[$i]->id }}">
                        {{ $templates[$i]->name }}
                      </option>
                  @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="category" class="form-control-label">Inputan Kategori</label>
                <select name="category" required class="form-control">
                  <option value="" selected disabled> Pilih Kategori Template </option>
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
            </div>

            <div class="form-group w-50 mx-auto">
              <button class="btn btn-primary btn-block" type="submit">CREATE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection