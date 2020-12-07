@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="box-title">Order List</h4>
        </div>
        <div class="card-body">
                <div class="mt-4 container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="mt-4">
                    <div class="accordion" id="accordion" role="tablist">
                        @foreach ($users as $index => $user)
                            <div class="card">
                                {{-- CARD HEADER --}}
                                <div class="card-header ml-2" role="tab" id="heading-{{$index}}">
                                    <a data-toggle="collapse" href="#collapse-{{$index}}" aria-expanded="false" aria-controls="collapse-{{$index}}" data-abc="true" class="collapsed"> 
                                        <table style="width: 76%">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 21%">{{$index + 1}}</td>
                                                    <td style="width: 36%">{{$user->name}}</td>
                                                    <td style="width: 35%">{{$user->email}}</td>
                                                    @if ($user->order()->get('order_status')->implode('order_status') == 'PENDING')
                                                        <td style="width: 8%"><span class="badge badge-danger">{{ $user->order()->get('order_status')->implode('order_status') }}</span></td>
                                                    @elseif($user->order()->get('order_status')->implode('order_status') == 'ON PROGRESS')
                                                        <td style="width: 8%"><span class="badge badge-warning">{{ $user->order()->get('order_status')->implode('order_status') }}</span></td>
                                                    @else
                                                        <td style="width: 8%"><span class="badge badge-success">{{ $user->order()->get('order_status')->implode('order_status') }}</span></td>
                                                    @endif
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </a>
                                </div>
                                {{-- END CARD HEADER --}}

                                {{-- CARD BODY --}}
                                <div id="collapse-{{$index}}" class="collapse" role="tabpanel" aria-labelledby="heading-{{$index}}" data-parent="#accordion" style="">
                                    <div class="card-body ml-3">
                                        <table class="table table-striped">
                                            <tr>
                                                <td class="w-25 border-0">Nama Lengkap</td>
                                                <td class="border-0">{{ $user->order()->get('nama_lengkap')->implode('nama_lengkap') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Tanggal Lahir</td>
                                                <td class="border-0">{{ $user->order()->get('tanggal_lahir')->implode('tanggal_lahir') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Agama</td>
                                                <td class="border-0">{{ $user->order()->get('agama')->implode('agama') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Suku</td>
                                                <td class="border-0">{{ $user->order()->get('suku')->implode('suku') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Tinggi Badan</td>
                                                <td class="border-0">{{ $user->order()->get('tinggi_badan')->implode('tinggi_badan') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Status</td>
                                                <td class="border-0">{{ $user->order()->get('status')->implode('status') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Alamat</td>
                                                <td class="border-0">{{ $user->order()->get('alamat')->implode('alamat') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Nomor Handphone</td>
                                                <td class="border-0">{{ $user->order()->get('no_hp')->implode('no_hp') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Email</td>
                                                <td class="border-0">{{ $user->order()->get('email')->implode('email') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Facebook</td>
                                                <td class="border-0">{{ $user->order()->get('facebook')->implode('facebook') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Instagram</td>
                                                <td class="border-0">{{ $user->order()->get('instagram')->implode('instagram') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Pendidikan Formal</td>
                                                <td class="border-0">{{ $user->order()->get('pendidikan_formal')->implode('pendidikan_formal') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Pendidikan Non Formal</td>
                                                <td class="border-0">{{ $user->order()->get('pendidikan_nonformal')->implode('pendidikan_nonformal') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Keahlian Khusus</td>
                                                <td class="border-0">{{ $user->order()->get('keahlian_khusus')->implode('keahlian_khusus') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Motto</td>
                                                <td class="border-0">{{ $user->order()->get('motto')->implode('motto') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Hobi</td>
                                                <td class="border-0">{{ $user->order()->get('hobi')->implode('hobi') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Latar Belakang</td>
                                                <td class="border-0">{{ $user->order()->get('latar_belakang')->implode('latar_belakang') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Pengalaman Organisasi</td>
                                                <td class="border-0">{{ $user->order()->get('pengalaman_organisasi')->implode('pengalaman_organisasi') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Pengalaman Magang</td>
                                                <td class="border-0">{{ $user->order()->get('pengalaman_magang')->implode('pengalaman_magang') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Soft Skill</td>
                                                <td class="border-0">{{ $user->order()->get('soft_skill')->implode('soft_skill') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Kemampuan Bahasa</td>
                                                <td class="border-0">{{ $user->order()->get('kemampuan_bahasa')->implode('kemampuan_bahasa') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 border-0">Nama Template Yang di Pesan</td>
                                                <td class="border-0">
                                                    {{ $templates->where('id', (int)$user->order()->get('template_id')->implode('template_id'))->pluck('name')->implode('name') }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                {{-- END CARD BODY --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection