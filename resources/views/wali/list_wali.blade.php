@extends('layouts.header')

@section('content')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Daftar Wali Mahasiswa</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Wali Mahasiswa
          <i class="fa fa-file-text-o"></i><a href="{{ route('wali.create') }}" class="text-success"> Tambah Data</a>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
					<th>Kode Wali</th>
					<th>NID</th>
					<th>NIM</th>
					<th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
          <th>Kode Wali</th>
					<th>NID</th>
					<th>NIM</th>
					<th>Aksi</th>
                </tr>
              </tfoot>
			  @forelse($data as $d)
              <tbody>
                <tr>
				<td>{{ $d->kode_wali}}</td>
				<td>{{ $d->nid}}</td>
				<td>{{ $d->nim}}</td>
				<td align="center">
					<!-- <form action="{{ route('fakultas.destroy', ['fakultas'=>$d->kode_fk]) }}" method="post">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<a href="{{ route('fakultas.show', ['fakultas'=>$d->kode_fk]) }}" class="btn btn-outline-success btn-sm">Detail</a>
						<a href="{{ route('fakultas.edit', ['fakultas'=>$d->kode_fk]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
          </form> -->
          <form action="{{ route('wali.destroy', ['wali'=>$d->kode_wali]) }}" method="post">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<a href="{{ route('wali.edit', ['wali'=>$d->kode_wali]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
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

  <!-- Delete Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Klik "Hapus" jika ingin merubah data</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection