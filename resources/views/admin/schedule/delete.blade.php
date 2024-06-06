@foreach ($schedules as $place)
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal{{ $place->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Jadwal Terpilih</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="{{ route('admin.destination.destroy', $place->id) }}"
                        style="display: inline;" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a href="" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Tidak</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
