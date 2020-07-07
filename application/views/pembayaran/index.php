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

            <table class="table table-bordered table-striped text-gray-900">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Jumlah Bayar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pelanggan as $pl) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $pl['nama']; ?></td>
                            <td><?= $pl['nama_paket']; ?></td>
                            <td>Rp. <?= number_format($pl['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <!-- Default switch -->
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
                                <a href="" data-toggle="modal" data-target="#modal-edit<?= $pl['id']; ?>" class="badge badge-success">edit status</a>
                                <a href=" <?= base_url('pembayaran/detail/' . $pl['id']); ?>" class="badge badge-warning">Rincian</a>
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

<?php $no = 0;
foreach ($pelanggan as $pl) : $no++; ?>

    <div id="modal-edit<?= $pl['id']; ?>" class="modal fade">
        <div class="modal-dialog">
            <form action="<?php echo site_url('pembayaran/status'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newdaftarLabel">Edit Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" readonly value="<?= $pl['id']; ?>" name="id" class="form-control">

                        <div class="form-group">
                            <label class=" col-form-label text-left">status</label>
                            <div>
                                <select name="status" id="status" class="form-control">
                                    <option value=""><?= $pl['status'] ?></option>
                                    <option value="aktif">aktif</option>
                                    <option value="tidak aktif">tidak aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
                        </div>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; ?>

</div>
<!-- End of Main Content -->