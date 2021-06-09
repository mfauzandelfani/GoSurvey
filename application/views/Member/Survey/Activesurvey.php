<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-info text-white mr-2">
        <i class="mdi mdi mdi-stove"></i>
      </span> Member / Active Survey
    </h3>
    <br />
    <?php foreach ($srvy as $key => $value) {

    ?>

      <div class="row">
        <div class="col-md-12 stretch-card grid-margin">
          <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <h3 class="font-weight-normal mb-3"><?php echo $value->judul_task ?><i class="mdi mdi-chart-line mdi-24px float-right"></i>
              </h3>
              <h5 class="font-weight-normal mb-3"><?php echo $value->desk_task ?></h5>
              <h4 class="mb-5">Rp. <?= number_format($value->nominal_task, 2, ',', '.') ?></h4>
              <p>Author <?php echo $value->nama_usr ?></p>

              <?php foreach ($jwb as $key => $uy) {
                $kd = $uy->id_task;
              } ?>

              <?php
              if ($value->id_task != $kd) { ?>
                <a href="<?= base_url('Member/SoalSurvey_ctrl/tampil_soal/' . $value->id_task) ?>" type="button" class="btn btn-info btn-rounded btn-fw">Isi Survey</a>
              <?php
              } elseif ($value->id_task == $kd) {  ?>
                <button type="button" class="btn btn-danger btn-rounded btn-fw">Survey Telah Diisi</button>



              <?php
              }
              ?>
            </div>
          </div>
        </div>

      </div>

    <?php } ?>


  </div>


  <!-- content-wrapper ends -->