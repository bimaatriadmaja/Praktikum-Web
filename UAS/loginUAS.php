<!DOCTYPE html>
<html>
    <head>
        <title>DATA BASE </title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
            
            * {
                box-sizing: border-box;
            }

            body {
                font-family: "Poppins", sans-serif;
                height: 100vh;
                margin: 0;
                padding: 0;
                background: linear-gradient(#30475e , #95a5a6 );
            }
            
            .container {
                max-width: 800px;
                margin: 0 auto;
                position: relative;
                padding: 20px;
            }
            
            .header {
                text-align: center;
                margin-bottom: 20px;
                padding-top: 20px;
            }
            
            .header h1 {
                color: #fff;
                margin: 0;
                font-size: 28px;
            }

            .footer {
                text-align: center;
                color: #fff;
                margin-top: 20px;
                padding-top: 10px;
            }
            
            .login_form {
                width: 400px;
                margin: 0 auto;
                margin-top: 30px;
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 5px;
            }
            
            table {
                width: 100%;
            }
            
            td {
                padding: 10px;
            }
            
            input[type="text"],
            input[type="password"] {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            
            input[type="submit"] {
                width: 100%;
                padding: 8px;
                border: none;
                border-radius: 3px;
                font-weight: bold;
                background: linear-gradient(#30475e , #95a5a6 );
                color: #fff;
                cursor: pointer;
            }
            
            input[type="submit"]:hover {
                background-color:( #30475e , #95a5a6 );
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="header">
                <h1>Login</h1>
            </header>
            
            <form class='login_form' action="loginprosesUAS.php" method="post">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="text" name="password" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" required></td>
                    </tr>
                </table>
            </form>
            
            <footer class="footer">        
            Terima kasih telah menggunakan layanan ini!
            </footer>
        </div>
    </body>
</html>
