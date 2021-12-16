<?php

// $minSupport = 4;

// $frekuensi_item = frekuensiItem($arr);
// $dataEliminasi = eliminasiItem($frekuensi_item, $minSupport);

// print_r($dataEliminasi);

do {
    $pasangan_item; 
    $frekuensi_item1;
    $dataEliminasi;
} while ($dataEliminasi == $frekuensi_item1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apriori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="padding:40px">
    <h3 class="text-left">Algoritma Apriori</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    Diketahui!
                </div>
                <div class="panel-footer">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2" valign="middle" class="text-center">Id</th>
                                <th colspan="5" class="text-left">Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($data_item); $i++) {
                                echo ("<tr>");
                                echo ("<td class='text-center'>" . $data_item[$i]["id"] . "</td>");
                                echo ("<td>" . $data_item[$i]["item"] . "</td>");
                                echo ("</tr>");
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    Pertanyaan?
                </div>
                <div class="panel-footer">
                    Bagaimana mengetahui pola atau aturan jika salah satu item dipilih, maka kemungkinan akan memilih item yang lainnya?
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                
                
                    
                     <?php
                    
                        $iterasi = 2;
                        do {
                                $pasangan_item;
                                $frekuensi_item1;
                                foreach ($frekuensi_item1 as $key => $val) {

                                 $ex = explode("_", $key);
                                 $item = "";
                                 $vl = "";
                                 for ($k = 0; $k < count($ex); $k++) {
                                    if ($k !== count($ex) - 1) {
                                  $item .= "," . $ex[$k];
                                    } else {
                                      $vl = $ex[$k];
                                     }
                                 }
                                  $aturan_asosiasi[] = array("item" => substr($item, 1), "val" => $vl, "sc" => $val);
                                     }
                                   ?>
                                  
                           
                                            <?php
                                            $dataEliminasi; 
                                           $iterasi++;
                        } while ($dataEliminasi == $frekuensi_item1)
                        ?>
                        <b>Karena tidak ada lagi frekuensi yang harus di eliminasi maka iterasi di hentikan.</b><br>
                        <b>Hitung Support dan Confident:</b><br>
                        <?php
                        $no=1;
                        echo form_open('Asociationrule/update');
                        for ($i = 0; $i < count($aturan_asosiasi); $i++) {
                            $x = 0;
                            
                            $ex = explode(",", $aturan_asosiasi[$i]["item"]);

                            for ($l = 0; $l < count($arr); $l++) {
                                $jum = 0;
                                for ($k = 0; $k < count($ex); $k++) {

                                    for ($j = 0; $j < count($arr[$l]); $j++) {
                                        if ($arr[$l][$j] == $ex[$k]) {
                                            $jum += 1;
                                        }
                                    }
                                }
                                if (count($ex) == $jum) {
                                    $x += 1;
                                }
                            }
                            $convident = (floatval($aturan_asosiasi[$i]["sc"]) / floatval($x)) * 100;
                            $present=number_format($convident, 0, ".", ",");
                            
                            if ($present>25) {
                                echo $no.".";
                                echo  $aturan_asosiasi[$i]["item"] . " => " . $aturan_asosiasi[$i]["val"] . "=";
                                  $aturan_asosiasi[$i]["c"] = number_format($convident, 2, ".", ",");
                                echo $aturan_asosiasi[$i]["sc"] . "/" . $x . "=" . number_format(floatval($aturan_asosiasi[$i]["sc"]) / floatval($x), 2, ".", ",") . "=" . number_format($convident, 0, ".", ",") . "%";
                                echo  "<br>";

                                ?>
                                
                                <input type="hidden" name="item[]" value="<?php echo $aturan_asosiasi[$i]["item"] ?>">
                                 <input type="hidden" name="recomen[]" value="<?php echo $aturan_asosiasi[$i]["val"] ?>">
                                  <input type="hidden" name="jumlahbeli[]" value="<?php echo $x ;?>">
                                   <input type="hidden" name="confident[]" value="<?php echo $present; ?>">
                                <?php
                                $no++;
                            }
                           
                        }

                        ?>
                            <button type="submit" class="btn btn-primary">Updaterule</button>
                                </form>
                    </div>
               
            </div>
        </div>
    </div>
    </div>
</body>

</html>