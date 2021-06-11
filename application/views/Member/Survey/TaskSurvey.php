<!-- <div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <nav aria-label="breadcrumb">
      </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Buat Survey</h2>
          <br />
          <form class="forms-sample" action="<?= site_url('Member/TaskSurvey_ctrl/create_survey') ?>" method="POST">
            <div class="form-group">
              <input type="hidden" name="id_usr" class="form-control" value="<?= $user['id_usr']; ?> " id="exampleInputName1">
            </div>
            <div class="form-group">
              <label>Owner</label>
              <input type="text" name="nama" class="form-control" value="<?= $user['nama_usr']; ?> " id="exampleInputName1">
            </div>
            <div class="form-group">
              <label>Judul</label>
              <input type="text" name="judul" class="form-control" id="exampleInputEmail3">
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="exampleTextarea1" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label>Jumlah Responden</label>
              <input type="text" name="jml_res" class="form-control" id="exampleInputPassword4">
            </div>
            <div class="form-group">
              <label>Nominal Survey</label>
              <input type="text" name="nominal" class="form-control" id="exampleInputPassword4">
            </div>
            <div class="form-group">
              <label>Upload Bukti Pembayaran</label>
              <input type="text" name="bukti" class="form-control" id="exampleInputPassword4">
            </div>

            <button type="submit" class="btn btn-info">Submit</button>
            <button class="btn btn-danger">Cancel</button>
          </form>
        </div>

      </div>
    </div>


  </div> -->

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <nav aria-label="breadcrumb">
      </nav>
    </div>
    <form class="forms-sample" action="<?= site_url('Member/TaskSurvey_ctrl/create_survey') ?>" method="POST">
      <div class="col-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title">Buat Survey</h1>
            <br />
            <div class="form-group">
              <input type="hidden" name="id_usr" class="form-control" value="<?= $user['id_usr']; ?> " id="exampleInputName1">
            </div>
            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputName1">Owner</label>
                <input type="text" class="form-control form-control-lg" readonly value="<?= $user['nama_usr']; ?> " id="owner_rwt" name="">
              </div>


              <div class="form-group">
                <label for="exampleInputEmail3">Judul</label>
                <input type="text" class="form-control form-control-lg" id="judul_rwt" name="judul" placeholder="Judul Task">
              </div>
              <div class="form-group">
                <label for="exampleTextarea1">Deskripsi</label>
                <textarea class="form-control" id="desk_rwt" name="deskripsi" rows="4"></textarea>
              </div>

              <div class="form-group">
                <label for="nominal">Nominal Survey</label>
                <!-- <label for="nominal">Nominal Survey</label>
              <input type="range" min="2000" max="200000" value="2000" id="nominal" oninput="nilai2(value)">
              Rp.
              <output for="nominal" id="volume2">2000</output> -->
                <input type="range" min="2000" max="200000" value="20000" class="slider" id="myRange">
                <!-- <p>Value: <span id="demo"></span></p> -->
                Rp. <output id="demo"></output>


                </h6>
              </div>

              <div class="form-group">
                <label for="responden">Jumlah Responden</label>
                <input type="range" min="1" max="200" value="1" name="jml_res" class="slider2" id="myRange2">
                <!-- <p>Value: <span id="demo"></span></p> -->
                <output id="demo2"></output>
                Orang
              </div>

              <div class="form-group">
                <div class="custom-file">
                  <input type="file" name="bukti" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Upload Bukti Pembayaran</label>
                </div>
                <!-- <label>Upload Bukti Pembayaran</label>
              <input type="file" name="img[]" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled>
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-info" type="button">Upload</button>
                </span>
              </div> -->
              </div>

              <button type="submit" class="btn btn-info">Submit</button>
              <!-- <a class="btn btn-gradient-success mr-2" href="<?= site_url('/Member_ctrl/halaman_soal'); ?>">Submit</a> -->
              <!-- <button class="btn btn-danger">Cancel</button> -->

              <a href="<?= base_url('Member/TaskSurvey_ctrl/waiting_survey'); ?>" class="btn btn-danger">Beralih</label></a>
            </form>
          </div>

        </div>

        <div class="mx-3 card" style="height: 7cm;">
          <div class="card-body">
            <h1 class="card-title">Pembayaran</h1>
            <br />

            <div class="form-group">
              <h6 for="nominal">Nominal Survey:

                <output style="font-size: 14px;" id="penjumlahan"></output>
              </h6>
              <!-- <h4>Rp. <span id="anggaran">0</span></h4> -->






              <!-- <input type="file" name="img[]" class="file-upload-default"> -->
              <div class="input-group col-xs-12">
                <!-- <input type="text" class="form-control file-upload-info" disabled> -->
                <!-- <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-info" type="button">Upload</button>
              </span> -->
              </div>
            </div>
            <!-- <h6>Kode Unik:
              <output style="font-size: 14px;" id="kode"></output>
            </h6> -->
            <hr>


            <h6>Total Pembayaran:
              Rp.
              <output style="font-size: 14px;" id="total" name="nominal"></output>
              <input type="hidden" id="total2" name="nominal">

              <!-- <form class="forms-sample">
            <div class="form-group"> -->
              <!-- <label for="exampleInputName1">Owner</label>
              <input type="text" class="form-control" id="exampleInputName1">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Judul</label>
              <input type="text" class="form-control" id="exampleInputEmail3">
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Deskripsi</label>
              <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Jumlah Responden</label>
              <input type="password" class="form-control" id="exampleInputPassword4">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Nominal Survey</label>
              <input type="password" class="form-control" id="exampleInputPassword4">
            </div>
            <div class="form-group">
              <label>Upload Bukti Pembayaran</label>
              <input type="file" name="img[]" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled>
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-info" type="button">Upload</button>
                </span>
              </div>
            </div> -->

              <!-- <a class="btn btn-gradient-success mr-2" href="<?= site_url('/Member_ctrl/halaman_soal'); ?>">Submit</a>
              <button class="btn btn-danger">Cancel</button> -->


              <!-- </form> -->

          </div>
          <div class="card" style="position: relative; bottom: -200px;">
            <table class="table">
              <thead>
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">Logo</th>
                  <th scope="col">Bank</th>
                  <th scope="col">No Rekening</th>
                  <th scope="col">Atas Nama</th>
                </tr>
              </thead>

              <?php foreach ($saldo as $key => $value) { ?>


                <tbody>
                  <tr>

                    <!-- <td><?php echo $key + 1 ?></td> -->

                    <td>
                      <img src="<?= base_url('assets/gambar/logo/') . $value->logo_bank ?>" />
                    </td>
                    <td><?php echo $value->nama_bank ?></td>
                    <td><?php echo $value->nomor_bank ?></td>
                    <td><?php echo $value->atas_nama ?></td>
                  </tr>

                <?php } ?>


                </tbody>
            </table>
          </div>





        </div>


      </div>
    </form>
  </div>





  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    var slider2 = document.getElementById("myRange2");
    var output2 = document.getElementById("demo2");
    var output3 = document.getElementById("penjumlahan");
    var output4 = document.getElementById("total");
    var output5 = document.getElementById("total2");

    output.innerHTML = parseFloat(slider.value).toLocaleString();
    output2.innerHTML = slider2.value;
    output3.innerHTML = slider.value;
    output4.value = slider.value;
    output5.value = slider.value;


    slider.oninput = function() {
      output.innerHTML = parseFloat(this.value).toLocaleString();
      output3.innerHTML = parseFloat(this.value).toLocaleString();
      output4.value = parseFloat(this.value).toLocaleString();
      output5.value = parseFloat(this.value).toLocaleString();


    }

    slider2.oninput = function() {
      output2.innerHTML = this.value;
      var bilangan1 = parseInt(slider.value);
      var bilangan2 = parseInt(slider2.value);

      var penjumlahan = (bilangan1 * bilangan2 || bilangan2 * bilangan1);

      document.getElementById("penjumlahan").innerHTML = penjumlahan;
      var total = (bilangan1 * bilangan2);
      document.getElementById("total").innerHTML = parseFloat(total).toLocaleString();
      document.getElementById("total2").value = parseFloat(total).toLocaleString();
    }

    function hasil() {
      var bilangan1 = parseInt(slider.value);
      var bilangan2 = parseInt(slider2.value);

      var penjumlahan = (bilangan1 * bilangan2 || bilangan2 * bilangan1);

      document.getElementById("penjumlahan").innerHTML = parseFloat(penjumlahan).toLocaleString();
    }

    function total() {
      var output3 = document.getElementById("kode");
      var x = 900;
      var acak = Math.floor(Math.random() * x) + 99;
      output3.innerHTML = acak;
      var bilangan1 = parseInt(slider.value);
      var bilangan2 = parseInt(slider2.value);
      var total = (bilangan1 * bilangan2);
      // document.getElementById("total").value = parseFloat(total).toLocaleString();
      document.getElementById("total").innerHTML = parseFloat(total).toLocaleString();
      document.getElementById("total2").value = parseFloat(total).toLocaleString();
      // document.getElementById("total").value = "My Value";
      // document.getElementById("example").setAttribute('value', 'My default value');
    }

    function kode_unik() {
      var output3 = document.getElementById("kode");
      var x = 900;
      var acak = Math.floor(Math.random() * x) + 99;
      output3.innerHTML = acak;
    }

    total();
    kode_unik();
    hasil();
  </script>