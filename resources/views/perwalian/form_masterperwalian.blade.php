@extends('layouts.header')
  <!-- autocomplete -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<link href="{{ asset('assets/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('assets/select2.min.js') }}"></script>
@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Master Perwalian</li>
      </ol>
      <div class="card mb-3">
      <div class="card-header">Form Master Perwalian</div>
      <div class="card-body">
      <form method="POST" action="{{ route('master.store') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Kode Perwalian</label>
                <input class="form-control" id="exampleInputName" type="text" name="kode_perwalian" aria-describedby="nameHelp" placeholder="Kode Perwalian" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Wali</label>
            <select class="itemName form-control" name="kode_wali" required></select>  
          </div>
          <div class="row">
            <div class="col-md-1 offset-md-9">
              <a href="{{ route('master.index') }}" class="btn btn-danger btn-md">Batal</a>
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
  <script type="text/javascript">
  $('.itemName').select2({
    placeholder: 'Masukkan NIM',
    ajax: {
      url: '/select_kodewali',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
                return {
                    text: item.nim,
                    id: item.kode_wali
                }
            })
        };
      },
      cache: true
    }
  });
  </script>
  @endsection