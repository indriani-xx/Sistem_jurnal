<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | SMK Negeri 1 Sukawati</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Story+Script&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <!-- Header -->
        <header id="header">
            <div class="container header-container">
                <a href="index.php" class="logo">CodeX<span>.</span></a>
                <div class="hamburger" id="hamburger"></div>
            </div>
        </header>

        <!-- Login Section -->
        <section class="login-container">
            <div class="login-left">
                <h1>WELCOME!</h1>
                <p>Silahkan login untuk masuk</p>
            </div>

            <div class="login-right">
                <div class="login-form-container">
                    <h2>Masuk ke Akun</h2>
                    <p>Silakan masuk dengan kredensial Anda</p>

                  

                    <form action="proses_login.php" method="post" class="login-form">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                placeholder="Masukkan username Anda"
                                required="required">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan password Anda"
                                required="required">
                        </div>

                        <button type="submit" class="btn-login">Masuk</button>

                        <a href="#" class="forgot-password">Lupa password?</a>

                        <div class="divider">
                            <span>ATAU</span>
                        </div>

                        <p style="text-align: center; font-size: 14px;">
                            Butuh bantuan? Hubungi admin di
                            <a href="mailto:admin@smkn1sukawati.sch.id" style="color: #3498db;">admin@smkn1sukawati.sch.id</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>