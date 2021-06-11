<?php
$konek = mysqli_connect("localhost", "root", "", "gosurvey");
$no = "select * from tbl_bank";
$query = "select * from tbl_saldo";
?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-square-inc-cash"></i>
            </span> Member / Dompet (-Tarik)
        </h3>
        <br />

        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tarik Saldo</h4><br />
                    <form class="form-sample" action="<?= site_url('/Member/Dompet_ctrl/tarik_saldo'); ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="id_usr" class="form-control" value="<?= $user['id_usr']; ?> " id="exampleInputName1">
                        </div>

                        <div class="form-group">
                            <label>Saldo</label>
                            <input type="text" name="saldo" class="form-control form-control-sm" readonly placeholder=" Jumlah Saldo" value="<?= $dompet['nominal_saldo']; ?>">

                        </div>

                        <div class="form-group">
                            <label>Nominal Penarikan</label>
                            <input type="number" name="nominal" class="form-control form-control-sm" min="50000" value="50000" placeholder="Minimal Penarikan Rp. 50.000">

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect3">Metode Penarikan</label>
                            <select class="form-control form-control-sm" name="harga_saldo" id="exampleFormControlSelect3">
                                <option selected="selected"> -- Silahkan Metode Penarikan -- </option>
                                <?php
                                // $konek = mysqli_connect("localhost", "root", "", "gosurvey");
                                // $query = "select * from tbl_saldo";
                                $hasil = mysqli_query($konek, $no);
                                while ($data = mysqli_fetch_array($hasil)) {
                                    echo "<option value=$data[nama_bank]>$data[nama_bank]</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening Anda</label>
                            <input type="text" id="rek" name="rek" class="form-control form-control-sm" placeholder="No Rekening">
                        </div>


                        <div class="template-demo">
                            <!-- <a class="btn btn-inverse-info btn-fw" href="<?= site_url('/Member/Dompet_ctrl/tarik_saldo'); ?>">Top Up</a> -->
                            <button type="submit" class="btn btn-inverse-danger btn-fw">Tarik</button>
                        </div>

                    </form>
                </div>
            </div>

            <script type="text/javascript">
                <?php echo $jsArra; ?>

                function changeValuee(input_noreek) {
                    document.getElementById("rek").value = norek[input_noreek].rek;
                }
            </script>