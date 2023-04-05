<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idKondektur = $_POST['id_kondektur'];
        $nama = $_POST['nama'];

        $query = "INSERT INTO kondektur VALUES ('$idKondektur','$nama')";
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
      <a href="index.php">index</a>
    </nav>
    <div>
      <div>
        <nav>
            <a href="index.php"></a>
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
                            <td><label for="id_kondektur" > ID KONDEKTUR  :</label></td>
                            <td><input type="text" name="id_kondektur" ,  id="id_kondektur"></td>
                        </tr>

                        <tr>
                            <td><label for="nama" > NAMA  :</label></td>
                            <td><input type="text" name="nama" ,  id="nama"></td>
                        </tr>
                    </table>
                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>