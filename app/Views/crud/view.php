<?= $this->extend('layouts/base_layout') ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="d-flex justify-content-center">
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#tambahmodal" onClick="create()">Create Data</button>
    </div><br>
    <div class="d-flex justify-content-center">
        <div class="row">
            <div id="pagetable">
                <!-- <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Kode Pengarang</th>
                    <th>Kode Penerbit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($buku as $b) { ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <th><?= $b['ISBN'] ?></th>
                        <th><?= $b['judul'] ?></th>
                        <th><?= $b['kode_pengarang'] ?></th>
                        <th><?= $b['kode_penerbit'] ?></th>
                    </tr>
                <?php } ?>
            </tbody>
        </table> -->
            </div>
        </div>
    </div>

    <!-- modal -->


    <!-- Modal -->
    <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="pagemodal">
                    <!-- modal disini -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- script js -->
<script>
    $(document).ready(function() {
        showtable();
    });

    //untuk show modal create
    function create() {
        console.log('fungsi');
        $.get("<?php echo base_url('create') ?>", {}, function(data, status) {
            $("#pagemodal").html(data)
            $("#tambahmodal").modal('show')
        })
    }

    //untuk proses create data
    function store() {
        console.log('klik proses')
        var isbn = $("#isbn").val();
        var judul = $("#judul").val();
        var hal = $("#hal").val();
        var pengarang = $("#pengarang").val();
        var penerbit = $("#penerbit").val();
        console.log(isbn)
        $.ajax({
            url: "<?php echo base_url('ajax') ?>",
            type: 'POST',
            dataType: 'JSON',
            data: {
                "isbn": isbn,
                "judul": judul,
                "hal": hal,
                "pengarang": pengarang,
                "penerbit": penerbit,
            },
            success: function(x) {
                console.log(x)
                if (x.sukses == true) {
                    console.log('suksestrue')
                    $("#close").click()
                    showtable()
                    $("#pagemodal").html('')
                }
                else if(x.sukses == false) {
                    alert('ISBN Sudah ada!')
                }
            }
        });
    }

    // aksi update
    function update(id) {
        console.log('klik proses')
        console.log(id)
        var isbn = $("#isbn").val();
        var judul = $("#judul").val();
        var hal = $("#hal").val();
        var pengarang = $("#pengarang").val();
        var penerbit = $("#penerbit").val();
        $.ajax({
            url: "<?php echo base_url('update') ?>",
            type: 'POST',
            dataType: 'JSON',
            data: {
                "isbn": isbn,
                "judul": judul,
                "hal": hal,
                "pengarang": pengarang,
                "penerbit": penerbit,
            },
            success: function(x) {
                console.log(x)
                if (x.sukses == true) {
                    console.log('suksestrue')
                    $("#close").click()
                    showtable()
                    $("#pagemodal").html('')
                }
            }
        });
    }
    //untuk menampilkan data pada tabel
    function showtable() {
        $.get("<?php echo base_url('showtable') ?>", {}, function(data, status) {
            $("#pagetable").html(data)
        })
    }

    //untuk menampilkan data untuk edit
    function show(id) {
        console.log(id)
        $.get("<?php echo base_url('home/show') ?>/" + id, {}, function(data, status) {
            $("#pagemodal").html(data)
            $("#tambahmodal").modal('show')
            $(".title").html('Edit data buku')
        })
    }

    //hapus data
    function destroy(id) {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url('/home/destroy') ?>/" + id,
            success: function(data) {
                $(".button-close").click()
                showtable()
            }
        });
    }
</script>
<?= $this->endSection() ?>