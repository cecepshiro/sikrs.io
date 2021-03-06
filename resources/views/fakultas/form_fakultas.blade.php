@extends('layouts.header')

@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Fakultas</li>
      </ol>
      <div class="card mb-3">
      <div class="card-header">Form Fakultas</div>
      <div class="card-body">
      <form method="POST" action="{{ route('fakultas.store') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Kode Fakultas</label>
                <input class="form-control" id="exampleInputName" type="text" name="kode_fk" aria-describedby="nameHelp" placeholder="Kode Fakultas" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Fakultas</label>
            <input class="form-control" id="exampleInputName" type="text" name="nama_fk" aria-describedby="nameHelp" placeholder="Nama Fakultas" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPassword1">Keterangan</label>
                <textarea class="form-control" id="exampleInputName" name="keterangan" aria-describedby="nameHelp" placeholder="Keterangan" required></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-1 offset-md-9">
              <a href="{{ route('fakultas.index') }}" class="btn btn-danger btn-md">Batal</a>
            </div>
            <div class="col-md-1 offset-md-0">
              <input type="submit" class="btn btn-primary btn-md" value="Simpan">
            </div>
          </div>
        </form>         
        </div>
      </div>
      </div>
    </div>
  </div>

  @endsection