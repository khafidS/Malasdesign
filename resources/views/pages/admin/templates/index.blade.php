@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="box-title">Daftar Template</h4>
        </div>
        <div class="card-body">
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($items as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->slug }}</td>
                  <td>Rp {{ $item->price }}</td>
                  <td>
                    <a  
                        {{-- href="{{route('template_details.detail', $item->id)}}" --}}
                        href="#mymodal"
                        data-remote="{{route('template-details.detail', $item->id)}}" 
                        data-toggle="modal"
                        data-target="#mymodal"
                        data-title="{{ $item->name }}"
                        class="btn btn-info btn-sm"
                        data-target="#mymodal">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a  href="#mymodalphoto"
                        data-remote="{{route('template_details.show', $item->id)}}" 
                        data-toggle="modal"
                        data-target="#mymodalphoto"
                        data-title="{{ $item->name }}"
                        class="btn btn-info btn-sm"
                        data-target="#mymodalphoto"
                        class="btn btn-info btn-sm">
                      <i class="fa fa-images"></i>
                    </a>
                    <a href="{{ route('templates.edit', $item->id)}}" class="btn btn-info btn-sm">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('templates.destroy', $item->id) }}" 
                          method="POST" 
                          class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @empty
                    <tr>
                      <td colspan="6" class="text-center p-5">
                        Data Tidak Tersedia !
                      </td>
                    </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection