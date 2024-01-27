<?php
    $conn = mysqli_connect('localhost','root','','service_database');
?>

<!-- Modal for pekerjan-->
<div class="modal fade" id="kerjaModal" tabindex="-1" role="dialog" aria-labelledby="kerjaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kerjaModalLabel">Kerja Admin Servis dan Bengkel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Isi dari kerja admin servis dan bengkel.</p>
        <p>Anda dapat menampilkan informasi, tabel, atau gambar terkait kerja admin servis dan bengkel di sini.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal for pekerjan-->

<!-- Modal for input user-->
<div class="modal fade" id="form_layanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="myModalLabel">Masukkan Data Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="process/submit_admin_process.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="owner_name">Nama Pemilik</label>
            <input type="text" class="form-control" id="owner_name" name="nama_pemilik" placeholder="Masukkan Nama Pemilik">
          </div>
          <div class="form-group">
            <label for="license_plate">Nomor Plat</label>
            <input type="text" class="form-control" id="license_plate" name="nomor_plat" placeholder="Masukkan Nomor Plat">
          </div>
          <div class="form-group">
            <label for="service_type">Jenis Layanan</label>
            <select class="form-control" id="service_type" name="jenis_layanan">
              <?php
                $cari = "SELECT * FROM `service_list` where status = 1 order by `service` asc";
                $hasil_cari = mysqli_query($conn, $cari);
                while ($data = mysqli_fetch_array($hasil_cari)) {
                  echo "<option value='" . $data['service'] . "'>" . $data['service'] . "</option>";
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <textarea class="form-control" id="address" name="alamat" placeholder="Masukkan Alamat Lengkap"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-lg" id="submit_btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal for input user-->

<!-- Modal for input transaksi -->
<div class="modal fade" id="form_transaksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="myModalLabel">Masukkan Data Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="process/submit_admin_transaksi_process.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="transaksi_id">ID Transaksi</label>
            <input type="text" class="form-control" id="transaksi_id" name="id_transaksi" placeholder="Masukkan ID Transaksi">
          </div>
          <div class="form-group">
            <label for="transaksi_nomor_plat">Nomor Plat</label>
            <input type="text" class="form-control" id="transaksi_nomor_plat" name="user_nomor_plat" placeholder="Masukkan Nomor Plat">
          </div>
          <div class="form-group">
            <label for="transaksi_tanggal">Tanggal</label>
            <input type="date" class="form-control" id="transaksi_tanggal" name="tanggal">
          </div>
          <div class="form-group">
            <label for="transaksi_keterangan">Keterangan</label>
            <textarea class="form-control" id="transaksi_keterangan" name="keterangan" placeholder="Masukkan Keterangan"></textarea>
          </div>
          <div class="form-group">
            <label for="transaksi_status">Status</label>
            <select class="form-control" id="service_type" name="status">
              <?php
                $cari = "SELECT * FROM `transaksi` order by `status` asc";
                $hasil_cari = mysqli_query($conn, $cari);
                while ($data = mysqli_fetch_array($hasil_cari)) {
                  echo "<option value='" . $data['status'] . "'>" . $data['status'] . "</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-lg" id="submit_transaksi_btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal for input transaksi -->

<!-- Modal for input service -->
<div class="modal fade" id="form_service" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="myModalLabel">Masukkan Data Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="process/submit_admin_service_process.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="service_id">ID Service</label>
            <input type="text" class="form-control" id="service_id" name="id_service" placeholder="Masukkan ID Service">
          </div>
          <div class="form-group">
            <label for="service_name">Nama Service</label>
            <input type="text" class="form-control" id="service_name" name="service" placeholder="Masukkan Nama Service">
          </div>
          <div class="form-group">
            <label for="service_status">Status</label>
            <select class="form-control" id="service_status" name="status">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
          <div class="form-group">
            <label for="service_price">Harga</label>
            <input type="number" class="form-control" id="service_price" name="harga" placeholder="Masukkan Harga">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-lg" id="submit_service_btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal for input service -->

<!-- Modal for input karyawan -->
<div class="modal fade" id="form_karyawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="myModalLabel">Masukkan Data Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="process/submit_karyawan_process.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="karyawan_id">ID Karyawan</label>
            <input type="text" class="form-control" id="karyawan_id" name="id_karyawan" placeholder="Masukkan ID Karyawan">
          </div>
          <div class="form-group">
            <label for="karyawan_nama">Nama Karyawan</label>
            <input type="text" class="form-control" id="karyawan_nama" name="nama_karyawan" placeholder="Masukkan Nama Karyawan">
          </div>
          <div class="form-group">
            <label for="karyawan_posisi">Posisi Karyawan</label>
            <input type="text" class="form-control" id="karyawan_posisi" name="posisi_karyawan" placeholder="Masukkan Posisi Karyawan">
          </div>
          <div class="form-group">
            <label for="karyawan_gaji">Gaji Karyawan</label>
            <input type="number" class="form-control" id="karyawan_gaji" name="gaji_karyawan" placeholder="Masukkan Gaji Karyawan">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-lg" id="submit_karyawan_btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal for input karyawan -->
