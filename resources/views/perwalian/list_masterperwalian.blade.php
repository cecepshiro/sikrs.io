@extends('layouts.header')

@section('content')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Daftar Master Perwalian</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Master Perwalian
          <i class="fa fa-file-text-o"></i><a href="{{ route('master.create') }}" class="text-success"> Tambah Data</a>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
					<th>Kode Perwalian</th>
					<th>Wali Dosen</th>
					<th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
					<th>Kode Perwalian</th>
					<th>Wali Dosen</th>
					<th>Aksi</th>
                </tr>
              </tfoot>
			  @forelse($data as $d)
        <?php
          $tmp = DB::table('data_wali_mhsw')->select('nid')->where('kode_wali', $d->kode_wali)->value('nid');
          $tmp2 = DB::table('data_dosen')->select('nama_dosen')->where('nid', $tmp)->value('nama_dosen');
        ?>
              <tbody>
                <tr>
				<td>{{ $d->kode_perwalian}}</td>
				<td>{{ $tmp2 }}</td>
				<td align="center">
					<!-- <form action="{{ route('fakultas.destroy', ['fakultas'=>$d->kode_fk]) }}" method="post">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<a href="{{ route('fakultas.show', ['fakultas'=>$d->kode_fk]) }}" class="btn btn-outline-success btn-sm">Detail</a>
						<a href="{{ route('fakultas.edit', ['fakultas'=>$d->kode_fk]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
          </form> -->
          @if(Auth::user()->hak_akses==0)
          <form action="{{ route('master.destroy', ['master'=>$d->kode_perwalian]) }}" method="post">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a href="{{ route('master.edit', ['master'=>$d->kode_perwalian]) }}" class="btn btn-outline-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
					</form>
          @endif
          @if(Auth::user()->hak_akses==2 || Auth::user()->hak_akses==1 )
          <form action='{{action("PerwalianController@tambahPerwalian") }}' method='get'>
          {{ csrf_field() }}
          <input type="hidden" name="search" value="{{ $d->kode_perwalian}}">
          <button type="submit" class="btn btn-outline-success btn-sm">Perwalian</button>
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