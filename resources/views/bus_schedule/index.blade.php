@extends('template.table')

@section('user', $username)
@section('aktif-bus-schedule', $active)
@section('content-table')

<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Bus Schedules</h5>
    <div class="card-body">
        <a href="/bus-schedule/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
            <tr>
                <th>Plat Nomor Bus</th>
                <th>Tanggal</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Tarif</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($bus_schedules as $bus_schedule)
            <tr>
                <td>{{ $bus_schedule->plat_nomor_bus }}</td>
                <td>{{ $bus_schedule->tanggal }}</td>
                <td>{{ $bus_schedule->asal }}</td>
                <td>{{ $bus_schedule->tujuan }}</td>
                <td>{{ $bus_schedule->tarif }}</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <form action="/bus-schedule/{{ $bus_schedule->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="dropdown-item" href="/bus-schedule/{{ $bus_schedule->id }}/edit"><i class="bx bx-edit-alt me-1"></i> Edit</a>
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