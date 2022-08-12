<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Produk</h3>
                <div class="card-tools">
                    <a href="<?= BASE ?>/produk/add" class="btn btn-success">Add</a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Stock</th>
                            <th>Brand</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($produk as $row) :
                        ?>
                            <tr>
                                <td><?= $row->nama_produk ?></td>
                                <td><?= $row->qty ?></td>
                                <td><?= $row->nama_brand ?></td>
                                <td><?= $row->nama_kategori ?></td>
                                <td><?= $row->harga ?></td>
                                <td><?= $row->deskripsi ?></td>
                                <td>
                                    <a href="<?= BASE ?>/produk/edit/<?= $row->id_produk ?>" class="btn btn-warning">Edit</a>&nbsp;
                                    <a href="<?= BASE ?>/produk/delete/<?= $row->id_produk ?>" class="btn btn-danger">Delete</a>
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