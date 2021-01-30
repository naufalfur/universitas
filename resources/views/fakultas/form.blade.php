@extends('templates.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Fakultas</h1>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    {{$action}} Fakultas
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
                        @if($fakultas)
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{$fakultas?$fakultas->id?$fakultas->id:old('id'):old('id')}}">
                        @endif
                        <div class="form-group">
                            <label class="small mb-1" for="nama_fakultas">Nama Fakultas</label>
                            <input class="form-control py-4" name="nama_fakultas" id="nama_fakultas" required="required" type="text" placeholder="Masukkan Nama Fakultas" value="{{$fakultas?$fakultas->nama_fakultas?$fakultas->nama_fakultas:old('nama_fakultas'):old('nama_fakultas')}}" />
                        </div>
                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">{{$action}} Fakultas</button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
