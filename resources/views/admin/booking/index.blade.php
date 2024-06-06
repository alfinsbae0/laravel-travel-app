@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Booking</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Pemesanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Jalur Tujuan</th>
                                        <th>Status</th>
                                        <th>Jam Pemberangkatan</th>
                                        <th>Qty</th>
                                        <th>Harga Tiket</th>
                                        <th>Total Harga</th>
                                    </tr>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @foreach ($data as $place)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $place->user->name }}</td>
                                            <td>{{ $place->schedule->destination->origin }} <i
                                                    class="fa fa-arrow-right"></i>
                                                {{ $place->schedule->destination->destination }}
                                            </td>
                                            <td>
                                                @if ($place->status == 'pending')
                                                    <span class="badge bg-warning text-white">{{ $place->status }}</span>
                                                @elseif ($place->status == 'confirmed')
                                                    <span class="badge bg-success text-white">{{ $place->status }}</span>
                                                @else
                                                    <span class="badge bg-danger text-white">{{ $place->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $place->booking_date }} </td>
                                            <td>{{ $place->qty }} </td>
                                            <td>Rp. {{ $place->schedule->price }}</td>
                                            <td>Rp. {{ $place->schedule->price * $place->qty }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
