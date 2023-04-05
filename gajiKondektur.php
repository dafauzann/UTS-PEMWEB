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

        <main role="main"></main>
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
          <h2 style="margin: 30px 0 30px 0;">Pendapatan Kondektur</h2>
          <form action=<?php echo "gajiKondektur.php"?> method="get">
              <label for="bulan">Filter berdasarkan bulan:</label>
              <select class="custom-select" name="bulan" required="required">
                <option value="">Pilih Salah Satu</option>
                <?php 
                 $getKondektur = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                 join kondektur on trans_upn.id_driver = kondektur.id_kondektur group by month(tanggal) order by month(tanggal)"; 
                 $kondekturList = mysqli_query(connection(),$getKondektur);
              
                while($getKondektur = mysqli_fetch_array($kondekturList)): ?>
               <option value="<?php echo $getKondektur["bulan"]?>"><?php echo $getKondektur["bulan"]?></option>
                 <?php endwhile ?>
              </select>
            <button type="submit">filter</button>
            </form>
                    <form action="gajiKondektur.php" method="get">
                        <button type="submit">reset</button>
                    </form>
          <div>
            <table>
              <thead>
                <tr>
                  <th>id_kondektur</th>
                  <th>nama</th>
                  <th>jumlah_km</th>
                  <th>tanggal</th>
                  <th>bulan ke</th>
               
                  <th>gaji</th>
                
              </thead>
              <tbody>
                <?php 
                    $query="";
                  if (isset($_GET['bulan'])) {
                    $query = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                    join kondektur on trans_upn.id_driver = kondektur.id_kondektur where month(tanggal) = ".$_GET['bulan'] ." group by trans_upn.id_kondektur, month(tanggal);" ;               
                  } else {
                    $query = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                    join kondektur on trans_upn.id_driver = kondektur.id_kondektur group by trans_upn.id_kondektur, month(tanggal);";             
                }

                 
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td><?php echo $data['bulan'];  ?></td>
                    <td><?php echo $data['jumlah_km'] * 1500;  ?></td>                  
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

