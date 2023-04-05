<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idDriver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $noSIM = $_POST['no_sim'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO driver VALUES ('$idDriver','$nama','$noSIM','$alamat')";
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
    <div>
      <div>
        <nav>
            <h2><a href="index.php">BACK</a></h2> 
        </nav>
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
                <h2 style="margin: 30px 0 30px;">Form Penambahan Driver</h2>
                <form action="tambahDriver.php" method="POST">
            <table>
                <tr>
                        <td><label for="id_driver" > ID DRIVER  :</label></td>
                        <td><input type="text" name="id_driver" ,  id="id_driver"></td>
                </tr>

                <tr>
                        <td><label for="nama" > NAMA  :</label></td>
                        <td><input type="text" name="nama" ,  id="nama"></td>
                </tr>

                <tr>
                        <td><label for="no_sim" > NO SIM  :</label></td>
                        <td><input type="text" name="no_sim" ,  id="no_sim"></td>
                </tr>

                <tr>
                        <td><label for="alamat" > ALAMAT  :</label></td>
                        <td><input type="text" name="alamat" ,  id="alamat"></td>
                </tr>

                    <button type="submit">Simpan</button>
                </form>
                </table>
            </main>
        </div>
    </div>
</body>
</html>