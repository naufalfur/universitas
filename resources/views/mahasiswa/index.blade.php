@extends('templates.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Mahasiswa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('mahasiswa.create')}}" class="btn btn-outline-primary">Tambah Mahasiswa</a></li>
        </ol>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Mahasiswa
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Tanggal Lahir</th>
                            <th>Prodi</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Tanggal Lahir</th>
                            <th>Prodi</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if(count($mahasiswa) > 0)
                            @foreach($mahasiswa as $k=>$v)
                                <tr>
                                    <td>{{$k+1}}</td>
                                    <td>{{$v->nama_mahasiswa}}</td>
                                    <td>{{$v->umur}}</td>
                                    <td>{{$v->alamat}}</td>
                                    <td>{{$v->telepon}}</td>
                                    <td>{{$v->email}}</td>
                                    <td>{{date('d-m-Y', strtotime($v->tanggal_lahir))}}</td>
                                    <td>{{$v->prodi->nama_prodi}}</td>
                                    <td><a href="{{route('mahasiswa.edit', $v->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route('mahasiswa.destroy', $v->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="10" class="text-center">Data Tidak Ditemukan</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
