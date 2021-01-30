@extends('templates.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Prodi</h1>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    {{$action}} Prodi
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{$url}}">
                        @csrf
                        @if($prodi)
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{$prodi?$prodi->id?$prodi->id:old('id'):old('id')}}">
                        @endif
                        <div class="form-group">
                            <label class="small mb-1" for="nama_prodi">Nama Prodi</label>
                            <input class="form-control py-4" name="nama_prodi" id="nama_prodi" required="required" type="text" placeholder="Masukkan Nama Prodi" value="{{$prodi?$prodi->nama_prodi?$prodi->nama_prodi:old('nama_prodi'):old('nama_prodi')}}" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="jenjang">Jenjang</label>
                            <input class="form-control py-4" name="jenjang" id="jenjang" required="required" type="text" placeholder="Masukkan Jenjang Prodi" value="{{$prodi?$prodi->jenjang?$prodi->jenjang:old('jenjang'):old('jenjang')}}" />
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="waktu_tempuh_minimal">Waktu Tempuh Minimal</label>
                                    <input class="form-control py-4" id="waktu_tempuh_minimal" name="waktu_tempuh_minimal" type="number" placeholder="Waktu dalam Tahun"
                                           value="{{$prodi?$prodi->waktu_tempuh_minimal?$prodi->waktu_tempuh_minimal:old('waktu_tempuh_minimal'):old('waktu_tempuh_minimal')}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="waktu_tempuh_maksimal">Waktu Tempuh Maksimal</label>
                                    <input class="form-control py-4" id="waktu_tempuh_maksimal" name="waktu_tempuh_maksimal" type="number" placeholder="Waktu dalam Tahun"
                                           value="{{$prodi?$prodi->waktu_tempuh_maksimal?$prodi->waktu_tempuh_maksimal:old('waktu_tempuh_maksimal'):old('waktu_tempuh_maksimal')}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="fakultas_id">Fakultas</label>
                            <select class="form-control" id="fakultas_id" name="fakultas_id" required="required">
                                <option value="">--Pilih Fakultas Terkait--</option>
                                @foreach($fakultas as $k=>$v)
                                    <option value="{{$v->id}}" {{$prodi?$prodi->fakultas_id == $v->id?'selected':old('fakultas_id')  == $v->id?'selected':'':old('fakultas_id')  == $v->id?'selected':''}}>
                                        {{$v->nama_fakultas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">{{$action}} Prodi</button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
