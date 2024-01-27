<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Haryanto | Autotuning</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    
  <!-- PHP Include -->  
  <?php include 'modal.php'; ?>
  <!-- PHP Include -->

    <!-- Header -->
    <header>
        <h1>Haryanto | Autotuning</h1>
    </header>
    <!-- /Header -->

    <main>
      <!-- Hero Content -->
      <section class="hero" data-aos="fade-up">
        <div class="container">
          <h1>HARYANTO | AUTOTUNING</h1>
            <center>
              <p>
                Salam sejahtera! Kami mengucapkan selamat datang di Bengkel Mobil
                Terbaik di kota ini. Percayakan kendaraan Anda kepada kami!
              </p>
            </center>
            <div class="button-group">
              <button type="button" class="btn" data-toggle="modal" data-target="#form_layanan">
                  Service Sekarang
              </button>
              <button type="button" class="btn-special" data-toggle="modal" data-target="#dataModal">
                  Lihat Antrian
              </button>
            </div>
        </div>
      </section>
      <!-- /Hero Content -->
      
      <!-- Body Content -->
      <section
        class="features"
        data-aos="zoom-in-up"
        data-aos-once="true"
        data-aos-duration="1200"
      >
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="feature">
                <img src="./images/1.jpg" alt="Icon 1" />
                <h2>Service Rutin</h2>
                <p>
                  Kami menyediakan layanan perawatan dan service rutin untuk
                  mobil Anda.
                </p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Lihat Selengkapnya
                </button>
              </div>
            </div>
            <div class="col-md-4">
              <div class="feature">
                <img src="./images/2.jpg" alt="Icon 2" />
                <h2>Perbaikan Mesin</h2>
                <p>
                  Kami memiliki mekanik yang ahli dalam perbaikan mesin mobil.
                </p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                    Lihat Selengkapnya
                </button>
              </div>
            </div>
            <div class="col-md-4">
              <div class="feature">
                <img src="./images/3.jpg" alt="Icon 3" />
                <h2>Ganti Oli</h2>
                <p>
                  Kami menggunakan oli berkualitas tinggi untuk mengganti oli
                  mobil Anda.
                </p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
                    Lihat Selengkapnya
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Body Content -->
    </main>
    
    <!-- Footer Content -->
    <footer>
      <div class="container">
        <p>&copy; 2023 PT HARYANTO BERKAH ABADI</p>
      </div>
    </footer>
    <!-- /Footer Content -->

    <!-- AOS Init -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- /AOS Init -->
    
    <!-- Modal Init -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- /Modal Init -->
  </body>
</html>
