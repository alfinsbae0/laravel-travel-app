@foreach ($schedules as $place)
    <div class="modal fade" tabindex="-1" role="dialog" id="editModal{{ $place->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.schedule.update', $place->id) }}" method="POST"
                        enctype="multipart/form-data" id="editPlace{{ $place->id }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="destination_id">Jalur Pemberangkatan</label>
                            <select class="form-control" name="destination_id" @readonly(true)>
                                <option value="{{ $place->destination->id }}" @readonly(true)>
                                    {{ $place->destination->origin }} --
                                    {{ $place->destination->destination }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departure_time">Jam Pemberangkatan</label>
                            <input type="time" class="form-control" name="departure_time" required
                                value="{{ $place->departure_time }}">
                        </div>
                        <div class="form-group">
                            <label for="arrival_time">Jam Sampai</label>
                            <input type="time" class="form-control" name="arrival_time" placeholder="Dalam KM"
                                required value="{{ $place->arrival_time }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga Tiket</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input type="number" class="form-control" name="price" required
                                    value="{{ $place->price }}">
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
