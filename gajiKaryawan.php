<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>UTS</title>
  <style>
    table, th, td {
  border: 1px solid black;
}
  </style>
  </head>

  <body>

        <main role="main"></main></main></main>
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Pendapatan Driver</h2>
          <form action=<?php echo "gajiKaryawan.php"?> method="get">
              <label for="bulan">Filter berdasarkan bulan:</label>
              <select class="custom-select" name="bulan" required="required">
                <option value="">Pilih Salah Satu</option>
                <?php 
                 $getDriver = "select driver.id_driver,sum(jumlah_km) as jumlah_km,tanggal,nama,no_sim,alamat,month(tanggal) as bulan from trans_upn join driver on trans_upn.id_driver = driver.id_driver group by  month(tanggal) order by month(tanggal)"; 
                 $driverList = mysqli_query(connection(),$getDriver);
              
                while($getDriver = mysqli_fetch_array($driverList)): ?>
               <option value="<?php echo $getDriver["bulan"]?>"><?php echo $getDriver["bulan"]?></option>
                 <?php endwhile ?>
              </select>
            <button type="submit">filter</button>
            </form>
                    <form action="gajiKaryawan.php" method="get">
                        <button type="submit">reset</button>
                    </form>
          <div>
            <table>
              <thead>
                <tr>
                  <th>id_driver</th>
                  <th>nama</th>
                  <th>no_sim</th>
                  <th>alamat</th>
                  <th>bulann ke</th>
                  <th>tanggal</th>
                  <th>jumlah_km</th>
                  <th>gaji</th>
                
              </thead>
              <tbody>
                <?php 
                    $query="";
                  if (isset($_GET['bulan'])) {
                    $query = "select driver.id_driver,sum(jumlah_km) as jumlah_km,tanggal,nama,no_sim,alamat,month(tanggal) as bulan from trans_upn join driver on trans_upn.id_driver = driver.id_driver where month(tanggal) = ".$_GET['bulan'] ." group by trans_upn.id_driver, month(tanggal) ;" ;               
                  } else {
                    $query = "select driver.id_driver,sum(jumlah_km) as jumlah_km,tanggal,nama,no_sim,alamat,month(tanggal) as bulan from trans_upn join driver on trans_upn.id_driver = driver.id_driver group by trans_upn.id_driver, month(tanggal)";             
                }

                 
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td><?php echo $data['bulan'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['jumlah_km'] * 3000;  ?></td>                  
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

