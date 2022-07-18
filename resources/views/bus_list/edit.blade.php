
@extends('template.form')
@section('user', $username)
@section('aktif-bus-list', $active)
@section('content-form')
<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Bus List Edit</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          <form action="/bus-list/{{ $bus->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Plat Nomor Bus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" placeholder="" name="plat_nomor_bus" value="{{ $bus->plat_nomor_bus }}"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" placeholder="" name="kelas" value="{{ $bus->kelas }}"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-phone">Tempat Duduk Orang Tua</label>
                <div class="col-sm-10">
                    <input
                    type="number"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    placeholder=""
                    aria-label=""
                    aria-describedby="basic-default-phone"
                    name="tempat_duduk_orang_tua"
                    value="{{ $bus->tempat_duduk_orang_tua }}"
                    />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-phone">Tempat Duduk Anak</label>
                <div class="col-sm-10">
                    <input
                    type="number"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    placeholder=""
                    aria-label=""
                    aria-describedby="basic-default-phone"
                    name="tempat_duduk_anak"
                    value="{{ $bus->tempat_duduk_anak }}"
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