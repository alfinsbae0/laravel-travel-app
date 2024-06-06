<div class="modal fade" tabindex="-1" role="dialog" id="createModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Destination</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.destination.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="origin">Awal Pemberangkatan</label>
                        {{-- @foreach ($destinations as $item) --}}
                        <input type="text" class="form-control" name="origin" value="Yogyakarta" readonly>
                        {{-- @endforeach --}}
                    </div>
                    <div class="form-group">
                        <label for="destination">Kota Tujuan</label>
                        <input type="text" class="form-control" name="destination" required>
                    </div>
                    <div class="form-group">
                        <label for="distance">Jarak Kota Tujuan</label>
                        <input type="text" class="form-control" name="distance" placeholder="Dalam KM" required>
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
