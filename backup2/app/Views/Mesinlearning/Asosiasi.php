<?php
//print_r($Rules);

/*
for($i=0;$i<=count($Rules);$i++){
    print_r($Rules[$i]['antecedent']);
    print_r($Rules[$i]['consequent']);
    print_r($Rules[$i]['support']);
    print_r($Rules[$i]['confidence']);
}
// */
// $cacah = 1;
// echo "<hr>";
// foreach($Rules as $value){

//     $antesenden = $value['antecedent'];
//     $cacahantesenden = 1;
//     foreach($antesenden as $v1){
//         echo $cacah.". Antesenden (".$cacahantesenden.") = ".$v1."<br>";
//     }

//     $cacahconsequent = 1;
//     $consequent = $value['consequent'];
//     foreach($consequent as $v2){
//         echo $cacah.". Consequent (".$cacahconsequent.") = ".$v2."<br>";
//     }
//     echo $cacah.". Support = ".$value['support']."<br>";
//     echo $cacah.". Confidence = ".$value['confidence']."<br>";

//     echo "<hr>";
//     $cacah++;
//   }
?>
<div class="row">
            <div class="col-12">
                <div class="card-box">
                    
                    <div class="pb-2">
                        <h1>Data Rule Baru</h1>
                    </div>
                     <?php  echo form_open('Asociationrule/update');
                                          foreach($Rules as $value){
                                              $antesenden = $value['antecedent']; ?>
                                            <input type="hidden" name="Anteseden[]" value="<?php echo implode(",", $antesenden) ?>">
                                            <input type="hidden" name="Consequent[]" value="<?php echo implode(",", $value['consequent']); ?>">
                                            <input type="hidden" name="Suppport[]" value="<?php echo round($value['support'],2);?>">
                                            <input type="hidden" name="Confident[]" value="<?php echo round($value['confidence'], 2) ;?>">
                                       <?php } ?> 
                                       <div class="pb-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light text-white">Tambah/Update Rule</button>
                                           
                                        </div>
                                         </form>

                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">     
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
                                                    <?php echo round($value['support'],2); ?>
                                                </td>
                                                <td>
                                                    <?php echo round($value['confidence'], 2)?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $abterjual=$value['support']*$jumlahtrans;
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
                                          }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><br>
                    
                </div>
            </div>
        </div> <!-- end row -->
