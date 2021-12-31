<?= $this->extend('templates/header'); ?>

<?= $this->section('content'); ?>
<?php



?>
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
                            <li class="breadcrumb-item active">Data Asociation Rule</li>
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
                        <a  type="button" class="btn btn-primary waves-effect waves-light text-white" data-toggle="modal" data-target="#updateminrule">
                             Update Minimal Rule
                        </a>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr class="bg-dark-light">
                                            <th>No</th>
                                            <th>Rule</th>
                                            <th>Support</th>
                                            <th>Confidance</th>
                                            <th class="text-center"><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($data_rule as $value){
                                        ?>
                                        <tr>
                                            <td><?php echo $value->id_rule; ?></td>
                                            <td><?php echo $value->rule; ?></td>
                                            <td><?php echo present($value->Support); ?></td>
                                            <td><?php echo present($value->Confidance); ?></td>
                                            <td>
                                                <a type="button" data-toggle="modal" data-target="#detail<?= $value->id_rule; ?>"><i class="mdi mdi-pencil fa-lg text-warning"></i>Detail</a>
                                            </td>
                                        </tr>
                                       <?php } ?>
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

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">


        
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    
                    <div class="pb-2">
                        <h1>Data Rule Baru</h1>
                    </div>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">   
                            <?php  echo form_open('AsociationRule/update');
                                          foreach($Rules2 as $value){
                                              $antesenden = $value['antecedent']; ?>
                                            <input type="hidden" name="Anteseden[]" value="<?php echo implode(",", $antesenden) ?>">
                                            <input type="hidden" name="Consequent[]" value="<?php echo implode(",", $value['consequent']); ?>">
                                            <input type="hidden" name="Support[]" value="<?php echo round($value['support'],2);?>">
                                            <input type="hidden" name="Confident[]" value="<?php echo round($value['confidence'], 2) ;?>">
                                            <?php 
                                                        $abterjual=$value['support']*$jumlahtrans2;
                                                       
                                                        $aterjual=$abterjual/$value['confidence'];
                                                     ?>
                                            <input type="hidden" name="ABterjual[]" value="<?php echo  round($abterjual,0);?>">
                                            <input type="hidden" name="Aterjual[]" value="<?php echo round($aterjual,0);?>">
                                       <?php } 
                                            foreach($Rules as $value){
                                                 $antesenden = $value['antecedent'];?>
                                                <input type="hidden" name="Anteseden2[]" value="<?php echo implode(",", $antesenden) ?>">
                                            <input type="hidden" name="Consequent2[]" value="<?php echo implode(",", $value['consequent']); ?>">
                                            <input type="hidden" name="Support2[]" value="<?php echo round($value['support'],2);?>">
                                            <input type="hidden" name="Confident2[]" value="<?php echo round($value['confidence'], 2) ;?>">
                                            
                                            <?php }
                                       ?> 
                                       <div class="pb-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light text-white">Tambah/Update Rule</button>
                                            </div>
                                        </form>  
                                <table id="datatable" class="table table-striped table-bordered nowrap">

                                    <thead>
                                        <tr class="bg-dark-light">
                                            <td>
                                                anteseden
                                            </td>
                                            <td>
                                                Consequent
                                            </td>
                                            <td>
                                                Support
                                            </td>
                                            <td>
                                                Confident
                                            </td>
                                             <td>
                                                Produk A dan B terbeli
                                            </td>
                                            <td>
                                                Produk A terbeli
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                    <?php
                                        foreach($Rules as $value){

                                            $antesenden = $value['antecedent'];
                                            
                                            ?>
                                            
                                            <tr>
                                                <td>
                                                    <?php echo implode(",", $antesenden); ?>
                                                </td>
                                                <td>
                                                    
                                                    <?php echo implode(",", $value['consequent']);?>
                                                </td>
                                                <td>
                                                    <?php echo present(round($value['support'],2)); ?>
                                                </td>
                                                <td>
                                                    <?php echo present(round($value['confidence'], 2))?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $abterjual=$value['support']*$jumlahtrans2;
                                                        echo round($abterjual,0);
                                                     ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $aterjual=$abterjual/$value['confidence'];
                                                        echo round($aterjual,0);
                                                     ?>
                                                </td>
                                            </tr>

                                            <?php 
                                            // foreach($antesenden as $v1){
                                            //     echo $cacah.". Antesenden (".$cacahantesenden.") = ".$v1."<br>";
                                            // }

                                            // $cacahconsequent = 1;
                                            // $consequent = $value['consequent'];
                                            // foreach($consequent as $v2){
                                            //     echo $cacah.". Consequent (".$cacahconsequent.") = ".$v2."<br>";
                                            // }
                                            // echo $cacah.". Support = ".$value['support']."<br>";
                                            // echo $cacah.". Confidence = ".$value['confidence']."<br>";

                                            // echo "<hr>";
                                            // $cacah++;
                                          }

                                          ?>
                                                                                     
                                    </tbody>
                                    

                                </table>
                            </div>
                        </div>
                    </div><br>
                    
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
    <?php foreach ($data_rule as $row) : ?>
    <div id="detail<?= $row->id_rule; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content" style="width: auto; height: auto;">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">detail Rule</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="width: auto; height: auto;">
                    <table id="datatable" class="table table-striped table-bordered nowrap" style="width: auto; height: auto;">
                        <thead>
                            <tr class="bg-dark-light">
                                    <th>ID</th>
                                    <th>Peroduk A</th>
                                    <th>Peroduk B(Rekomendasi)</th>
                                    <th>Produk A dan B terjual</th>
                                    <th>Produk A terjual</th>
                                    <th>Support</th>
                                    <th>confidance</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($detail_rule as $value) { 
                                if($value->id_rule==$row->id_rule){
                                ?>
                                <tr>
                                    <td><?php echo $value->id_rule; ?></td>
                                    <td><?php echo $value->produk_pilihan; ?></td>
                                    <td><?php echo $value->produk_rekomen; ?></td>
                                    <td><?php echo $value->abterjual; ?></td>
                                    <td><?php echo $value->aterjual; ?></td>
                                    <td><?php echo present($value->Support); ?></td>
                                    <td><?php echo present($value->Confidance); ?></td>
                                </tr>
                                <?php }
                            }
                             ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>

</div> <!-- content -->

<div id="updateminrule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content" style="width: auto; height: auto;">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Data Minimal Rule</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="width: auto; height: auto;">
                     <table id="datatable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr class="bg-dark-light">
                                            <th>ID </th>
                                            <th>Minimal Suppport</th>
                                            <th>Minimal Confidance</th>
                                            <th>Action</th>
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

                                                <td class="d-print-none text-center">
                                                    
                                                        <a type="button" href="<?php echo base_url('AsociationRule/Activateminrule/'.$value->id ); ?> "class="btn btn-primary waves-effect waves-light text-white <?php  echo ($value->status=='active') ? 'disabled' : ''; ?>"><?php echo ($value->status=='active') ? 'Activated' : 'Activate'; ?></a>
                                                        
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?= $this->endSection('content'); ?>