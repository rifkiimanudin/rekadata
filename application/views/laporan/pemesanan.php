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

            <table class="table table-bordered table-striped text-gray-900" id="pelanggan">
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