<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Data bus</title>
    <style>
        .status_aktif {
            background-color: #29ab87;
            color: white;
        }
        .status_warning {
            background-color: #Ffff00;
        }
        .status_rusak {
            background-color: #Db1514;
        }
    </style>
  </head>

  <body>
    <h1>Bus Trans UPN</h1>
    <div>
      <div>
        <nav>
          <div>
            <ul style="margin-top:50px;">
              <li>
                <a href="index.php">Data Bus</a>
              </li>
              <li>
                <a href="driver.php">Data Driver</a>
              </li>
              <li>
                  <a href="trans_upn.php">Data Trans UPN</a>
              </li>
              <li>
                  <a href="kondektur.php">Data Kondektur</a>
              </li>
              <li>
                  <a href="tambahBus.php">Tambah Data</a>
              </li>
              <li>
                  <a href="gajikaryawan.php">Pendapatan Driver</a>
              </li>
              <li>
                  <a href="gajikondektur.php">Pendapatan Kondektur</a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='okay') {
                echo '<br><div> ID BUS berhasil di update</div>';
              }
              else if ($status=='error'){
                echo '<br><div role="alert"> ID BUS gagal di update</div>';
              }

            }
           ?>
            <?php  
                if (isset($_GET['status'])) {
                    $status_bus = $_GET['status'];
                    $queryBus = "SELECT * FROM bus WHERE 'status' = '$status'";
                } else {
                    $queryBus = "SELECT * FROM bus";
                }
                $hasil = mysqli_query(connection(), $queryBus);
            ?>
            <form action="" method="get">
                <select name="status" id="status" required>
                    <option value="">PILIH</option>
                    <option value="all">semua</option>
                    <option value="1">Beroperasi</option>
                    <option value="2">Cadangan</option>
                    <option value="0">Rusak</option>
                </select>
                <button type="submit">Pilih</button>
            </form>

          <h2 style="margin: 30px 0 30px 0;">TimeLine BUS Trans UPN</h2>
          <div>
            <table border="1" cellspacing = "0" width="1200px" align="center">
              <thead>
                <tr align="center">
                  <th>ID BUS</th>
                  <th>PLAT</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //menampilkan database
                  if (isset($_GET["status"])) {
                    $status = $_GET["status"];
                    if($status == "all") {
                        $query = "SELECT * FROM bus";
                    } else {
                        $query = "SELECT * FROM bus WHERE status = $status";
                    }
                } else {
                    $query = "SELECT * FROM bus";
                }
                $result = mysqli_query(connection(),$query);
            ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr align="center">
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td class="status_<?php if ($data['status'] == 1){ echo 'aktif';} elseif ($data['status'] == 2) { echo 'warning';} elseif ($data['status'] == 0){ echo 'rusak';} ?>">
                    <?php echo $data['status'];  ?></td>
                    <td>
                      <a href="<?php echo "updatebus.php?id=".$data['id_bus']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deletebus.php?id=".$data['id_bus']; ?>" class="btn btn-outline-warning btn-sm"> Delete</a>
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