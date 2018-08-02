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
        <li class="breadcrumb-item active">Ubah Data Wali</li>
      </ol>
      <div class="card mb-3">
      <div class="card-header">Form Wali</div>
      <div class="card-body">
      <form method="POST" action="{{ route('wali.update', ['wali'=> $data['kode_wali']]) }}" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PATCH">
      {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Kode Wali</label>
                <input class="form-control" id="exampleInputName" type="text" value="{{ $data->kode_wali }}" name="kode_wali" aria-describedby="nameHelp" placeholder="Kode Wali" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">NID</label>
            <select class="itemName form-control" name="nid" value="{{ $data->nid }}" required></select>  
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPassword1">NIM</label>
                <select class="itemName2 form-control" name="nim" required value="{{ $data->nim }}"></select>  
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-1 offset-md-9">
              <a href="{{ route('wali.index') }}" class="btn btn-danger btn-md">Batal</a>
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
    placeholder: 'Masukkan Nama Dosen',
    ajax: {
      url: '/select2-autocomplete-ajax',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
                return {
                    text: item.nama_dosen,
                    id: item.nid
                }
            })
        };
      },
      cache: true
    }
  });
  </script>
   <script type="text/javascript">
  $('.itemName2').select2({
    placeholder: 'Masukkan Nama Mahasiswa',
    ajax: {
      url: '/select_mhsw',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
                return {
                    text: item.nama,
                    id: item.nim
                }
            })
        };
      },
      cache: true
    }
  });
  </script>
  @endsection