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
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Konfirmasi Pengguna</th>
                    </tr>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengguna as $pg) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $pg['name']; ?></td>
                            <td><?= $pg['email']; ?></td>
                            <td><?php
                                if ($pg['role_id'] == 1) {
                                    echo "Administrator";
                                } else if ($pg['role_id'] == 2) {
                                    echo "Sales";
                                } else {
                                    echo "Kasir";
                                } ?></td>
                            <td>
                                <a href="<?= base_url('verifikasi/verifikasi_pg/' . $pg['id'])  ?>" class="badge badge-success">Konfirmasi Pengguna</a>

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