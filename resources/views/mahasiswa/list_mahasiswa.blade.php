@extends('layouts.header')

@section('content')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Daftar Mahasiswa</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Mahasiswa 
          <i class="fa fa-file-text-o"></i><a href="{{ route('mahasiswa.create') }}" class="text-success"> Tambah Data</a>
       
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
					<th>NIM</th>
					<th>Nama</th>
					<th>Jurusan</th>
					<th>Tempat Lahir</th>
					<th>Jenis Kelamin</th>
					<th>No. Telp</th>
					<th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
					<th>NIM</th>
					<th>Nama</th>
					<th>Jurusan</th>
					<th>Tempat Lahir</th>
					<th>Jenis Kelamin</th>
					<th>No. Telp</th>
					<th>Aksi</th>
                </tr>
              </tfoot>
        @forelse($data as $d)
        <?php $tmp=DB::table('data_jurusan')->select('nama_jur')->where('kode_jur', $d->kode_jur)->value('nama_jur');
          ?>
              <tbody>
               </tr>
				<td>{{ $d->nim}}</td>
				<td>{{ $d->nama}}</td>
				<td>{{ $tmp}}</td>
				<td>{{ $d->tempat_lahir}}</td>
				<td>{{ $d->jenis_kelamin}}</td>
				<td>{{ $d->no_telp}}</td>
				<td align="center">
					<form action="{{ route('mahasiswa.destroy', ['mahasiswa'=>$d->nim]) }}" method="post">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<a href="{{ route('mahasiswa.show', ['mahasiswa'=>$d->nim]) }}" class="btn btn-outline-success btn-sm">Detail</a>
						<a href="{{ route('mahasiswa.edit', ['mahasiswa'=>$d->nim]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
					</form>
				</td>
				@empty
					<td colspan="7">Data Kosong</td>
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