@extends('layouts.header')

@section('content')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Daftar Jurusan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Jurusan
          <i class="fa fa-file-text-o"></i><a href="{{ route('jurusan.create') }}" class="text-success"> Tambah Data</a>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
					<th>Kode Jurusan</th>
          <th>Nama Jurusan</th>
					<th>Nama Fakultas</th>
					<th>Keterangan</th>
					<th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
					<th>Kode Jurusan</th>
          <th>Nama Jurusan</th>
					<th>Nama Fakultas</th>
					<th>Keterangan</th>
					<th>Aksi</th>
                </tr>
              </tfoot>
          @forelse($data as $d)
          <?php $tmp=DB::table('data_fk')->select('nama_fk')->where('kode_fk', $d->kode_fk)->value('nama_fk');
          ?>
                <tbody>
                  <tr>
          <td>{{ $d->kode_jur}}</td>
          <td>{{ $d->nama_jur}}</td>
          <td>{{ $tmp }}</td>
          <td>{{ $d->keterangan}}</td>
          <td align="center">
            <form action="{{ route('jurusan.destroy', ['jurusan'=>$d->kode_jur]) }}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <a href="{{ route('jurusan.show', ['jurusan'=>$d->kode_jur]) }}" class="btn btn-outline-success btn-sm">Detail</a>
              <a href="{{ route('jurusan.edit', ['jurusan'=>$d->kode_jur]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
              <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
            </form>
          </td>
          @empty
            <td colspan="5">Data Kosong</td>
          @endforelse
          </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
@endsection