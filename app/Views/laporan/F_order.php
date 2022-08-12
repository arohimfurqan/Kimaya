<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Laporan Order</h3>
        <div class="card-tools">
          <!-- <a href="<?= BASE ?>/produk/" class="btn btn-warning">Back</a> -->
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="<?= BASE ?>/laporan/order" method="POST" target="_blank">
          <div class="box-body">
            <div class="row clearfix">
              <div class="col-md-6">
                <label for="nama" class="control-label"><span class="text-danger">*</span>Tahun :</label>
                <div class="form-group">
                  <?php
                  $now = date("Y");
                  ?><select name="tahun" id="tahun" class="form-control">
                    <option value='<?php echo $now ?>' selected><?php echo $now ?></option>
                    <?php
                    for ($thn = 2010; $thn <= $now; $thn++) {
                    ?><option value=<?php echo $thn ?>> <?php echo $thn ?></option> <?php } ?>
                  </select>
                </div>
              </div>


            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check"></i> Cetak
            </button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>