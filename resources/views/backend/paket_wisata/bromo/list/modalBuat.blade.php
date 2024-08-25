<div class="modal fade" id="buat" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="form-simpan" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Tanggal Berangkat</label>
                                <input type="datetime-local" name="departure_date" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Kuota</label>
                                <input type="number" name="quota" placeholder="Quota" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Max Kuota</label>
                                <input type="number" name="max_quota" placeholder="Max Quota" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Harga</label>
                                <input type="text" name="price" class="form-control" placeholder="Harga" id="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="">Diskon</label>
                                <input type="number" name="discount" placeholder="Discount" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
