<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kategori</h3>
                <div class="card-tools">
                    <a href="<?= BASE ?>/kategori/add" class="btn btn-success">Add</a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kategori <?= session()->getFlashdata('ab') ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($kategori as $row) :
                        ?>
                            <tr>
                                <td><?= $row->nama_kategori ?></td>
                                <td>
                                    <a href="<?= BASE ?>/kategori/edit/<?= $row->id_kategori ?>" class="btn btn-warning">Edit</a>&nbsp;
                                    <a href="<?= BASE ?>/kategori/delete/<?= $row->id_kategori ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>