<?php
include '../config/connect_DB.php';
//header("Access-Control-Allow-Origin: *");
$data = file_get_contents("php://input");
$_POST = json_decode($data,true);
$details=[];

if(isset($_POST['id_guest'])){
    $id_guest = $_POST['id_guest'];
}
    $select = "SELECT * FROM `guest_register` WHERE `id`= '{$id_guest}'";
    if($res = mysqli_query($connection,$select)){
        if(mysqli_num_rows($res)!=1){
            $detail['message'] = "ไม่มีผู้ใช้อยู่ไหนระบบ";
            $detail['status'] = false;
        }else{
            $select_delete = "DELETE FROM `guest_register` WHERE `id`= '{$id_guest}'";
            $detail['status'] = true;
            $detail['message'] = 'ลบข้อมูลสำเร็จ';
            $query = mysqli_query($connection,$select_delete);
        }

    }

else{
    $detail['message'] = 'ไม่สามารถติดต่อกับข้อมูลได้';
}
echo json_encode($detail);


?>