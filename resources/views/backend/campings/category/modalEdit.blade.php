<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori Camping</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="edit-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="edit_id" class="form-control" id="edit_id">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="">Nama Kategori</label>
                            <input type="text" name="edit_nama_kategori" placeholder="Nama Kategori" class="form-control" id="edit_nama_kategori">
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="edit_status" class="form-control" id="edit_status">
                                <option value="">-- Pilih Status --</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
