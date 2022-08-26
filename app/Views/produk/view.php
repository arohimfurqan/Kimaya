<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Pembeli</h3>
        <div class="card-tools">
          <!-- <a href="<?= BASE ?>/produk/add" class="btn btn-success">Add</a> -->
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Username</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Provinsi</th>
              <th>Kota</th>


              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($user as $row) :
            ?>
              <tr>
                <td><?= $row->username ?></td>
                <td><?= $row->nama_user ?></td>
                <td><?= $row->email ?></td>
                <td><?= $row->nama_provinsi ?></td>
                <td><?= $row->nama_kota ?></td>


                <td>
                  <a href="<?= BASE ?>/login/view/<?= $row->id_user ?>" class="btn btn-info">View</a>&nbsp;
                  <!-- <a href="<?= BASE ?>/produk/delete/<?= $row->id_user ?>" class="btn btn-danger">Tolak</a> -->
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