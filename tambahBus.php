<?php
    include('conn.php');

    $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idBus = $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];

        $query = "INSERT INTO bus VALUES ('$idBus','$plat','$status')";
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
    <title>Add Bus Trans UPN</title>
</head>
<body>
<nav>
      <H2><a href="index.php">BACK</a></H2>
    </nav>
    <div>
      <div>
        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>]ID Bus Trans UPN berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Bus Trans UPN gagal di-update</div>';
              }

            }
           ?>
                <h2 style="margin: 30px 0 30px;">Formulir Tambah Data Bus Trans UPN</h2>
                <form action="tambahBus.php" method="POST">
                <table>
                        <tr>
                            <td><label for="id_bus" > ID BUS  :</label></td>
                            <td><input type="text" name="id_bus" ,  id="id_bus"></td>
                        </tr>

                        <tr>
                            <td><label for="plat" > PLAT  :</label></td>
                            <td><input type="text" name="plat" ,  id="plat"></td>
                        </tr>

                        <tr>
                            <td><label for="status" > STATUS  :</label></td>
                            <td><input type="text" name="status" ,  id="status"></td>
                        </tr>
                </table>
                    <button type="submit">Simpan</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>