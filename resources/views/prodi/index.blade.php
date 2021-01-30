@extends('templates.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Prodi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('prodi.create')}}" class="btn btn-outline-primary">Tambah Prodi</a></li>
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
                Data Prodi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Jenjang</th>
                            <th>Waktu Tempuh</th>
                            <th>Fakultas</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Jenjang</th>
                            <th>Waktu Tempuh</th>
                            <th>Fakultas</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if(count($prodi) > 0)
                            @foreach($prodi as $k=>$v)
                                <tr>
                                    <td>{{$k+1}}</td>
                                    <td>{{$v->nama_prodi}}</td>
                                    <td>{{$v->jenjang}}</td>
                                    <td>{{$v->waktu_tempuh_minimal}} - {{$v->waktu_tempuh_maksimal}} Tahun</td>
                                    <td>{{$v->fakultas->nama_fakultas}}</td>
                                    <td><a href="{{route('prodi.edit', $v->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route('prodi.destroy', $v->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin? Mahasiswa yang berhubungan juga akan dihapuskan')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="7" class="text-center">Data Tidak Ditemukan</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
