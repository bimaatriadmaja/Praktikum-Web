<!DOCTYPE html>
<html lang="en">

<?php
    $conn = mysqli_connect('localhost','root','','service_database');
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Service Mobil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<!-- PHP Include -->  
    <?php include 'modalAdmin.php'; ?>
<!-- /PHP Include -->

<!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand"><i class="fas fa-car"></i> Haryanto | Autotuning - Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="process/logout_process.php" style="background-color: #ffcc00; color: #333; padding: 5px 20px; border-radius: 5px; font-weight: bold; text-transform: uppercase;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>
<!-- /navbar -->

<!-- body -->
  <div class="container mt-4">
    <!-- jumbotron -->
    <div class="jumbotron text-center">
      <h1 class="display-4">Welcome, Admin</h1>
        <p class="lead">Manage and monitor your service mobil platform with ease!</p>
      <hr class="my-4">
        <p>Get insights, track performance, and optimize your services.</p>
      <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#kerjaModal" role="button">Learn more</a>
    </div>
    <!-- /jumbotron -->

    <!-- user table -->
    <div class="row mt-4">
      <div class="col-md-12">
        <h3>Users</h3>
        <button class="btn btn-primary" data-toggle="modal" data-target="#form_layanan"><i class="fas fa-plus"></i> insert</button>
        <br>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Nomor Plat</th>
                <th>Jenis Layanan</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                // Fetch data from MySQL
                $query = "SELECT * FROM user";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) :
                    $nama_pemilik = $row['nama_pemilik'];
                    $nomor_plat = $row['nomor_plat'];
                    $jenis_layanan = $row['jenis_layanan'];
                    $alamat = $row['alamat'];

                echo "
                <tr>
                    <td>$nama_pemilik</td>
                    <td>$nomor_plat</td>
                    <td>$jenis_layanan</td>
                    <td>$alamat</td>
                    <td>
                    <button class='btn btn-warning' data-toggle='modal' data-target='#edit_user_modal" . $row['nomor_plat'] . "'><i class='fas fa-edit'></i> Edit</button>
                    <button class='btn btn-danger' data-toggle='modal' data-target='#delete_user_modal" . $row['nomor_plat'] . "'><i class='fas fa-trash-alt'></i> Delete</button>
                    </td>
                </tr>";
                ?> 

                <!-- Modal for edit user -->
                    <div class="modal fade" id="edit_user_modal<?= $nomor_plat ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold" id="editUserModalLabel">Edit Data Pelanggan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="process/update_admin_process.php" method="POST">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_owner_name">Nama Pemilik</label>
                                <input type="text" class="form-control" id="edit_owner_name" name="nama_pemilik" value="<?= $row['nama_pemilik']?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_license_plate">Nomor Plat</label>
                                <input type="text" class="form-control" id="edit_license_plate" name="nomor_plat" value="<?= $row['nomor_plat']?>">
                            </div>
                            <div class="form-group">
                                <label for="edit_service_type">Jenis Layanan</label>
                                <select class="form-control" id="service_type" name="jenis_layanan">
                                    <option value="<?= $row['jenis_layanan']?>"><?= $row['jenis_layanan']?></option>
                                    <option value="Ganti Oli">Ganti Oli</option>
                                    <option value="Perbaikan Mesain">Perbaikan Mesin</option>
                                    <option value="Service Rutin">Service Rutin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_address">Alamat</label>
                                <textarea class="form-control" id="edit_address" name="alamat"><?= $row['alamat']?></textarea>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" id="edit_user_id" name="user_id">
                            <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-lg" id="edit_submit_btn">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                <!-- /Modal for edit user -->

                <!-- Modal for delete user -->
                <div class="modal fade" id="delete_user_modal<?= $nomor_plat ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-top" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold" id="editUserModalLabel">Konfirmasi Hapus Data Pelanggan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="process/delete_admin_process.php" method="POST">
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda yakin akan menghapus data ini <br>
                                        <span class="text-danger"><?= $nomor_plat ?> - <?= $nama_pemilik ?></span>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="nomor_plat" value="<?= $nomor_plat ?>">
                                    <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger btn-lg" id="delete_submit_btn">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Modal for delete user -->
                
            <?php endwhile; ?>  
            </tbody>
          </table>
        </div>
      </div>
      <!-- /user table -->

      <!-- service table -->
      <div class="col-md-12">
        <h3>Services</h3>
        <button class="btn btn-primary" data-toggle="modal" data-target="#form_service"><i class="fas fa-plus"></i> insert</button>
        <br>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID Service</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                // Fetch data from MySQL
                $query = "SELECT * FROM service_list";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) :
                    $id_service = $row['id_service'];
                    $service = $row['service'];
                    $harga = $row['harga'];

                echo "
                <tr>
                    <td>$id_service</td>
                    <td>$service</td>
                    <td>Rp. $harga</td>
                    <td>
                    <button class='btn btn-warning' data-toggle='modal' data-target='#edit_user_modal'><i class='fas fa-edit'></i> Edit</button>
                    <button class='btn btn-danger'><i class='fas fa-trash-alt'></i> Delete</button>
                    </td>
                </tr>";
                ?>

                <?php endwhile; ?>  
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /service table -->

    <!-- karyawan table -->
    <div class="row mt-4">
      <div class="col-md-12">
        <h3>Karyawan</h3>
        <button class="btn btn-primary" data-toggle="modal" data-target="#form_karyawan"><i class="fas fa-plus"></i> insert</button>
        <br>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID Karyawan</th>
                <th>Nama</th>
                <th>Posisi Karyawan</th>
                <th>Gaji</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                // Fetch data from MySQL
                $query = "SELECT * FROM karyawan";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) :
                    $id_karyawan = $row['id_karyawan'];
                    $nama_karyawan = $row['nama_karyawan'];
                    $posisi_karyawan = $row['posisi_karyawan'];
                    $gaji_karyawan = $row['gaji_karyawan'];

                echo "
                <tr>
                    <td>$id_karyawan</td>
                    <td>$nama_karyawan</td>
                    <td>$posisi_karyawan</td>
                    <td>$gaji_karyawan</td>
                    <td>
                    <button class='btn btn-warning' data-toggle='modal' data-target='#edit_karyawan_modal" . $row['id_karyawan'] . "'><i class='fas fa-edit'></i> Edit</button>
                    <button class='btn btn-danger' data-toggle='modal' data-target='#delete_karyawan_modal" . $row['id_karyawan'] . "'><i class='fas fa-trash-alt'></i> Delete</button>
                    </td>
                </tr>";
                ?>

                <!-- Modal for edit karyawan -->
                <div class="modal fade" id="edit_karyawan_modal<?= $id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="editKaryawanModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="editKaryawanModalLabel">Edit Data Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="process/update_karyawan_process.php" method="POST">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="edit_karyawan_id">ID Karyawan</label>
                            <input type="text" class="form-control" id="edit_karyawan_id" name="id_karyawan" value="<?= $id_karyawan ?>">
                          </div>
                          <div class="form-group">
                            <label for="edit_karyawan_nama">Nama Karyawan</label>
                            <input type="text" class="form-control" id="edit_karyawan_nama" name="nama_karyawan" value="<?= $nama_karyawan ?>">
                          </div>
                          <div class="form-group">
                            <label for="edit_karyawan_posisi">Posisi Karyawan</label>
                            <input type="text" class="form-control" id="edit_karyawan_posisi" name="posisi_karyawan" value="<?= $posisi_karyawan ?>">
                          </div>
                          <div class="form-group">
                            <label for="edit_karyawan_gaji">Gaji Karyawan</label>
                            <input type="number" class="form-control" id="edit_karyawan_gaji" name="gaji_karyawan" value="<?= $gaji_karyawan ?>">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary btn-lg" id="edit_karyawan_submit_btn">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /Modal for edit karyawan -->

                <!-- Modal for delete karyawan -->
                <div class="modal fade" id="delete_karyawan_modal<?= $id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="deleteKaryawanModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-top" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="deleteKaryawanModalLabel">Konfirmasi Hapus Data Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="process/delete_karyawan_process.php" method="POST">
                        <div class="modal-body">
                          <h5 class="text-center">Apakah anda yakin akan menghapus data ini <br>
                            <span class="text-danger"><?= $id_karyawan ?> - <?= $nama_karyawan ?></span>
                          </h5>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_karyawan" value="<?= $id_karyawan ?>">
                          <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger btn-lg" id="delete_karyawan_submit_btn">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /Modal for delete karyawan -->

                <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /karyawan table -->

      <!-- transaksi table -->
      <div class="col-md-12">
        <h3>Pengaturan Transaksi</h3>
        <button class="btn btn-primary" data-toggle="modal" data-target="#form_transaksi"><i class="fas fa-plus"></i> insert</button>
        <br>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID Transaksi</th>
                <th>Nomor Plat</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                // Fetch data from MySQL
                $query = "SELECT * FROM transaksi";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $id_transaksi = $row['id_transaksi'];
                    $user_nomor_plat = $row['user_nomor_plat'];
                    $tanggal = $row['tanggal'];
                    $keterangan = $row['keterangan'];
                    $status = $row['status'];

                echo "
                <tr>
                    <td>$id_transaksi</td>
                    <td>$user_nomor_plat</td>
                    <td>$tanggal</td>
                    <td>$status</td>
                    <td>
                    <button class='btn btn-warning'><i class='fas fa-edit'></i> Edit</button>
                    <button class='btn btn-danger'><i class='fas fa-trash-alt'></i> Delete</button>
                    </td>
                </tr>";
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /transaksi table -->
    </div>
  </div>  

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>

