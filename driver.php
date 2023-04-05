<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Data Driver</title>
  </head>

  <body>
  <nav>
      <a href="index.php">Back</a>
      <br>
      <h2><a href="tambahDriver.php">TAMBAH DATA</a></h2>
    </nav>
    <div>
      <div>
        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><br><div>ID Driver berhasil di-update</div>';
              }
              else if ($status=='error'){
                echo '<br><br><div role="alert">ID Driver gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Tabel Trans UPN</h2>
          <div>
            <table border="1">
              <thead>
                <tr>
                  <th>ID Driver</th>
                  <th>Nama</th>
                  <th>NO SIM</th>
                  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM driver";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td>
                      <a href="<?php echo "updatedriver.php?id=".$data['id_driver']; ?>"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deletedriver.php?id=".$data['id_driver']; ?>"> Delete</a>
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