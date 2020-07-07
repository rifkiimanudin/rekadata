<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <div align="right">
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#datapelanggan">+ Tambah Data Pelanggan</a>
            </div>

            <table class="table table-bordered table-striped text-gray-900">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pelanggan as $pl) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $pl['nama']; ?></td>
                            <td><?= $pl['nama_paket']; ?></td>
                            <td>Rp. <?= number_format($pl['harga'], 0, ',', '.'); ?></td>
                            <td><?= $pl['tanggal']; ?></td>
                            <td>

                                <div class="custom-control custom-switch">
                                    <?php if ($pl['status'] == 'aktif') : ?>
                                        <input type="checkbox" class="custom-control-input" id="<?= $pl['nama']; ?>" onclick="document.getElementById('<?= $pl['nama']; ?>').innerHTML = 'Tidak Aktif'" checked>
                                        <label class="custom-control-label" for="<?= $pl['nama']; ?>" id="<?= $pl['nama']; ?>">Aktif</label>
                                    <?php elseif ($pl['status'] == 'tidak aktif') : ?>
                                        <input type="checkbox" class="custom-control-input" id="<?= $pl['nama']; ?>" onclick="document.getElementById('<?= $pl['nama']; ?>').innerHTML = 'Aktif'">
                                        <label class="custom-control-label" for="<?= $pl['nama']; ?>" id="<?= $pl['nama']; ?>">Tidak Aktif</label>
                                        <p id="<?= $pl['nama']; ?>"></p>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#modal-edit<?= $pl['id']; ?>">edit</a>

                                <a href="<?php echo site_url('pelanggan/hapus/' . $pl['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $pl['nama']; ?> ?');" class="badge badge-danger">hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="datapelanggan" tabindex="-1" role="dialog" aria-labelledby="newdaftarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newdaftarLabel">Tambah Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pelanggan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_daftar" id="id_daftar" class="form-control">
                            <option value="">Nama Pelanggan</option>
                            <?php foreach ($daftarkan as $dfk) : ?>
                                <option value="<?= $dfk['id']; ?>"><?= $dfk['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_paket" id="id_paket" class="form-control">
                            <option value="">Pilih paket</option>
                            <?php foreach ($paketkan as $pkt) : ?>
                                <option value="<?= $pkt['id']; ?>"><?= $pkt['nama_paket']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="">Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $no = 1;
foreach ($pelanggan as $pl) : $no++; ?>
    <div id="modal-edit<?= $pl['id']; ?>" class="modal fade">
        <div class="modal-dialog">
            <form action="<?php echo site_url('pelanggan/edit'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newdaftarLabel">Edit Data Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <input type="hidden" readonly value="<?= $pl['id']; ?>" name="id" class="form-control">

                    <div class="form-group">
                        <select name="id_daftar" id="id_daftar" class="form-control" disabled>
                            <option value="<?= $pl['id']; ?>"><?= $pl['nama']; ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_paket" id="id_paket" class="form-control">
                            <option value="<?= $pl['id']; ?>"><?= $pkt['nama_paket']; ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="aktif">aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; ?>