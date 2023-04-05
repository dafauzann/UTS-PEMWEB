<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_trans_upn = $_POST['id_trans_upn'];
        $Id_kondektur = $_POST['id_kondektur'];
        $Id_bus = $_POST['id_bus'];
        $Id_driver = $_POST['id_driver'];
        $jumlah_km = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];

        $query = "INSERT INTO trans_upn VALUES ('$id_trans_upn','$Id_kondektur','$Id_bus','$Id_driver', '$jumlah_km', 'tanggal')";
        echo $query;
        $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trans UPN</title>
</head>
<body>
<nav>
      <a href="index.php">Index</a>
    </nav>
    <div>
      <div>
        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>]ID Driver Trans UPN berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Driver Trans UPN gagal di-update</div>';
              }

            }
           ?>
                <h2 style="margin: 30px 0 30px;">Form Penambahan Rute Trans UPN</h2>
                <form action="tambahDriver.php" method="POST">
                    <table>
                        
                        <tr>
                            <td><label for="id_trans_upn" > ID TRANS UPN :</label></td>
                            <td><input type="text" name="id_trans_upn" ,  id="id_trans_upn"></td>
                        </tr>

                        <tr>
                            <td><label for="id_kondektur" > ID KONDEKTUR  :</label></td>
                            <td><input type="text" name="id_kondektur" ,  id="id_kondektur"></td>
                        </tr>

                        <tr>
                            <td><label for="id_bus" > ID BUS :</label></td>
                            <td><input type="text" name="id_bus" ,  id="id_bus"></td>
                        </tr>

                        <tr>
                            <td><label for="id_driver" > ID DRIVER  :</label></td>
                            <td><input type="text" name="id_driver" ,  id="id_driver"></td>
                        </tr>

                        <tr>
                            <td><label for="jumlah_km" > JUMLAH KM :</label></td>
                            <td><input type="text" name="jumlah_km" ,  id="jumlah_km"></td>
                        </tr>

                        <tr>
                            <td><label for="tanggal" > TANGGAL  :</label></td>
                            <td><input type="text" name="tanggal" ,  id="tanggal"></td>
                        </tr>
    
                    </table>
                
                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>