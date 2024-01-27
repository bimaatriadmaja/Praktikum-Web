<?php
    session_start();
    $login = $_SESSION['login'];
    if ($login == 1) {
    include "koneksiUAS.php";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DATA BASE</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
            
            /* Awal Kode untuk Keseluruhan HTML */
            * {
                box-sizing: border-box;
                color: #fff;
            }

            /* Awal Kode untuk bagian body */
            body {
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(#30475e , #95a5a6 );
            }

            /* Awal Kode untuk Bagian Navigation Bar*/
            header.navbar-container {
                width: 100%;
                margin-inline: auto;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                padding: 30px 100px;
                z-index: 10000;
            }
            header.navbar-container .nav-list ul {
                flex-wrap: wrap;
                display: flex;
                gap: 0.5rem;
            }
            header.navbar-container .nav-list li {
                list-style-type: none;
            }
            header.navbar-container .nav-list li a {
                text-decoration: none;
                font-size: 1.5rem;
                font-weight: 500;
                padding: .5rem 1.5rem;
                border-radius: 800px;
                transition: all .2s ease-in-out;
            }
            header.navbar-container .nav-list li:hover a {
                color: #493858e2;
                background-color: #fff;
            }

            /* Awal Kode untuk Table User */
            th, td {
                text-align: center;
                align-items: center;
                padding: 8px;
                text-align: center;
                border-bottom: 1px solid #ddd;
            }
            .table_container {
                margin: 20px 100px;
                border-radius: 20px;
                border: 2px solid;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            }
            .table_container h2 {
                text-align: center;
                margin: 15px 0 15px 0px;
            }
        
            /* Kode untuk Mengedit Kelas Jumbotron untuk Identifikasi Status User */
            .jumbotron  {
                display: flex;
                flex-direction: column;
                align-items: left;
                
                padding: 20px;
                margin-left: 100px;
                margin-right: 100px;

                font-size: 30px;
            }
            .jumbotron h2, p {
                margin: 10px;
            }
            .jumbotron p span {
                border-radius: 10px;
                padding: 0px 10px 0px 10px;
                background-color: #30475e , #95a5a6 ;
                color: #F8B185 ,#6C5B7B;
                display: inline-block;
            }

            /*Akhir Kode untuk Bagian anti-jumbotron*/
            body .anti-jumbotron {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                gap: 1rem 2rem;
                padding: 20px 100px;
            }
            body .anti-jumbotron .card {
                display: flex;
                flex-direction: column;
                align-items: center;

                width: 30%;
                gap: 1rem;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

                border: 2px solid;
                border-radius: 20px;
                padding: 20px;
            }
            body .anti-jumbotron .card_kamar {
                display: flex;
                flex-direction: column;
                align-items: center;

                width: 75%;
                gap: 1rem;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

                border: 2px solid;
                border-radius: 20px;
                padding: 10px 70px 30px 70px;
            }

            /* Awal Kode untuk Table Transaksi */
            .table_transaksi {
                border-top: 1px solid #ddd;
                color: transparent !important;
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
                font-size: 25px;
                padding: 20px 50px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php
            $nama = $_SESSION['nama'];
            $status = $_SESSION['status'];
        ?>
        
        <?php
            $status = $_SESSION['status'];
            if ($status == "Administrator") {
                include "menuUAS.php";
            }
            // if ($status == "Member") {
            //     include "menu_member.php";
            // }
         ?>
    </body>
</html>

<?php
    } else {
        include "loginUAS.php";
    }
?>