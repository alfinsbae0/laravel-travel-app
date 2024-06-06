@foreach ($destinations as $place)
    <div class="modal fade" tabindex="-1" role="dialog" id="editModal{{ $place->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Destination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.destination.update', $place->id) }}" method="POST"
                        enctype="multipart/form-data" id="editPlace{{ $place->id }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="origin">Awal Pemberangkatan</label>
                            <input type="text" class="form-control" name="origin" readonly
                                value="{{ $place->origin }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Kota Tujuan</label>
                            <input type="text" class="form-control" name="destination" required
                                value="{{ $place->destination }}">
                        </div>
                        <div class="form-group">
                            <label for="distance">Jarak Kota Tujuan</label>
                            <input type="text" class="form-control" name="distance" required
                                value="{{ $place->distance }} KM">
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
