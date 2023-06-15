<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
<?php
$show_detail = FALSE;

if (isset($_GET['rid'])) {
    $reference_id = $_GET['rid'];

    $result  = [];
    if (($handle = fopen("F:\PUSDIKLAT\QR GENERATE\php_code\REKAP ALL BASIC SAFETY SD 2023-06-05 - TAD.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // echo "reference_id = " . $reference_id;
            // echo "<br>";
            // echo "data[0] = " . $data[0];
            // echo "<hr>";
            if ($data[0] === $reference_id) {
                $show_detail = TRUE;
                $result = $data;
                break;
            }
        }
        fclose($handle);
        // var_dump($result);
        $NIP = $result[1];
        $NAMA = $result[2];
        $UNIT = $result[3];
        $Filosofi_Dan_Regulasi_K3 = $result[4];
        $Identifikasi_Bahaya = $result[5];
        $Pengendalian_Risiko = $result[6];
        $Safety_Behaviour = $result[7];
        $Emergency_Respon = $result[8];
        $Safety_Briefing = $result[9];
        $Nilai_Akhir = $result[10];
        $Keterangan = $result[11];
        $avatar = $result[12] == '') ? "https://i.stack.imgur.com/34AD2.jpg" : $result[12];
    
    }
}
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .inf-content {
            border: 1px solid #DDDDDD;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container bootstrap snippet">
        <h1>Cerificate Details</h1>
        <div class="panel-body inf-content">
            <div class="row">
                <?php
                if ($show_detail) {
                ?>
                    <div class="col-md-3 text-center">
                        <!-- <img alt="" style="width:250px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario"> -->
                        <img alt="" style="width:250px;height:250px;" title="" class="img-circle img-thumbnail isTooltip" src="<?php echo $avatar; ?>" data-original-title="Usuario">
                    </div>
                    <div class="col-md-9">
                        <strong>Information</strong><br>
                        <div class="table-responsive">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td><strong>NIP</strong></td>
                                        <td class="text-primary"><?php echo $NIP; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>NAMA</strong></td>
                                        <td class="text-primary"><?php echo $NAMA; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>UNIT</strong></td>
                                        <td class="text-primary"><?php echo $UNIT; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Filosofi Dan Regulasi K3</strong></td>
                                        <td class="text-primary"><?php echo $Filosofi_Dan_Regulasi_K3; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Identifikasi Bahaya</strong></td>
                                        <td class="text-primary"><?php echo $Identifikasi_Bahaya; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pengendalian Risiko</strong></td>
                                        <td class="text-primary"><?php echo $Pengendalian_Risiko; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Safety Behaviour</strong></td>
                                        <td class="text-primary"><?php echo $Safety_Behaviour; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Emergency Respon</strong></td>
                                        <td class="text-primary"><?php echo $Emergency_Respon; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Safety Briefing</strong></td>
                                        <td class="text-primary"><?php echo $Safety_Briefing; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nilai Akhir</strong></td>
                                        <td class="text-primary"><?php echo $Nilai_Akhir; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Keterangan</strong></td>
                                        <td class="text-primary"><?php echo $Keterangan; ?></td>
                                    </tr>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-md-12 text-center">
                        Invalid Certificate!
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>