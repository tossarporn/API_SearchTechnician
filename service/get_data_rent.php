<?php
include '../config/connect_DB.php';
//header("Access-Control-Allow-Origin: *");
$data = file_get_contents("php://input");
$_POST = json_decode($data,true);
$detail = [];

// $get_date['news_date'] = array (
//     ["day"=>'1',"months"=>'มกราคม'],
//     ["day"=>'2',"months"=>'กุมภาพันธ์'],
//     ["day"=>'3',"months"=>'มีนาคม'],
//     ["day"=>'4',"months"=>'เมษายน'],
//     ["day"=>'5',"months"=>'พฤษภาคม'],
//     ["day"=>'6',"months"=>'มิถุนายน'],
//     ["day"=>'7',"months"=>'กรกฎาคม'],
//     ["day"=>'8',"months"=>'สิงหาคม'],
//     ["day"=>'9',"months"=>'กันยายน'],
//     ["day"=>'10',"months"=>'ตุลาคม'],
//     ["day"=>'11',"months"=>'พฤศจิกายน'],
//     ["day"=>'12',"months"=>'ธันวาคม'],
//     );

//     if(isset($_POST['tec_id'])){
//         $tec_id = $_POST['tec_id'];
//     }

// $array_usesed = [];
// foreach ($get_date['news_date'] as $key => $news_date){

//     $select = "SELECT * FROM `customerforrent`
//              WHERE `ref_id_tec`='{$tec_id}'
//           ORDER BY `date_service` DESC"  ;

//     if($res = mysqli_query($connection,$select)){
//             $row = mysqli_fetch_assoc($res);
//             $array_usesed[] = $row["date_service"];
//         // while ($row = mysqli_fetch_assoc($res)){
//         //     $array_usesed[] = $row["date_service"];
//         // }
//     }
// }

    if(isset($_POST['tec_id'])){
         $tec_id = $_POST['tec_id'];
$select = "SELECT * FROM `customerforrent` WHERE `ref_id_tec`='".$_POST['tec_id']."' ORDER BY `date_service` DESC";
        if($res = mysqli_query($connection,$select)){
                // $row = mysqli_fetch_assoc($res);
                // $detail[] = $row;
            while($row = mysqli_fetch_assoc($res)){
                // $row['status_guest'] = status_rent($row['ref_regis'],$connection);
                $detail[] = $row;
            }
        }
        else{
          $detail['message']  = "ไม่สามารถติดต่อข้อมูลได้";
        }
    }
    else {
        $detail['message']  = "ไม่สามารถติดต่อข้อมูลได้";
    }
echo json_encode($detail);
    // function status_rent ($ref_id_guest,$connection){
    //     $select_ref = "SELECT `check_tus` FROM `guest_register` WHERE `id`='{$ref_id_guest}'";
       
    //     if($res = mysqli_query($connection,$select_ref)){
    //         while($row = mysqli_fetch_assoc($res)){         
    //              $row_s[] = $row;
    //         }
    
    //     }
    //     return $row_s;
    // }
?>