<table>
    <thead>
        <tr>

        </tr>
    </thead>
</table>


<table id="tabel1" class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Jumlah halaman</th>
            <th>Kode Pengarang</th>
            <th>Kode Penerbit</th>
            <th class="center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($buku as $b) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b['ISBN'] ?></td>
                <td><?= $b['judul'] ?></td>
                <td><?= $b['jumlah_halaman'] ?></td>
                <td><?= $b['nama_pengarang'] ?></td>
                <td><?= $b['nama_penerbit'] ?></td>
                <td>
                    <a href="javascript:;" data-toggle="modal" data-target="#tambahmodal" class="btn btn-warning" onClick="show(<?= $b['ISBN'] ?>)">Edit</a>
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#delete-modal-<?= $b['ISBN'] ?>" class="btn btn-danger">Delete</a>
                    <!-- BEGIN: Modal Content -->
                    <div id="delete-modal-<?= $b['ISBN'] ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                        <div class="text-3xl">Are you sure?</div>
                                        <div class="text-gray-600 mt-2">Do you really want to delete these
                                            records? <br>This
                                            process cannot
                                            be undone.</div>
                                    </div>
                                    <div class="px-5 pb-8 text-center"> <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1 button-close">Cancel</button>
                                        <button type="button" class="btn btn-danger w-24" onClick="destroy(<?= $b['ISBN'] ?>)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- END: Modal Content -->
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#tabel1').DataTable();
    });
</script>