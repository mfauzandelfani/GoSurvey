<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row" id="proBanner">
      <div class="col-12">
        <h4><?= $this->session->flashdata('profil'); ?></h4>
        <span class="d-flex align-items-center purchase-popup">
          <h4>Selamat datang di halaman Member</h4>
        </span>
      </div>
    </div>

    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-info text-white mr-2">
          <i class="mdi mdi-home"></i>
        </span> Member / Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">

        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">Saldo<i class="mdi mdi-square-inc-cash mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">Rp <?= number_format($dompet['nominal_saldo'], 2, ',', '.'); ?></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">Survey Aktif<i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"> <?= $survey['id_task']; ?> </h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">Survey Tuntas<i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"><?= $jawab['id_jwb']; ?></h2>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Riwayat Pengerjaan Survey</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> Judul </th>
                    <th> Owner </th>
                    <th> Status </th>
                    <th> Deadline</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> Survey kepuaasan penjualan pasar beduk </td>
                    <td> Gina Apriasiska </td>
                    <td><b> Verived </b></td>
                    <td> 25-05-2021 </td>
                  </tr>
                  <!-- <tr>
                            <td> 2 </td>
                            <td> Top Up </td>
                            <td> 98500</td>
                            <td> 15-04-2021 </td>
                          </tr>
                          <tr>
                            <td> 3 </td>
                            <td> Tarik </td>
                            <td> 50000 </td>
                            <td> 16-04-2021 </td>
                          </tr> -->

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- content-wrapper ends -->