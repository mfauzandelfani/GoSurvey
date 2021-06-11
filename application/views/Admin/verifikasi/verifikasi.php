<script src="assets/surveyer/assets/js/sweetalert2.all.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-database"></i>
            </span> Admin / Data Member
        </h3>
        <br />



        <!-- add tabel survey -->
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Verifikasi</h4>
                    <br>
                    <!-- <a href="#" data-target="#exampleModal2" class="edit" data-toggle="modal" data-id=""><label class="btn btn-info">Tambah</label></a> -->
                    <!-- <br> -->
                    </br>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-active">
                                <th> No </th>
                                <th> Judul</th>
                                <th> Deskripsi</th>
                                <th> Jumlah Respon</th>
                                <th> Nominal</th>
                                <th> Bukti</th>
                                <th> Pembayaran</th>
                                <th> Status</th>
                                <th> Aksi</th>
                            </tr>
                        </thead>

                        <?php foreach ($pgn as $key => $value) {

                        ?>


                            <tbody>
                                <tr>
                                    <td><?php echo $value->id_task ?></td>
                                    <td><?php echo $value->judul_task ?></td>
                                    <td><?php echo $value->desk_task ?></td>
                                    <td><?php echo $value->jmlrespon_task ?></td>
                                    <td><?php echo $value->nominal_task ?></td>
                                    <td><?php echo $value->img ?></td>
                                    <td> <?php echo $value->pembayaran ?> </td>

                                    <?php

                                    if ($value->status == "verified") {
                                    ?>
                                        <th style="color: seagreen;"> <?php echo $value->status ?> </th>
                                    <?php
                                    } elseif ($value->status == "unverified") {

                                    ?>
                                        <th style="color: red;"> <?php echo $value->status ?> </th>
                                    <?php
                                    }
                                    ?>

                                    <th>
                                        <a href="#" data-target="#exampleModal" class="edit3" data-toggle="modal" data-id="<?php echo $value->id_task; ?>" data-status="<?php echo $value->status; ?> "><label class=" badge badge-info">Edit</label></a>
                                    </th>
                                    <!-- Modal -->

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
    <button id=" btn_hapus"> Coba </button>
                </div> -->
        <form method="POST" action="<?= base_url('Admin/verifikasi_ctrl/editaction'); ?>" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Verifikasi</h5>

                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control form-control-lg" id="id_task" name="id" placeholder="Id">
                            </div>
                            <div class="form-group">
                                <!-- <input type="text" class="form-control form-control-lg" id="status" name="status" placeholder="Status"> -->
                                <select class="form-control form-control-sm" name="status" id="status">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option>verified</option>
                                    <option>unverified</option>
                                </select>

                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="nama_bank" name="nama" placeholder="Deskripsi">

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="nomor_bank" name="nomor" placeholder="Jumlah Respon">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="jk_pgn" name="jk" placeholder="Nominal">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="nohp_pgn" name="nohp" placeholder="Bukti">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="alamat_pgn" name="alamat" placeholder="Pembayaran">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="alamat_pgn" name="alamat" placeholder="Status">
                            </div> -->
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>


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