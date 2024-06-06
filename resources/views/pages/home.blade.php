@extends('layouts.master')

@section('content')
    <div class="my-3">
        <h4>Jadwal Keberangkatan</h4>
    </div>
    <div class="row mt-5">
        @foreach ($schedules as $schedule)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rute Perjalanan : </h5>
                        <p class="card-text">{{ $schedule->destination->origin }} <i class="fa fa-arrow-right"></i>
                            {{ $schedule->destination->destination }}</p>
                        <div class="d-flex align-items-center">
                            <p class="mb-2"><i class="fa fa-clock"></i>
                                {{ date('H:i', strtotime($schedule->departure_time)) }} WIB</p>
                            <p class="mb-2 ml-3"><i class="fa fa-clock" style="color: red"></i>
                                {{ date('H:i', strtotime($schedule->arrival_time)) }} WIB</p>
                        </div>
                        <div class="mt-3">
                            <p>Harga Tiket : Rp. {{ $schedule->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
