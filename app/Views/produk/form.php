<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Produk</h3>
                <div class="card-tools">
                    <a href="<?= BASE ?>/produk/" class="btn btn-warning">Back</a>
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

                    <form action="<?= BASE ?>/produk/edit/<?= $model->id_produk ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="nama_produk">Nama Produk</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_produk" value="<?= $model->nama_produk ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="qty">Qty</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="qty" value="<?= $model->qty ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="harga">Harga</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="harga" value="<?= $model->harga ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="brand">Brand</label>
                                <div class="form-group">
                                    <select class="form-control select2bs4" style="width: 100%;" name="brand">
                                        <option value="">--PILIH--</option>
                                        <?php
                                        $db = \Config\Database::connect();
                                        $query = $db->query("SELECT * FROM brand")->getResult();
                                        foreach ($query as $br) : ?>
                                            <option value="<?= $br->id_brand ?>" <?= $model->brand_id == $br->id_brand ?  'selected' : '' ?>><?= $br->nama_brand ?></option>

                                        <?php endforeach
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="kategori">Kategori</label>
                                <div class="form-group">
                                    <select class="form-control select2bs4" style="width: 100%;" name="kategori">
                                        <option value="">--PILIH--</option>
                                        <?php
                                        // $db = \Config\Database::connect();
                                        $query2 = $db->query("SELECT * FROM kategori")->getResult();
                                        foreach ($query2 as $kt) : ?>
                                            <option value="<?= $kt->id_kategori ?>" <?= $model->kategori_id == $kt->id_kategori ?  'selected' : '' ?>><?= $kt->nama_kategori ?></option>

                                        <?php endforeach
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="foto_produk">Foto Utama</label>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_produk" class="form-control" id="exampleInputFile" accept="image/*">
                                        <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                                    </div>
                                </div>
                                <?php if ($model->foto_produk) { ?>
                                    <div class="col-md-4">
                                        <img src="<?= BASE ?>/uploads/<?= $model->foto_produk ?>" height="150px">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="foto_lainnya">Foto Lainnya</label>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_lainnya[]" id="formFileMultiple" class="form-control" accept="image/*" multiple>
                                        <!-- <label class="custom-file-label" for="formFileMultiple">Choose file</label> -->
                                    </div>
                                    <span style="color: red;">Foto Lainnya Maksimal 3 Foto</span>
                                </div>
                                <div class="row">
                                    <?php
                                    $db      = \Config\Database::connect();
                                    $lain = $db->table('foto_lain_produk')->where('produk_id', $model->id_produk)->get();
                                    if ($lain) {
                                        foreach ($lain->getResult() as $ft) {
                                    ?>
                                            <div class="col-md-4">
                                                <img src="<?= BASE ?>/uploads/<?= $ft->foto_lain ?>" height="150px" width="100%">
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="status">Status</label>
                                <div class="form-group">

                                    <select name="status" id="" class="form-control">
                                        <option value="">--PILIH--</option>
                                        <option value="Aktif" <?= $model->status_produk == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?= $model->status_produk == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 col-sm-12">
                                <label for="status">Deskripsi</label>
                                <div class="form-group">

                                    <textarea name="deskripsi" id="summernote2" class="form-control"><?= $model->deskripsi ?></textarea>
                                    <!-- <label class="custom-file-label" for="formFileMultiple">Choose file</label> -->
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>

                    </form>
                <?php  } else {


                ?>
                    <form action="<?= BASE ?>/produk/add" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="nama_produk">Nama Produk</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_produk">
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="qty">Qty</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="qty">
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="harga">Harga</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="harga">
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="brand">Brand</label>
                                <div class="form-group">
                                    <select class="form-control select2bs4" style="width: 100%;" name="brand">
                                        <option value="">--PILIH--</option>
                                        <?php
                                        $db = \Config\Database::connect();
                                        $query = $db->query("SELECT * FROM brand")->getResult();
                                        foreach ($query as $br) : ?>
                                            <option value="<?= $br->id_brand ?>"><?= $br->nama_brand ?></option>

                                        <?php endforeach
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="kategori">Kategori</label>
                                <div class="form-group">
                                    <select class="form-control select2bs4" style="width: 100%;" name="kategori">
                                        <option value="">--PILIH--</option>
                                        <?php
                                        // $db = \Config\Database::connect();
                                        $query2 = $db->query("SELECT * FROM kategori")->getResult();
                                        foreach ($query2 as $kt) : ?>
                                            <option value="<?= $kt->id_kategori ?>"><?= $kt->nama_kategori ?></option>

                                        <?php endforeach
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="foto_produk">Foto Utama</label>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_produk" class="form-control" id="exampleInputFile" accept="image/*">
                                        <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="foto_lainnya">Foto Lainnya</label>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_lainnya[]" id="formFileMultiple" class="form-control" accept="image/*" multiple>
                                        <!-- <label class="custom-file-label" for="formFileMultiple">Choose file</label> -->
                                    </div>
                                    <span style="color: red;">Foto Lainnya Maksimal 3 Foto</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 col-sm-4">
                                <label for="status">Status</label>
                                <div class="form-group">

                                    <select name="status" id="" class="form-control">
                                        <option value="">--PILIH--</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 col-sm-12">
                                <label for="status">Deskripsi</label>
                                <div class="form-group">

                                    <textarea name="deskripsi" id="summernote" class="form-control"></textarea>
                                    <!-- <label class="custom-file-label" for="formFileMultiple">Choose file</label> -->


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