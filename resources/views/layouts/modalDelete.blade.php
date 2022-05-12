<div class="modal-danger me-1 mb-1 d-inline-block">
    <div class="modal fade text-left" id="danger" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel120"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">
                        Hapus Perjalanan</h5>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus data perjalanan?
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <form id="deletePerjalanan" method="">
                        <button type="submit" class="btn btn-danger ml-1"
                        data-bs-dismiss="modal" id="deletePerjalanan" onclick="btnDeletePerjalanan()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>