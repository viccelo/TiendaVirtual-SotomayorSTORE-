<?php 

	class RegisterModel extends Mysql
	{

		public function __construct()
		{
			parent::__construct();
		}	

		public function insertCliente(string $nombre, string $apellido, int $telefono, string $email, string $password, int $tipoid) {
            $this->con = new Mysql();
            $this->strNombre = $nombre;
            $this->strApellido = $apellido;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strPassword = $password;
            $this->intTipoId = $tipoid;
    
            $return = 0;
            $sql = "SELECT * FROM persona WHERE email_user = '{$this->strEmail}'";
            $request = $this->con->select_all($sql);
    
            if (empty($request)) {
                $query_insert = "INSERT INTO persona(nombres, apellidos, telefono, email_user, password, rolid) VALUES(?,?,?,?,?,?)";
                $arrData = array($this->strNombre, $this->strApellido, $this->intTelefono, $this->strEmail, $this->strPassword, $this->intTipoId);
                $request_insert = $this->con->insert($query_insert, $arrData);
                $return = $request_insert;
            } else {
                $return = "exist";
            }
            return $return;
        }

        public function sessionLogin(int $iduser){
			$this->intIdUsuario = $iduser;
			//BUSCAR ROLE 
			$sql = "SELECT p.idpersona,
							p.identificacion,
							p.nombres,
							p.apellidos,
							p.telefono,
							p.email_user,
							p.nit,
							p.nombrefiscal,
							p.direccionfiscal,
							r.idrol,r.nombrerol,
							p.status 
					FROM persona p
					INNER JOIN rol r
					ON p.rolid = r.idrol
					WHERE p.idpersona = $this->intIdUsuario";
			$request = $this->select($sql);
			$_SESSION['userData'] = $request;
			return $request;
		}

	}
 ?>