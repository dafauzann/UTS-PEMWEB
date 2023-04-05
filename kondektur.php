<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Data Kondektur</title>
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
  </head>

  <body>
    <nav>
      <h2><a href="index.php">BACK</a></h2>
      <br>
      <h2><a href="tambahKondektur.php">TAMBAH DATA</a></h2>
    </nav>
    <div>
      <div>

        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>]ID Kondektur berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Kondektur gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tabel Kondektur Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID Kondektur</th>
                  <th>Nama</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM kondektur";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td>
                      <a href="<?php echo "updateKondektur.php?id=".$data['id_kondektur']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteKondektur.php?id=".$data['id_kondektur']; ?>"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

  </body>
</html>