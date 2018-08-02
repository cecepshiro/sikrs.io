@extends('layouts.header')

@section('content')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Daftar Matakuliah</li>
        </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Matakuliah 
          <i class="fa fa-file-text-o"></i><a href="{{ route('matakuliah.create') }}" class="text-success"> Tambah Data</a>
       
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
					<th>Kode Matakuliah</th>
					<th>Nama Matakuliah</th>
					<th>NID</th>
					<th>Jumlah SKS</th>
					<th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
					<th>Kode Matakuliah</th>
					<th>Nama Matakuliah</th>
					<th>NID</th>
					<th>Jumlah SKS</th>
					<th>Aksi</th>
                </tr>
              </tfoot>
			  @forelse($data as $d)
              <tbody>
                <tr>
				<td>{{ $d->kode_mk}}</td>
				<td>{{ $d->nama_mk}}</td>
				<td>{{ $d->nid}}</td>
				<td>{{ $d->jumlah_sks}}</td>
				<td align="center">
					<form action="{{ route('matakuliah.destroy', ['matakuliah'=>$d->kode_mk]) }}" method="post">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<a href="{{ route('matakuliah.edit', ['matakuliah'=>$d->kode_mk]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
					</form>
				</td>
				@empty
					<td colspan="4">Data Kosong</td>
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