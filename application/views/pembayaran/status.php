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
        </div>
    </div>
    <?php $no = 0;
    foreach ($pelanggan as $pl) : $no++; ?>


        <form action="" method="post">


            <input type="hidden" readonly value="<?= $pl['id']; ?>" name="id" class="form-control">

            <div class="form-group">
                <label class=" col-form-label text-left">status</label>
                <div>
                    <select name="status" id="status" class="form-control">
                        <option value=""><?= $pl['status']; ?></option>
                        <option value="aktif">aktif</option>
                        <option value="tidak aktif">tidak aktif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('pembayaran') ?>" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>


    <?php endforeach; ?>
</div>
</div>
<!-- /.container-fluid -->