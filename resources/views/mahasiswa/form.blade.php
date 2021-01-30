@extends('templates.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Mahasiswa</h1>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    {{$action}} Mahasiswa
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
                        @if($mahasiswa)
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{$mahasiswa?$mahasiswa->id?$mahasiswa->id:old('id'):old('id')}}">
                        @endif
                        <div class="form-group">
                            <label class="small mb-1" for="nama_mahasiswa">Nama Mahasiswa</label>
                            <input class="form-control py-4" name="nama_mahasiswa" id="nama_mahasiswa" required="required" type="text" placeholder="Masukkan Nama Mahasiswa" value="{{$mahasiswa?$mahasiswa->nama_mahasiswa?$mahasiswa->nama_mahasiswa:old('nama_mahasiswa'):old('nama_mahasiswa')}}" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="umur">Umur</label>
                            <input class="form-control py-4" name="umur" id="umur" required="required" type="number" placeholder="Masukkan Umur Mahasiswa" value="{{$mahasiswa?$mahasiswa->umur?$mahasiswa->umur:old('umur'):old('umur')}}" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="alamat">Alamat</label>
                            <input class="form-control py-4" name="alamat" id="alamat" required="required" type="text" placeholder="Masukkan Alamat Mahasiswa" value="{{$mahasiswa?$mahasiswa->alamat?$mahasiswa->alamat:old('alamat'):old('alamat')}}" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="telepon">Telepon</label>
                            <input class="form-control py-4" name="telepon" id="telepon" required="required" type="text" placeholder="Masukkan Telepon Mahasiswa" value="{{$mahasiswa?$mahasiswa->telepon?$mahasiswa->telepon:old('telepon'):old('telepon')}}" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control py-4" name="email" id="email" required="required" type="email" placeholder="Masukkan Email Mahasiswa" value="{{$mahasiswa?$mahasiswa->email?$mahasiswa->email:old('email'):old('email')}}" />
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir" class="small mb-1">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" required="required" value="{{$mahasiswa?$mahasiswa->tanggal_lahir?$mahasiswa->tanggal_lahir:old('tanggal_lahir'):old('tanggal_lahir')}}">
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="prodi_id">Prodi</label>
                            <select class="form-control" id="prodi_id" name="prodi_id" required="required">
                                <option value="">--Pilih Prodi Terkait--</option>
                                @foreach($prodi as $k=>$v)
                                    <option value="{{$v->id}}" {{$mahasiswa?$mahasiswa->prodi_id == $v->id?'selected':old('prodi_id')  == $v->id?'selected':'':old('prodi_id')  == $v->id?'selected':''}}>
                                        {{$v->nama_prodi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">{{$action}} Mahasiswa</button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
