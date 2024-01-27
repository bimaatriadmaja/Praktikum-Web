    <?php
        $conn = mysqli_connect('localhost','root','','service_database');
    ?>
    <!-- Modal for service rutin-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title font-weight-bold" id="myModalLabel">Service Rutin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Kami menyediakan layanan perawatan dan service rutin untuk mobil Anda. Layanan kami mencakup pemeriksaan rutin, penggantian oli, pemeriksaan sistem kelistrikan, dan masih banyak lagi. Tim ahli kami akan memastikan mobil Anda dalam kondisi optimal dan siap untuk digunakan.
            </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- /Modal for service rutin-->

    <!-- Modal for perbaikan mesin-->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title font-weight-bold" id="myModalLabel">Perbaikan Mesin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Kami memiliki mekanik yang ahli dalam perbaikan mesin mobil. Layanan kami mencakup perbaikan mesin, pemeliharaan, dan penggantian komponen mesin yang rusak. Tim ahli kami akan memberikan solusi terbaik untuk memastikan mesin mobil Anda berjalan dengan baik dan kembali dalam kondisi optimal.
            </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- /Modal for perbaikan mesin-->

    <!-- Modal for ganti oli-->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title font-weight-bold" id="myModalLabel">Ganti Oli</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Kami juga menyediakan layanan penggantian oli untuk menjaga kinerja mesin mobil Anda tetap optimal. Dengan penggantian oli secara teratur, kami dapat memastikan bahwa mesin mobil Anda terlindungi dan berfungsi dengan baik. Tim mekanik yang ahli kami akan menangani proses penggantian oli dengan hati-hati dan menggunakan oli berkualitas tinggi untuk memberikan performa terbaik pada mesin mobil Anda.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /Modal for ganti oli-->

      <!-- Modal for pemesanan-->
      <div class="modal fade" id="form_layanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="myModalLabel">Formulir Data Kendaraan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="./admin/process/submit_process.php" method="POST">
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
            <button type="button" class="btn-warning btn-lg" data-dismiss="modal">Close</button>
            <button type="submit" class="btn-primary btn-lg" id="submit_btn">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Modal for pemesanan-->

    <!-- Modal for antrean-->
    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="dataModalLabel">Detail Service Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th>No Transaksi</th>
                  <th>Nama</th>
                  <th>Nomor Plat</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $cari = "SELECT transaksi.id_transaksi, user.nama_pemilik, transaksi.user_nomor_plat, transaksi.tanggal, transaksi.status
                        FROM transaksi
                        JOIN user ON transaksi.user_nomor_plat = user.nomor_plat";

                $hasil_cari = mysqli_query($conn, $cari);
                while ($data = mysqli_fetch_array($hasil_cari)) {
                    echo "<tr>";
                    echo "<td>" . $data['id_transaksi'] . "</td>";
                    echo "<td>" . $data['nama_pemilik'] . "</td>";
                    echo "<td>" . $data['user_nomor_plat'] . "</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    $status = $data['status'];
                    $buttonClass = $status == 'Belum Bayar' ? 'btn-danger' : 'btn-primary';
                    echo "<td><center><button class='$buttonClass'>" . $data['status'] . "</center></button></td>";
                    echo "</tr>";
                    echo "</tr>";
                }
              ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modal for antrean-->