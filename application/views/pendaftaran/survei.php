<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- <div class="card mb-3">
        <img src="<?= base_url('assets/img/form.jpeg') ?>" class="card-img-top">
    </div> -->

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- Page Heading -->

            <?php $no = 1;
            foreach ($pendaftar as $df) : $no++; ?>

                <div class="row">
                    <div class="col-lg-12 padding-250 text-right text-gray-900">

                        <form action="" method="post">

                            <div class="form-group row">
                                <input type="hidden" id="id" name="id" class="form-control">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">No KTP</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="ktp" name="ktp" value="<?= $df['ktp']; ?>" disabled>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-sm-5 col-form-label text-left">Nama Lengkap</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $df['nama']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">Tempat Tanggal Lahir</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $df['ttl']; ?>" disabled>
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label class="col-sm-5 col-form-label text-left">No Hp</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?= $df['telp']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">Alamat</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" disabled><?= $df['alamat']; ?> <?= $df['kec']; ?>  <?= $df['kota']; ?> <?= $df['prov']; ?></textarea>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">Tidak Disetujui</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="alasan" placeholder="Alasan tidak disetujui" name="alasan" value="<?= $df['alasan']; ?>">
                                </div>
                            </div>

                            <a href="<?= base_url('pendaftaran') ?>" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Submit</button><br>
                            <hr>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">Disetujui Pemasangan</label>
                                <div class="col-sm-7">
                                    <a href="<?= base_url('pendaftaran/verifikasi/' . $df['id'])  ?>" class="btn btn-success">verifikasi pendaftaran</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>