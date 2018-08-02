@extends('layouts.header')

@section('content')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('master.index') }}">Daftar Master Perwalian</a>
        </li>
        <li class="breadcrumb-item active">Daftar Perwalian</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <form action='{{action("PerwalianController@formPerwalian") }}' method='get'>
          {{ csrf_field() }}
          <input type="hidden" value="{{ $cari }}" name="search">
          <i class="fa fa-table"></i> Daftar Perwalian
          <i class="fa fa-file-text-o"></i> <button type="submit" class="btn btn-outline-success btn-sm">Tambah Data</button>
          </form>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
					<th>Kode Perwalian</th>
					<th>Kode MK</th>
          <th>Status</th>
					<th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
					<th>Kode Perwalian</th>
					<th>Kode MK</th>
          <th>Kode Status</th>
					<th>Aksi</th>
                </tr>
              </tfoot>
			  @forelse($data as $d)
              <tbody>
                <tr>
				<td>{{ $d->kode_perwalian}}</td>
				<td>{{ $d->kode_mk}}</td>
        <td>{{ $d->status}}</td>
				<td align="center">
          @if(Auth::user()->hak_akses==2)
          <form action="{{ action('PerwalianController@hapus') }}" method="get">
          {{ csrf_field() }}
            <input type="hidden" name="search" value="{{ $d->no}}">
            <input type="hidden" name="search2" value="{{ $cari }}">
						<button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
					</form>
          @endif
          @if(Auth::user()->hak_akses==1)
          <form method="POST" action="{{ route('perwalian.update', ['perwalian'=> $d->no]) }}" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PATCH">
          {{ csrf_field() }}
          <input type="hidden" name="kode_perwalian" value="{{ $d->kode_perwalian }}">
            <input type="hidden" name="status" value="Setujui">
						<button type="submit" class="btn btn-outline-primary btn-sm">Setujui</button>
					</form>
          <form method="POST" action="{{ route('perwalian.update', ['perwalian'=> $d->no]) }}" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PATCH">
          {{ csrf_field() }}
          <input type="hidden" name="kode_perwalian" value="{{ $d->kode_perwalian }}">
            <input type="hidden" name="status" value="Tolak">
						<button type="submit" class="btn btn-outline-danger btn-sm">Tolak</button>
					</form>
          @endif
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