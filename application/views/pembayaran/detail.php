<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Begin Page Content -->

    <?php
    foreach ($pelanggan as $us) : ?>

        <div class="row">
            <div class="col-lg-12 padding-250 text-right text-gray-900">
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label text-left">Nama Pelanggan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $us['nama']; ?>" required placeholder="" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label text-left">Nama Paket</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?= $us['nama_paket']; ?>" required placeholder="" disabled>
                    </div>
                </div>
            <?php endforeach; ?>

            <form action="<?= base_url('pembayaran/transaksi') ?>" method="post">

                <div class="form-group row">
                    <input type="hidden" id="id" name="id" class="form-control">
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label text-left">Tanggal</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= date('d / M / y'); ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-5 col-form-label text-left">Harga</label>
                    <?php
                    foreach ($pelanggan as $us) : ?>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="harga" name="harga" value="Rp. <?= number_format($us['harga'], 0, ',', '.'); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <a href="<?= base_url('pembayaran') ?>" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
            </div>
        </div>
        <br> <br>



        <table class="table table-bordered table-striped text-gray-900" id="example">

            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transaksi as $ts) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $ts['id_pelanggan']; ?></td>
                        <td><?= $ts['tanggal']; ?></td>
                        <td>Rp. <?= number_format($ts['harga'], 0, ',', '.'); ?></td>
                        <td><?= $ts['status']; ?></td>
                        <td>
                            <a href="<?= base_url('pembayaran/hapus/' . $ts['id']); ?>" class="badge badge-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>

        </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->