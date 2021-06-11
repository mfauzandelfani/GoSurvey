<div class="main-panel">
    <div class="content-wrapper">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi mdi-stove"></i>
            </span> Member / Soal Survey
        </h3>
        <br />

        <form id="form" action="<?= base_url('Member/SoalSurvey_ctrl/jawabsoal'); ?>" method="POST">
            <input type="hidden" name="iduser" id="idusr" class="form-control" value="<?= $user['id_usr']; ?> ">

            <?php
            foreach ($soal as $keyy => $value) { ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="idtask" id="idtask" class="form-control" value="<?php echo $value->id_task ?>">

                            <div class="card p-1 mt-1">
                                <div class="row">
                                    <div class="col-sm-8 mt-1" id="soal_">
                                        <input class="form-control mb-1" value="<?= $value->soal ?>" name="soal[]" type="text">
                                    </div>
                                </div>
                            </div>

                            <?php
                            $kd = $value->id_soal;
                            if ($value->type_soal == "Radio") {
                                foreach ($soal_opt as $key => $value) { ?>
                                    <?php
                                    if ($kd == $value->id_soal) { ?>
                                        <div>
                                            <div class="input-group-prepend mt-2 col-sm-8">
                                                <div class="input-group-text">
                                                    <input type="radio" name="jawaban[]" value="<?php echo $value->pilihan_opt ?>" aria-label="Radio button for following text input">
                                                    <!-- <input type="radio" id="radio_" value="<?php echo $value->pilihan_opt ?>"> -->

                                                </div>
                                                <input class="form-control" value="<?php echo $value->pilihan_opt ?>">
                                            </div>
                                        </div>

                                    <?php }
                                }
                            } elseif ($value->type_soal == "Checkbox") {
                                foreach ($soal_opt as $key => $value) {
                                    if ($kd == $value->id_soal) { ?>
                                        <div class="input-group-prepend mt-2 col-sm-8">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="jawaban[]" value="<?php echo $value->pilihan_opt ?>" aria-label="Checkbox button for following text input">
                                                <!-- <input type="checkbox" id="checkk_" value="<?php echo $value->pilihan_opt ?>" aria-label="Checkbox button for following text input"> -->
                                            </div>
                                            <input class="form-control" value="<?php echo $value->pilihan_opt ?>">
                                        </div>

                                <?php }
                                }
                            } elseif ($value->type_soal == "Text") { ?>
                                <div class="mt-2 col-8">
                                    <input type="text" name="jawaban[]" class="form-control">
                                </div>

                            <?php } elseif ($value->type_soal == "Textarea") { ?>
                                <div class="mt-2 col-sm-8">
                                    <textarea id="text_area" name="jawaban[]" class="form-control mb-3"></textarea>
                                </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
    </div>
</div>



<?php } ?>
</div>
<center>
    <button type="submit" class="btn btn-success btn-rounded btn-fw">Submit</button>
</center>
</form>
<script type="text/javascript">
    var index_jawaban = -1;

    //create input text
    var textt = document.getElementById("text_");
    var inputelement = document.createElement('input'); // Create input field for name
    index_jawaban++;
    inputelement.setAttribute("class", "form-control mb-3");
    inputelement.setAttribute("type", "input");
    inputelement.setAttribute("name", "jawaban-" + index_jawaban + "[]");
    textt.appendChild(inputelement);

    //create input textarea
    var texttarea = document.getElementById("text_area");
    var input = document.createElement("textarea");
    index_jawaban++;
    input.setAttribute("class", "form-control mb-3");
    input.setAttribute("name", "jawaban-" + index_jawaban + "[]");
    texttarea.appendChild(input);

    //create input radio
    var radioo = document.getElementById("radio_");
    var input1 = document.createElement("input");
    index_jawaban++;
    input1.setAttribute("type", "radio");
    input1.setAttribute("value", "anjay");
    input1.setAttribute("aria-label", "Radio button for following text input");
    input1.setAttribute("name", "jawaban-" + index_jawaban + "[]");
    radioo.appendChild(input1);

    //create input check
    var check = document.getElementById("check_");
    var input2 = document.createElement("input");
    index_jawaban++;
    input2.setAttribute("type", "checkbox");
    input2.setAttribute("value", "sanjay");
    input2.setAttribute("name", "jawaban-" + index_jawaban + "[]");
    input2.setAttribute("aria-label", "Checkbox button for following text input");
    check.appendChild(input2);

    //create input check
    var checkk = document.getElementById("checkk_");
    var input3 = document.createElement("input");
    index_jawaban++;
    input3.setAttribute("name", "jawaban-" + index_jawaban + "[]");
    checkk.appendChild(input3);
</script>



<script src="<?php echo base_url(); ?>assets/surveyer/assets/js/tampil_soal.js"></script>