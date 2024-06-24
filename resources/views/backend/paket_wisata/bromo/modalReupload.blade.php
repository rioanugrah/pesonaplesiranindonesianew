<div class="modal fade" id="reupload_paket" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Re-upload Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form method="post" id="reupload-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="reupload_id" id="reupload_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama Paket</label>
                        <input type="text" name="reupload_title" class="form-control" id="reupload_title">
                        {{-- <div id="reupload_title"></div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="">Meeting Point</label>
                        <input type="text" name="reupload_meeting_point" class="form-control" id="reupload_meeting_point">
                    </div>
                    <div class="mb-3">
                        <label for="">Kategori Trip</label>
                        <select name="reupload_category_trip" class="form-control" id="reupload_category_trip">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Private">Private</option>
                            <option value="Publik">Open Trip</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Dibuka</label>
                        <input type="datetime-local" name="reupload_tanggal" class="form-control" id="reupload_tanggal">
                    </div>
                    <div class="mb-3">
                        <label for="">Kuota</label>
                        <input type="text" name="reupload_quota" class="form-control" id="reupload_quota">
                    </div>
                    <div class="mb-3">
                        <label for="">Max Kuota</label>
                        <input type="text" name="reupload_max_quota" class="form-control" id="reupload_max_quota">
                    </div>
                    <div class="mb-3">
                        <label for="">Harga</label>
                        <input type="text" name="reupload_price" class="form-control" id="reupload_price">
                    </div>
                    <div class="mb-3">
                        <label for="">Diskon</label>
                        <input type="text" name="reupload_discount" class="form-control" id="reupload_discount">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
