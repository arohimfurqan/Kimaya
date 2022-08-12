<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Brand</h3>
                <div class="card-tools">
                    <a href="<?= BASE ?>/brand/add" class="btn btn-success">Add</a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Brand</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($brand as $row) :
                        ?>
                            <tr>
                                <td><?= $row->nama_brand ?></td>
                                <td>
                                    <a href="<?= BASE ?>/brand/edit/<?= $row->id_brand ?>" class="btn btn-warning">Edit</a>&nbsp;
                                    <a href="<?= BASE ?>/brand/delete/<?= $row->id_brand ?>" class="btn btn-danger">Delete</a>
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