@extends('layouts.admin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="box-title">List Category</h4>
        </div>
        <div class="card-body">
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($items as $item )
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                      <a href="{{ route('categories.edit', $item->id)}}" class="btn btn-info btn-sm">
                        <i class="fa fa-pencil-alt"></i>
                      </a>
                      <form action="{{ route('categories.destroy', $item->id) }}" 
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