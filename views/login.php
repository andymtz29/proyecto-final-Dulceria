<?php
if(isset($_SESSION['usuario'])){
    header("location:inicio");
    exit();
}
?>

<head>

    <link rel="stylesheet" href="<?=CSS.'login.css'?>">


    <style>
    h3 {
      font-family: 'Poppins', sans-serif;
      font-size: 45px;
      font-weight: 800; /* Letra gruesa */
      font-style: italic; /* Cursiva */
      color: black;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
      letter-spacing: 2px;
    }

    a {
      color: black; /* Hace que el enlace sea blanco */
      font-family: 'Poppins', sans-serif;
      font-size: 18px;
    }

    a span {
      font-weight: 700; /* Hace que la palabra 'Registrate' sea más gruesa */
    }

    a:hover {
      text-decoration: underline; /* Subraya el texto al pasar el ratón */
    }

    a:active, a:focus {
      color: black; /* Mantiene el color blanco al hacer clic */
      text-decoration: none; /* Evita el subrayado al hacer clic */
      outline: none; /* Elimina el borde de enfoque */
    }
  </style>
</head>
<body>
    <div class="login-background">
        <form id="frm_login" class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-4 login-box shadow-lg rounded">
                    <div class="text-center py-4">
                        <h3 class="text-light mb-3">Login</h3>
                        <img src="<?=IMG."user.png"?>" class="mx-auto d-block rounded-circle border border-primary"
                             width="50%" alt="Login">
                    </div>
                    <div class="px-4 pb-4">

                            <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="rol" name="rol" placeholder="Rol">
                        <label for="usuario"><i class="fa-solid fa-user-shield me-2"></i>Rol (Administrador o Usuario)</label>
                    </div>

                        <div class="form-floating mb-3">
                            <input class="form-control border-primary" id="usuario" name="usuario" type="text" 
                                   placeholder="e-mail" required onfocus="this.placeholder=''" onblur="this.placeholder='e-mail'">
                            <label class="text-secondary" for="usuario">
                                <i class="fa-solid fa-user me-2"></i>e-mail
                            </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input id="password" name="password" type="password" class="form-control border-primary"
                                   placeholder="Password" required onfocus="this.placeholder=''" onblur="this.placeholder='Password'">
                            <label class="text-secondary" for="password">
                                <i class="fa-solid fa-key me-2"></i>Password
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 mb-3" type="button" id="btn_iniciar">
                            <i class="fa-solid fa-right-to-bracket me-2"></i>Iniciar sesión
                        </button>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="./public/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>

