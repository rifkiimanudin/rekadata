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
                <a href="<?= base_url('pendaftaran/form') ?>" class="btn btn-primary mb-3 ">+ Tambah Data Pendaftaran</a>
            </div>

            <table class="table table-bordered table-striped text-gray-900" id="pendaftaran">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">KTP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat, Tanggal Lahir</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Survei</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pendaftar as $df) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $df['ktp']; ?></td>
                            <td><?= $df['nama']; ?></td>
                            <td><?= $df['ttl']; ?></td>
                            <td><?= $df['telp']; ?></td>
                            <td><?= $df['email']; ?></td>
                            <td><?= $df['alamat']; ?>
                                <?= $df['kec']; ?>
                                <?= $df['kota']; ?>
                                <?= $df['prov']; ?></td>
                            <td>
                                <a href="<?= base_url('pendaftaran/survei/' . $df['id']); ?>" class="badge badge-warning">survei</a>
                            </td>
                            <td><?= $df['alasan']; ?></td>
                            <td>
                                <a href="<?= base_url('pendaftaran/edit/' . $df['id']); ?>" class="badge badge-success">edit</a>
                                <a href="<?php echo site_url('pendaftaran/hapus/' . $df['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $df['nama']; ?> ?');" class="badge badge-danger">hapus</a>
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