<?= $this->extend('layouts/base_layout') ?>
<?= $this->section('content') ?>

<center>
    <h1>Pertemuan 1</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>
</center>
<br />
<br />

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama :</label>
                        <input type="text" class="form-control" name="nama" id="isbn" required oninvalid="this.setCustomValidity('Nama wajib diisi')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Pengarang :</label>
                        <select class="form-control" name="pengarang" id="pengarang">
                            <option selected value="">option 1</option>
                            <option value="">option 2</option>
                            <option value="">option 3</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <table id="myTable" class="table table-striped table-bordered data">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td>Andi</td>
                <td>Jakarta</td>
                <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Alfin</td>
                <td>Surabaya</td>
                <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Rizal</td>
                <td>Surabaya</td>
                <td>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>


<?= $this->endSection() ?>