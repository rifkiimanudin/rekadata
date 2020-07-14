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

            <!-- Page Heading -->

            <?php $no = 0;
            foreach ($role as $r) : $no++; ?>

                <div class="row">
                    <div class="col-lg-12 padding-250 text-right text-gray-900">

                        <form action="" method="post">

                            <div class="form-group row">
                                <input type="hidden" readonly value="<?= $r['id']; ?>" name="id" class="form-control">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label text-left">Role</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>">
                                </div>
                            </div>

                            <a href="<?= base_url('admin/role') ?>" class="btn btn-danger">Kembali</a>
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