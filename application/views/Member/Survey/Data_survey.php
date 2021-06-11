<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-info text-white mr-2">
        <i class="mdi mdi-bulletin-board"></i>
      </span> Member / My Survey
    </h3>
    <br />

    <?php foreach ($srvy as $key => $value) {

    ?>

      <div class="row">
        <div class="col-md-12 stretch-card grid-margin">
          <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
              <h3 class="font-weight-normal mb-3"><?php echo $value->judul_task ?><i class="mdi mdi-chart-line mdi-24px float-right"></i>
              </h3>
              <h5 class="font-weight-normal mb-3"><?php echo $value->desk_task ?></h5>
              <h4 class="mb-5">Rp. <?= number_format($value->nominal_task, 2, ',', '.') ?></h4>
              <p>Author <?php echo $value->nama_usr ?></p>
              <a class="btn btn-success btn-rounded btn-fw" href="<?= site_url('/Member/Grafik_ctrl'); ?>">Lihat Grafik</a>
              <!-- <button type="button" class="btn btn-success btn-rounded btn-fw">Lihat Grafik</button> -->
            </div>
          </div>
        </div>

      </div>

    <?php } ?>


    <div class="row">
      <div class="card-body" align="center">
        <a class="btn btn-gradient-success btn-rounded btn-fw" href="<?= site_url('/Member/TaskSurvey_ctrl'); ?>">+ Buat Survey</a>
        <!-- <a href="<?= site_url('/Member/Member_ctrl/halaman_task'); ?>"><button type="button" class="btn btn-gradient-primary btn-fw">Add Survey</button></a> -->
      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->