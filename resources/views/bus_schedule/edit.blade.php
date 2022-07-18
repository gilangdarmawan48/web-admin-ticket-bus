

@extends('template.form')
@section('user', $username)
@section('aktif-bus-schedule', $active)
@section('content-form')
<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Bus Schedule Edit</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          <form action="/bus-schedule/{{ $bus_schedule->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
              <label for="largeSelect" class="col-md-2 col-form-label">Plat Nomor Bus</label>
              <div class="col-md-10">
                <select id="largeSelect" class="form-select form-select-lg" name="list_of_buses_id">
                  @foreach($list_of_buses as $list_of_bus)
                    <option value="{{ $list_of_bus->id }}">{{ $list_of_bus->plat_nomor_bus }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal</label>
                <div class="col-md-10">
                  <input class="form-control" type="date" id="html5-date-input" name="tanggal" value="{{ $bus_schedule->tanggal }}">
                </div>
              </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Asal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" placeholder="" name="asal" value="{{ $bus_schedule->asal }}"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Tujuan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" placeholder="" name="tujuan" value="{{ $bus_schedule->tujuan }}"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-phone">Tarif</label>
                <div class="col-sm-10">
                    <input
                    type="text"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    placeholder=""
                    aria-label=""
                    aria-describedby="basic-default-phone"
                    name="tarif"
                    value="{{ $bus_schedule->tarif }}"
                    />
                </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @endsection