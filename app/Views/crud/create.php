<form id="form">
    <?php csrf_field() ?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">ISBN :</label>
            <input type="text" class="form-control" name="isbn" id="isbn" required oninvalid="this.setCustomValidity('ISBN wajib diisi')" oninput="this.setCustomValidity('')">
        </div>
        <div class=" mb-3">
            <label for="recipient-name" class="col-form-label">Judul :</label>
            <input type="text" class="form-control" name="judul" id="judul" required oninvalid="this.setCustomValidity('Judul wajib diisi')" oninput="this.setCustomValidity('')">
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Jumlah halaman :</label>
            <input type="text" class="form-control" name="hal" id="hal" required oninvalid="this.setCustomValidity('Jumlah halaman wajib diisi')" oninput="this.setCustomValidity('')">
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Pengarang :</label>
            <select class="form-control" name="pengarang" id="pengarang">
                <option selected value="">Pilih pengarang ---</option>
                <?php foreach ($pengarang as $p) { ?>
                    <option value="<?= $p['kode_pengarang'] ?>"><?= $p['nama_pengarang'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Penerbit :</label>
            <select class="form-control" name="penerbit" id="penerbit">
                <option selected value="">Pilih penerbit ---</option>
                <?php foreach ($penerbit as $p) { ?>
                    <option value="<?= $p['kode_penerbit'] ?>"><?= $p['nama_penerbit'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="store()">Simpan</button>
    </div>
</form>