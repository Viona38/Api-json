<?php
require_once 'koneksi.php';
if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {
        case 'api':
        $true = 'true';
        $succes ='Show data user succes';
        $codesc = '200';
        //Membuat SQL Query
        $sql = "SELECT * FROM tabel_kk4";
        //Mendapatkan Hasil
        $r = mysqli_query($conn,$sql);
        //Membuat Array Kosong
        $result = array();
        while($row = mysqli_fetch_array($r)){
          //Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat
          array_push($result,array(
            "id"=>$row['Id'],
            "username"=>$row['Username'],
            "password"=>$row['Password'],
            "level"=>$row['Level'],
            "fullname"=>$row['Fullname']
          ));
        }
        //Menampilkan Array dalam Format JSON
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$succes,
          'code'=>$codesc
        ));
      }
    }else{
      $id = 'id';
      $true = 'true';
      $succes ='Show data user succes';
      $codesc = '200';
      $coderr = '204';
      $error = 'Data User not Found';
      //Membuat SQL Query ditentukan secara spesifik sesuai ID
      $sql = "SELECT * FROM tabel_kk4 WHERE id=$id;";
      //Mendapatkan Hasil
      $r = mysqli_query($conn,$sql);
      //Memasukkan Hasil Kedalam Array
      $result = array();
      $row = mysqli_fetch_array($r)
      array_push($result,array(
          "id"=>$row['Id'],
          "username"=>$row['Username'],
          "password"=>$row['Password'],
          "level"=>$row['Level'],
          "fullname"=>$row['Fullname']
        ));
      //Menampilkan dalam format JSON
      if ($id<40) {
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$succes,
          'code'=>$codesc
        ));
      }else{
        echo json_encode(array(
          'succes' => $true,
          'data'=>$result,
          'message'=>$error,
          'code'=>$coderr
        ));
      }
    }
 ?>