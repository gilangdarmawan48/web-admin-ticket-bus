@extends('template.table')

@section('user', $username)
@section('aktif-bus-booking', $active)


@section('content-table')

<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Booking Bus List</h5>
    <div class="card-body">
        <a href="/bus-booking/create" class="btn btn-primary">Tambah Data</a>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
            @endif
            
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
            @endif
            
            @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
            @endif
            
            @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
            @endif
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                Please check the form below for errors
            </div>
            @endif
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
            <tr>
                <th>Jadwal id</th>
                <th>Tanggal</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Tarif</th>

                <th>Nama Orang Tua</th>
                <th>Umur Orang Tua</th>
                <th>Jenis Kelamin Orang Tua</th>
                <th>Nama Anak</th>
                <th>Umur Anak</th>
                <th>Jenis Kelamin Anak</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($booking_buses as $booking_buse)
            <tr>
                <td>{{ $booking_buse->bus_schedule_id }}</td>
                <td>{{ $booking_buse->tanggal }}</td>
                <td>{{ $booking_buse->asal }}</td>
                <td>{{ $booking_buse->tujuan }}</td>
                @if($booking_buse->nama_anak != null)
                <td>{{ $booking_buse->tarif * 2 }}</td>
                @else
                <td>{{ $booking_buse->tarif }}</td>
                @endif
                <td>{{ $booking_buse->nama_orang_tua }}</td>
                <td>{{ $booking_buse->umur_orang_tua }}</td>
                <td>{{ $booking_buse->jenis_kelamin_orang_tua }}</td>

                <td>{{ $booking_buse->nama_anak }}</td>
                <td>{{ $booking_buse->umur_anak }}</td>
                <td>{{ $booking_buse->jenis_kelamin_anak }}</td>

                <td>{{ $booking_buse->email }}</td>
                <td>{{ $booking_buse->nomor_telepon }}</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <form action="/bus-booking/{{ $booking_buse->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="dropdown-item" href="/bus-booking/{{ $booking_buse->id }}/edit"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->

  @endsection