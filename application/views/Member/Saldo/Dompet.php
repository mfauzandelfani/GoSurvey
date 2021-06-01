<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-info text-white mr-2">
        <i class="mdi mdi-square-inc-cash"></i>
      </span> Member / Dompet
    </h3>
    <br />

    <div class="row">
      <div class="col-md-12 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">Saldo<i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">Rp. <?= number_format($dompet['nominal_saldo'], 2, ',', '.'); ?></h2>
            <a class="btn btn-gradient-info btn-fw" href="<?= site_url('/Member/Dompet_ctrl/topup'); ?>">+ Top Up</a> &nbsp; &nbsp; &nbsp;
            <a class="btn btn-gradient-success btn-fw" href="<?= site_url('/Member/Dompet_ctrl/tarik'); ?>">- Tarik</a>
          </div>
        </div>
      </div>

    </div>


    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Riwayat Transaksi</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Transaksi</th>
                    <th> Nominal </th>
                    <th> Tanggal Transaksi</th>
                  </tr>
                </thead>

                <?php foreach ($rwyt as $key => $value) {

                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $key + 1 ?></td>
                      <td><?php echo $value->transaksi ?></td>
                      <td><?php echo $value->nominal_trans ?></td>
                      <td><?php echo date('d F Y', $value->wkt_trans) ?></td>
                      <!-- <?= date('d F Y', $user['date_created']); ?> -->

                    </tr>
                  <?php } ?>


                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->