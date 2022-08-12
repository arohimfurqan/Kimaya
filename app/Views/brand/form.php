<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Brand</h3>
                <div class="card-tools">
                    <a href="<?= BASE ?>/brand/" class="btn btn-warning">Back</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $field => $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <?php if (!empty($berhasil)) : ?>
                    <div class="alert alert-success">

                        <p><?= $berhasil ?></p>

                    </div>
                <?php endif ?>

                <?php
                if (@$update) { ?>


                    <form action="<?= BASE ?>/brand/edit/<?= $update ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="nama_brand">Nama Brand</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_brand" value="<?= $model->nama_brand ?>">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>

                    </form>
                <?php  } else {


                ?>
                    <form action="<?= BASE ?>/brand/add" method="POST">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="nama_brand">Nama Brand</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_brand">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>

                    </form>
                <?php } ?>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>