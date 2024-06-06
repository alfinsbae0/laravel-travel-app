@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Destination</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Destinasi Kota Tujuan</h4>
                            <div class="btn btn-primary" data-toggle="modal" data-target="#createModal">Create
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Jalur Pemberangkatan</th>
                                        <th>Jarak Kota Tujuan</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @foreach ($destinations as $place)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $place->origin }} <i class="fa fa-arrow-right"></i>
                                                {{ $place->destination }}</td>
                                            <td>{{ $place->distance }} KM</td>
                                            <td>
                                                <a href="#" class="btn-sm btn-secondary" data-toggle="modal"
                                                    data-target="#editModal{{ $place->id }}">Edit</a>
                                                <a href="#" class="btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal{{ $place->id }}">Delete</a>
                                            </td>
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
    @include('admin.destination.create')
    @include('admin.destination.edit')
    @include('admin.destination.delete')
@endsection
