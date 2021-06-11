<script src="assets/surveyer/assets/js/sweetalert2.all.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-info text-white mr-2">
        <i class="mdi mdi-database"></i>
      </span> Member / Waiting Survey
    </h3>
    <br />



    <!-- add tabel survey -->
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Waiting Survey</h4>
          </br>
          <table class="table table-bordered">
            <thead>
              <tr class="table-active">
                <th> No </th>
                <th> Judul Survey </th>
                <th> Deskripsi</th>
                <th> Jumlah Respon </th>
                <th> Pembayaran </th>
                <th> Nominal </th>
                <th> Bukti </th>
                <th> Status </th>
                <th> Action </th>
              </tr>
            </thead>

            <?php foreach ($srvy as $key => $value) { ?>
              <tbody>
                <tr>
                  <td><?php echo $key + 1 ?></td>
                  <td><?php echo $value->judul_task ?></td>
                  <td><?php echo $value->desk_task ?></td>
                  <td><?php echo $value->jmlrespon_task ?></td>
                  <td> <?php echo $value->pembayaran ?> </td>
                  <td><?php echo $value->nominal_task ?></td>
                  <td><?php echo $value->img ?></td>
                  <?php

                  if ($value->status == "verified") {
                  ?>
                    <th style="color: seagreen;"> <?php echo $value->status ?> </th>
                    <td>
                      <a href="<?= base_url('Member/SoalSurvey_ctrl/index/' . $value->id_task) ?>" disabled=><label class="badge badge-info active" aria-disabled="true">Buat Soal</label></a>

                      <!-- <a href="#"><label class="badge badge-danger">Hapus</label></a> -->
                    </td>
                  <?php
                  } elseif ($value->status == "unverified") {

                  ?>
                    <th style="color: red;"> <?php echo $value->status ?> </th>
                    <td>
                      -
                    </td>
                  <?php
                  }
                  ?>



                </tr>
              <?php } ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- end tabel survey -->

    <!-- <br/><br/>
    <div>
    <button id="btn_hapus"> Coba </button> 
    </div> -->



    <script>
      const btn = document.getElementById('btn_hapus');
      btn.addEventListener('click', function() {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
      })
    </script>