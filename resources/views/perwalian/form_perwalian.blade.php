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
        <li class="breadcrumb-item active">Tambah Data Perwalian</li>
      </ol>
      <div class="card mb-3">
      <div class="card-header">Form Perwalian</div>
      <div class="card-body">
      <form method="POST" action="{{ route('perwalian.store') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Kode Perwalian</label>
                <input class="form-control" id="exampleInputName" type="text" value="{{ $cari }}" name="kode_perwalian" readonly aria-describedby="nameHelp" placeholder="Kode Perwalian" required>
              </div>
            </div>
          </div>
          <div class="form-group">
          </div>
          <div class="table-responsive"> 
            <div class="form-group">
            <label for="exampleInputEmail1">Kode Matakuliah</label>
              <!-- start -->
              <div class="table-responsive">
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
              <thead>
              <tr>
              <th>Kode Matakuliah</th>
              <th>Nama Matakuliah</th>
              <th>Jumlah SKS</th>
              <th>Ajukan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
              <th>Kode Matakuliah</th>
              <th>Nama Matakuliah</th>
              <th>Jumlah SKS</th>
              <th>Ajukan</th>
                    </tr>
                  </tfoot>
              @forelse($data as $d)
                    <tbody>
                      <tr>
              <td>{{ $d->kode_mk}}</td>
              <td>{{ $d->nama_mk}}</td>
              <td>{{ $d->jumlah_sks}}</td>
              <td align="center">
                <div class="checkbox">
                <input type="checkbox" value="{{ $d->kode_mk}}" name="kode_mk[]"  class="form-check-input">
              </td>
              @empty
                <td colspan="4">Data Kosong</td>
              @endforelse
              </tr>
              </tbody>
              </table>
              </div>
            <!-- end -->
            </div>
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
      
      <!-- bottom -->
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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

  <script type="text/javascript">
        $(document).ready(function(){      
        var postURL = "<?php echo url('addmore'); ?>";
        var i=1;  

        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="kode_mk[]" placeholder="Kode Matakuliah" class="form-control" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" required>X</button></td></tr>');  
        });  


        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });  


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#submit').click(function(){            
            $.ajax({  
                    url:postURL,  
                    method:"POST",  
                    data:$('#add_detail').serialize(),
                    type:'json',
                    success:function(data)  
                    {
                        if(data.error){
                            printErrorMsg(data.error);
                        }else{
                            i=1;
                            $('.dynamic-added').remove();
                            $('#add_detail')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display','block');
                            $(".print-error-msg").css('display','none');
                            $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                        }
                    }  
            });  
        });
        function printErrorMsg (msg) {

            $(".print-error-msg").find("ul").html('');

            $(".print-error-msg").css('display','block');

            $(".print-success-msg").css('display','none');

            $.each( msg, function( key, value ) {

            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

            });

            }

         });  
    </script>
  @endsection