@extends('layouts.header')
  <!-- autocomplete -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<link href="{{ asset('assets/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('assets/select2.min.js') }}"></script>
<!-- Bootstrap Date-Picker Plugin -->
<script src="{{ asset('assets/gijgo.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('assets/gijgo.min.css') }}" type="text/css" rel="stylesheet" />
@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Dosen</li>
      </ol>
      <div class="card mb-3">
      <div class="card-header">Form Dosen</div>
      <div class="card-body">
      <form method="POST" action="{{ route('dosen.store') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Nama</label>
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <input class="form-control" id="exampleInputName" type="text" name="nama_dosen" aria-describedby="nameHelp" placeholder="Nama" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">NID</label>
            <input class="form-control" id="exampleInputName" type="text" maxlength="10" name="nid" aria-describedby="nameHelp" placeholder="NID" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jurusan</label>
            <select name="kode_jur" class="custom-select custom-select-md mb-3" required>
            <option value="">Pilih Jurusan</option>	
              @foreach($jurusan as $jr)
              <option value="{{ $jr->kode_jur }}" >{{ $jr->nama_jur }}</option>	
              @endforeach
            </select>	
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tempat Lahir</label>
            <input class="form-control" id="exampleInputName" type="text" name="tempat_lahir" aria-describedby="nameHelp" placeholder="Tempat Lahir" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tgl. Lahir</label>
            <input id="datepicker" name="tgl_lahir" required/>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <div class="row">
            <div class="col-md-4 offset-md-3">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline1" name="jenis_kelamin" required value="Laki-Laki" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline1" >Laki-Laki</label>
                </div>
            </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline2" name="jenis_kelamin" required value="Perempuan" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                </div>
            </div>
          
          
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Agama</label>
            <input class="form-control" id="exampleInputName" type="text" name="agama" aria-describedby="nameHelp" placeholder="Agama" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea class="form-control" id="exampleInputName" type="text" name="alamat" aria-describedby="nameHelp" placeholder="Alamat" required></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">No. Telepon</label>
            <input class="form-control" id="exampleInputName" type="text" name="no_telp" aria-describedby="nameHelp" placeholder="No. Telepon" required>
          </div>
          <div class="row">
            <div class="col-md-1 offset-md-9">
              <a href="{{ route('dosen.index') }}" class="btn btn-danger btn-md">Batal</a>
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
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy/mm/dd',
            startView: 1,
            todayBtn:  1,
            todayHighlight: 1,
            minView: 2,
            forceParse: 0,
            weekStart: 1,
            autoclose: 1,
        });
</script>

  @endsection