<?php 

class Register extends Controllers {
    public function __construct() {
        session_start();
        if (isset($_SESSION['login'])) {
            header('Location: ' . base_url() . '/dashboard');
            die();
        }
        parent::__construct();
    }

    public function register() {
        $data['page_tag'] = "Registro - Tienda Virtual";
        $data['page_title'] = "Tienda Virtual";
        $data['page_name'] = "login";
        $data['page_functions_js'] = "functions_register.js";
        $this->views->getView($this, "register", $data);
    }

    public function registro() {
        error_reporting(0);
        if ($_POST) {
            if (empty($_POST['txtNombres']) || empty($_POST['txtApellidos']) || empty($_POST['txtCelular']) || empty($_POST['txtEmailUser']) || empty($_POST['txtClave']) || empty($_POST['txtClaveConfirm'])) {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            } else {
                $strNombre = ucwords(strClean($_POST['txtNombres']));
                $strApellido = ucwords(strClean($_POST['txtApellidos']));
                $intTelefono = intval(strClean($_POST['txtCelular']));
                $strEmail = strtolower(strClean($_POST['txtEmailUser']));
                $strClave = $_POST['txtClave'];
                $strClaveConfirm = $_POST['txtClaveConfirm'];

                if ($strClave !== $strClaveConfirm) {
                    $arrResponse = array("status" => false, "msg" => 'Las contraseñas no coinciden.');
                } else {
                    $strPasswordEncript = hash("SHA256", $strClave);
                    $intTipoId = RCLIENTES; // Tipo de usuario

                    $request_user = $this->model->insertCliente($strNombre, $strApellido, $intTelefono, $strEmail, $strPasswordEncript, $intTipoId);

                    if ($request_user > 0) {
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                        $nombreUsuario = $strNombre . ' ' . $strApellido;
                        $dataUsuario = array('nombreUsuario' => $nombreUsuario,
                                             'email' => $strEmail,
                                             'password' => $strClave,
                                             'asunto' => 'Bienvenido a tu tienda en línea');
                        $_SESSION['idUser'] = $request_user;
                        $_SESSION['login'] = true;
                        $this->login->model->sessionLogin($request_user);
                        sendEmail($dataUsuario, 'email_bienvenida');
                    } else if ($request_user == 'exist') {
                        $arrResponse = array('status' => false, 'msg' => '¡Atención! el email ya existe, ingrese otro.');
                    } else {
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
?>