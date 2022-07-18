@extends('template.table')

@section('user', $username)
@section('aktif-bus-list', $active)

@section('content-table')

<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Bus Lists</h5>
    <div class="card-body">
        <a href="/bus-list/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
            <tr>
                <th>Plat Nomor Bus</th>
                <th>Kelas</th>
                <th>Tempat Duduk Orang Tua</th>
                <th>Tempat Duduk Anak</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($list_of_buses as $bus)
            <tr>
                <td>{{ $bus->plat_nomor_bus }}</td>
                <td>{{ $bus->kelas }}</td>
                <td>{{ $bus->tempat_duduk_orang_tua }}</td>
                <td>{{ $bus->tempat_duduk_anak }}</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <form action="/bus-list/{{ $bus->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="dropdown-item" href="/bus-list/{{ $bus->id }}/edit"><i class="bx bx-edit-alt me-1"></i> Edit</a>
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