<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Abel OSH">
    <meta name="theme-color" content="#009688">
    <link rel="shortcut icon" href="<?= media();?>/images/favicon.ico">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/style.css">
    <title><?= $data['page_tag']; ?></title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="register-content">
        <div class="logo">
            <h1><?= $data['page_title']; ?></h1>
        </div>
        <div class="register-box">
            <div id="divLoading">
                <div>
                    <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
                </div>
            </div>
            <form class="register-form" name="formRegistro" id="formRegistro" action="" method="post">
                <h3 class="register-head"><i class="fa fa-lg fa-fw fa-user"></i> REGÍSTRATE</h3>
                <div class="form-group">
                    <label class="control-label">Nombres:</label>
                    <input id="txtNombres" name="txtNombres" class="form-control" type="text" placeholder="Nombres"
                        autofocus required>
                </div>
                <div class="form-group">
                    <label class="control-label">Apellidos:</label>
                    <input id="txtApellidos" name="txtApellidos" class="form-control" type="text"
                        placeholder="Apellidos" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Celular:</label>
                    <input id="txtCelular" name="txtCelular" class="form-control" type="text" placeholder="Celular"
                        required>
                </div>
                <div class="form-group">
                    <label class="control-label">Correo Electronico:</label>
                    <input id="txtEmailUser" name="txtEmailUser" class="form-control" type="email"
                        placeholder="Correo electrónico" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Contraseña:</label>
                    <input id="txtClave" name="txtClave" class="form-control" type="password" placeholder="Contraseña"
                        required>
                </div>
                <div class="form-group">
                    <label class="control-label">Confirmar Contraseña:</label>
                    <input id="txtClaveConfirm" name="txtClaveConfirm" class="form-control" type="password"
                        placeholder="Confirmar Contraseña" required>
                </div>
                <div id="alertLogin" class="text-center"></div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i>
                        Registrar</button>
                </div>
            </form>
        </div>
    </section>
    <script>
    const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/fontawesome.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="<?= media();?>/js/plugins/sweetalert.min.js"></script>
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
</body>

</html>