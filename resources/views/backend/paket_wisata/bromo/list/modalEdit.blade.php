<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="edit-simpan" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Tanggal Berangkat</label>
                                <input type="datetime-local" name="edit_departure_date" class="form-control" id="edit_departure_date">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Kuota</label>
                                <input type="number" name="edit_quota" placeholder="Quota" class="form-control" id="edit_quota">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Max Kuota</label>
                                <input type="number" name="edit_max_quota" placeholder="Max Quota" class="form-control" id="edit_max_quota">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Harga</label>
                                <input type="text" name="edit_price" class="form-control" placeholder="Harga" id="edit_price">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Diskon</label>
                                <input type="number" name="edit_discount" placeholder="Discount" class="form-control" id="edit_discount">
                            </div>
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
