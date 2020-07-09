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
            foreach ($pelanggan as $pl) : $no++; ?>

                <div class="row">
                    <div class="col-lg-12 padding-250 text-right text-gray-900" id="ok">

                        <form action="<?= base_url('pelanggan/edit') ?>" method="post">

                            <div class="form-group row">
                                <input type="hidden" id="id" name="id" class="form-control">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">Nama Pelanggan</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $pl['nama']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">Paket</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?= $pl['nama_paket']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">Harga</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $pl['harga']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">status</label>
                                <div class="col-sm-7">
                                    <select name="status" id="status" class="form-control">
                                        <option value="aktif">aktif</option>
                                        <option value="tidak aktif">tidak aktif</option>
                                    </select>
                                </div>
                            </div>
                            <a href="<?= base_url('pelanggan') ?>" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
</div>