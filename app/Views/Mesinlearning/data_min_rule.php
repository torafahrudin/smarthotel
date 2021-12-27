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
                            <li class="breadcrumb-item active">Data Minimal Rule</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="pb-2">
                        <a href="<?php echo base_url('AsociationRule/tambahminrule') ?>" type="button" class="btn btn-primary waves-effect waves-light text-white">
                            <i class="mdi mdi-plus-thick fa-lg text-white"></i> Tambah
                        </a>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr class="bg-dark-light">
                                            <th>ID </th>
                                            <th>Minimal Suppport</th>
                                            <th>Minimal Confidance</th>
                                            <th>Status</th>
                                          
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($minrule as $value) : ?>
                                            <tr>
                                                <td>
                                                    <?= $value->id ?>
                                                </td>
                                                <td>
                                                    <?= present($value->min_sup) ?>
                                                </td>
                                                <td>
                                                    <?= present($value->min_con) ?>
                                                </td>
                                                <td>
                                                    <?= $value->status ?>
                                                </td>

                                                <td class="d-print-none text-center">
                                                    <?php if($value->status=='active') {?>
                                                        <p>Min Support & Min Confidance is Active</p>
                                                        >
                                                    <?php }else if { ?>
                                                        <a type="button" data-toggle="modal" data-target="#edit<?= $value->id; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i></a>
                                                        <a type="button" data-toggle="modal" data-target="#delete<?= $value->id; ?>">
                                                            <i class="mdi mdi-trash-can fa-lg text-danger"></i>
                                                        </a
                                                   <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->



    <div id="tambahdatarule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit Data </h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body"> 
                   
                    <?php echo form_open('AsociationRule/simpanminrule', ['class'=>'no-validated']) ?>
                        <div>
                                <div class="mb-3">
                                    <label class="form-label">ID</label>
                                    <input type="hidden" name="id" value="<?= $idminrule?>">
                                    <input type="text" class="form-control " id="id" name="id" value="<?= $idminrule ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Minimal Support</label>
                                    <input type="text" class="form-control" id="min_sup" name="min_sup" value="<?= set_value('min_sup')?>" autocomplete="off" >
                                    <div class="invalid-feedback errorminsup">
                                        
                                    </div>
                                </div>
                         

                            <div class="mb-3">
                                <label class="form-label">Minimal Confidance</label>
                                <input type="text" class="form-control" id="min_con" name="min_con" value="<?= set_value('min_con')?>" autocomplete="off" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control select2">
                                  <option value="0">- - - Pilih Status - - -</option>
                                  <option value="0">Active</option>
                                  <option value="0">Non Active</option>
                                </select>
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-right d-none d-sm-block">
                                    <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
           
            <!-- /.modal-content -->
        </div>
         <script type="text/javascript">
              $(document).ready(function(){
                    $('.no-validated').submit(function(e) {

                        e.preventDefault();
                        $.ajax({
                            type : "POST",
                            url : <?php echo base_url('AsociationRule/simpanminrule') ?>,
                            data :$(this).serialize(),
                            dataType : "json",
                            success : function(response) {
                                if (response.error){
                                    if (response.error.min_sup){
                                        $('#min_sup').addClass('is-invalid');
                                        $('.errorminsup').html(response.errors.min_sup);
                                    }
                                }   
                            }
                        });
                        return false;
                    });
                });
            </script>
        <!-- /.modal-dialog -->
    </div>

    <!-- /.modal -->

<!-- modal tambah data -->
<?php foreach ($minrule as $value) : ?>
 <div id="edit<?= $value->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit Data </h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('AsociationRule/update_min_rule') ?>" method="POST" class="no-validated">
                        <div>
                                <?php  
                                    $minsup=$value->min_sup*100;
                                    $mincon=$value->min_con*100;
                                 ?>
                                <div class="mb-3">
                                    <label class="form-label">ID</label>
                                    <input type="hidden" name="id" value="<?= $value->id ?>">
                                    <input type="text" class="form-control " id="id<?= $value->id ?>" name="id" value="<?= $value->id ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Minimal Support</label>
                                    <input type="text" class="form-control" id="min_sup<?= $value->min_sup ?>" name="min_sup" value="<?= $minsup ?>" required>
                                </div>
                         

                            <div class="mb-3">
                                <label class="form-label">Minimal Confidance</label>
                                <input type="text" class="form-control" id="min_con<?= $value->min_con ?>" name="min_con" value="<?= $mincon ?>" required>
                            </div>
                            <div class="mb-2 mt-1">
                                <div class="float-right d-none d-sm-block">
                                    <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-move fa-lg"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>
<?php foreach ($minrule as $value) : ?>
   
    <?php echo form_open('AsociationRule/delete_min_rule') ?>
        <div id="delete<?= $value->id ; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title mt-0 text-white">Apa Kamu Yakin ?</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-body">
                        <div class="mb-2 mt-1">
                            <div class="float-right d-none d-sm-block">
                                <input type="hidden" name="id" value="<?= $value->id ?>">
                                <button href="#" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-thick fa-lg"></i> Batal</button>
                                <button href="#" class="btn btn-danger" type="submit"><i class="mdi mdi-trash-can fa-lg"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
<?php endforeach ?>


<?= $this->endSection('content'); ?>