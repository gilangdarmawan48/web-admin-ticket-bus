@extends('template.form')

@section('user', $username)
@section('aktif-bus-booking', $active)

@section('content-form')
<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Bus Booking Edit</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
            <form action="/bus-booking/{{ $booking_bus->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="largeSelect" class="col-md-2 col-form-label">Jadwal Bus</label>
                    <div class="col-md-10">
                      <select id="largeSelect" class="form-select form-select-lg" name="bus_schedule_id">
                        @foreach($bus_schedules as $bus_schedule)
                            <option value="{{ $bus_schedule->id }}">
                                {{ $bus_schedule->tanggal  }} |
                                {{ $bus_schedule->asal }} To
                                {{ $bus_schedule->tujuan }} |
                                {{ $bus_schedule->tarif }}
                            </option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nama orang tua</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="" name="nama_orang_tua" value="{{ $booking_bus->nama_orang_tua }}"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Umur Orang Tua</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="" name="umur_orang_tua" value="{{ $booking_bus->umur_orang_tua }}"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Jenis Kelamin Orang Tua</label>
                    <div class="col-sm-10">
                      <input name="jenis_kelamin_orang_tua" class="form-check-input" type="radio" value="Laki - Laki" id="defaultRadio1">
                      <label class="form-check-label" for="defaultRadio1"> Laki - Laki </label>
                      <p>   </p>
                      <input name="jenis_kelamin_orang_tua" class="form-check-input" type="radio" value="Perempuan" id="defaultRadio2">
                      <label class="form-check-label" for="defaultRadio2"> Perempuan </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Anak</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="" name="nama_anak" value="{{ $booking_bus->nama_anak }}"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Umur Anak</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="" name="umur_anak" value="{{ $booking_bus->umur_anak }}"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Jenis Kelamin Anak</label>
                    <div class="col-sm-10">
                      <input name="jenis_kelamin_anak" class="form-check-input" type="radio" value="Laki - Laki" id="defaultRadio1">
                      <label class="form-check-label" for="defaultRadio1"> Laki - Laki </label>
                      <p>   </p>
                      <input name="jenis_kelamin_anak" class="form-check-input" type="radio" value="Perempuan" id="defaultRadio2">
                      <label class="form-check-label" for="defaultRadio2"> Perempuan </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                        <input
                            type="text"
                            id="basic-default-email"
                            class="form-control"
                            placeholder=""
                            aria-label="john.doe"
                            aria-describedby="basic-default-email2"
                            name="email"
                            value="{{ $booking_bus->email }}"
                        />
                        <span class="input-group-text" id="basic-default-email2">@example.com</span>
                        </div>
                        <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input
                        type="number"
                        id="basic-default-phone"
                        class="form-control phone-mask"
                        placeholder=""
                        aria-label=""
                        aria-describedby="basic-default-phone"
                        name="nomor_telepon"
                        value="{{ $booking_bus->nomor_telepon }}"
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