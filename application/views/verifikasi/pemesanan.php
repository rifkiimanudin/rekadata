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
                        <th scope="col">KTP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Biaya Pemasangan</th>
                        <th scope="col">Konfirmasi Pemesanan</th>
                    </tr>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pendaftar as $df) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $df['ktp']; ?></td>
                            <td><?= $df['nama']; ?></td>
                            <td><?= $df['telp']; ?></td>
                            <td><?= $df['email']; ?></td>
                            <td><?= $df['alamat']; ?>
                                <?= $df['kec']; ?>
                                <?= $df['kota']; ?>
                                <?= $df['prov']; ?></td>
                            <td>
                                <a href="<?= base_url('verifikasi/pasang/' . $df['id']); ?>" target="_blank" class="badge badge-warning">cetak biaya pasang</a>
                            </td>
                            <td>
                                <a href="<?= base_url('verifikasi/verifikasi_pm/' . $df['id'])  ?>" class="badge badge-success">Konfirmasi Pemesanan</a>
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