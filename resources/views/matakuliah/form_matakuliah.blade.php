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
        <li class="breadcrumb-item active">Tambah Data Matakuliah</li>
      </ol>
      <div class="card mb-3">
      <div class="card-header">Form Matakuliah</div>
      <div class="card-body">
      <form method="POST" action="{{ route('matakuliah.store') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Kode Matakuliah</label>
                <input class="form-control" id="exampleInputName" type="text" name="kode_mk" aria-describedby="nameHelp" placeholder="Kode Matakuliah" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Matakuliah</label>
            <input class="form-control" id="exampleInputName" type="text" name="nama_mk" aria-describedby="nameHelp" placeholder="Nama Matakuliah" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Dosen</label>
            <select class="itemName form-control" name="nid" required></select>  
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jumlah SKS</label>
            <input class="form-control" id="exampleInputName" type="text" name="jumlah_sks" aria-describedby="nameHelp" placeholder="Jumlah SKS" required>
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
  <script type="text/javascript">


      $('.itemName').select2({
        placeholder: 'Select an item',
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
  @endsection