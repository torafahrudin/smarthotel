<?= $this->extend('templates/header'); ?>

<?= $this->section('content'); ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">


        <!-- start page title -->
        <div class="row pr-2">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18"></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">tambah Minimal Rule</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box" style="height:auto;">
                    <div class="pb-2">
                        <a href="<?php echo base_url('AsociationRule/data_min_rule') ?>" type="button" class="btn btn-primary waves-effect waves-light text-white">
                        Kembali
                        </a>
                    </div>
                    <?php echo form_open('AsociationRule/tambahminrule', ['class'=>'no-validated']) ?>
                        <div>
                                <div class="mb-3">
                                    <label class="form-label">ID</label>
                                    <input type="hidden" name="id" value="<?= $idminrule?>">
                                    <input type="text" class="form-control " id="id" name="id" value="<?= $idminrule ?>" disabled>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Minimal Support</label>
                                    <input type="text" class="form-control" id="min_sup" name="min_sup" value="<?= set_value('min_sup')?>" autocomplete="off" >
                                    <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('min_sup') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                              
                                                    <strong style="color: red;"><?= $validation->getError('min_sup')?> </strong>
                                               
                                        <?php
                                        }
                                    }
                                ?>
                                </div>
                         

                            <div class="mb-3">
                                <label class="form-label">Minimal Confidance</label>
                                <input type="text" class="form-control" id="min_con" name="min_con" value="<?= set_value('min_con')?>" autocomplete="off" >
                                 <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('min_con') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                              
                                                    <strong style="color: red;"><?= $validation->getError('min_con')?> </strong>
                                               
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                            
                        </div>
               
                </div>
                      <div class="mb-2 mt-1">
                                <div class="float-right d-none d-sm-block">
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                                </div>
                            </div>
                <?php echo form_close() ?>
            </div>
        </div> <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->

<?= $this->endSection('content'); ?>