@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <p>Pesan sekarang untuk menikmati perjalanan yang menyenangkan</p>
                    </div>
                </div>
                <img src="https://images.unsplash.com/photo-1586319826484-b7f386bf3e72?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Gambar Destinasi Wisata" class="img-fluid">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('user.booking.post') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4 class="text-dark">Booking Perjalanan</h4>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" required
                                    readonly>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Rute</label>
                                    <select name="schedule_id" class="form-control" id="destinationSelect">
                                        <option value=""> Select Schedule </option>
                                        @foreach ($schedules as $place)
                                            <option value="{{ $place->id }}" data-price="{{ $place->price }}">
                                                {{ $place->destination->origin }} --
                                                {{ $place->destination->destination }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Harga Tiket</label>
                                    <input type="text" class="form-control" name="price" id="ticketPrice" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inlineFormInputName2">Tanggal Booking</label>
                                    <input type="date" class="form-control" name="booking_date">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jumlah Tiket</label>
                                    <input type="number" class="form-control" name="qty">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tangkap perubahan pada select untuk destinasi
            document.getElementById('destinationSelect').addEventListener('change', function() {
                // Ambil harga destinasi yang dipilih
                var selectedDestination = this.options[this.selectedIndex];
                var price = selectedDestination.getAttribute('data-price');
                // Perbarui nilai input harga tiket
                document.getElementById('ticketPrice').value = 'Rp. ' + price;
            });
        });
    </script>
@endsection
