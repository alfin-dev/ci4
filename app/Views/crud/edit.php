            <form id="form">
                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">ISBN :</label>
                        <input type="text" class="form-control" name="isbn" id="isbn" value="<?= $buku->ISBN ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Judul :</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="<?= $buku->judul ?>">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Jumlah halaman :</label>
                        <input type="text" class="form-control" name="hal" id="hal" value="<?= $buku->jumlah_halaman ?>">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Pengarang :</label>
                        <select class="form-control" name="pengarang" id="pengarang">
                            <?php foreach ($pengarang as $p) { ?>
                                <?php if ($p['kode_pengarang'] == $buku->kode_pengarang) { ?>
                                    <option value="<?= $p['kode_pengarang'] ?>" selected><?= $p['nama_pengarang'] ?></option>
                                <?php } else { ?>
                                    <option value="<?= $p['kode_pengarang'] ?>"><?= $p['nama_pengarang'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Penerbit :</label>
                        <select class="form-control" name="penerbit" id="penerbit">
                            <?php foreach ($penerbit as $p) { ?>
                                <?php if ($p['kode_penerbit'] == $buku->kode_penerbit) { ?>
                                    <option value="<?= $p['kode_penerbit'] ?>" selected><?= $p['nama_penerbit'] ?></option>
                                <?php } else { ?>
                                    <option value="<?= $p['kode_penerbit'] ?>"><?= $p['nama_penerbit'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onClick="update(<?= $buku->ISBN ?>)">Simpan</button>
            </div>