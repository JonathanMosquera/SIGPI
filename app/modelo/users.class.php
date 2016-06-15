<?php
class Users
{
	
    private static $instancia;
    private $dbh;
	public $data;

    private function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
            $this->dbh->exec("SET CHARACTER SET utf8");
			$this ->dbh->query("SET NAMES 'utf8'");
			 $this->data = array();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }


		 //*****************************************************************
    // LISTAMOS TODO EL PERSONAL
    //*****************************************************************
    public function personal(){
		
		try{
        $query = $this->dbh->prepare("SELECT
            personas.Per_Id,
            personas.Per_Nombre,
            personas.Per_Apellido,
            personas.Per_Rol,
            personas.Per_Correo,
            personas.Per_Genero,
            personas.Per_Celular,
			personas.Per_Usuario,
            personas.Per_Contrasena,
			personas.Per_Perfil
            FROM
            personas
            ");

		$query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();

		}
    }



    public function get_usuarios()
    {
        try {
            $query = $this->dbh->prepare('select * from personas');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
        
    }


	//*****************************************************************
    // PERSONAL POR ID
    //*****************************************************************
    public function personalPorId($id){
		
		try{
       
            $query = $this->dbh->prepare('select * from personas where Per_Id = ?');
            $query->bindParam(1, $id);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
  
        }catch (PDOException $e) {
            $e->getMessage();

		}
    }
	
	public function insert_admin()
    {
            $sql="insert into personas values(?,?,?,'ADMINISTRADOR','No Disponible',?,?,?,?,?,?,'../../proyectos/users/fotos/default.png')";
			
			$query=$this->dbh->prepare($sql);
			
			$query->bindParam(1, $idn);
			$query->bindParam(2, $nom);
            $query->bindParam(3, $ape);
            $query->bindParam(4, $mail);
			$query->bindParam(5, $gen);
            $query->bindParam(6, $cel);
            $query->bindParam(7, $user);
			$query->bindParam(8, $pass);
            $query->bindParam(9, $perfil);
			
			$idn=strip_tags($_POST["identi"]);
			$nom=strip_tags($_POST["nombres"]);
			$ape=strip_tags($_POST["apellidos"]);
			$mail=strip_tags($_POST["email"]);
			$gen=strip_tags($_POST["genero"]);
			$cel=strip_tags($_POST["celular"]);
			$user=strip_tags($_POST["usuario"]);
			$pass=strip_tags($_POST["contrasena"]);
			$perfil=strip_tags($_POST["perfil"]);			
           
            $query->execute();
			header("Location: Inicio_Sesion.php?m=4#tologin");
            $this->dbh = null;
    }

 public function boton_admin(){
		
		try{
       

	   
            $query = $this->dbh->prepare('select * from personas where Per_Rol = "ADMINISTRADOR" ');
			$query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
  
        }catch (PDOException $e) {
            $e->getMessage();

		}
    }


   /* public function get_usuarios()
    {
        try {
            $query = $this->dbh->prepare('select * from personas');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }*/

     public function delete_usuario($id)
    {
        try {
            $query = $this->dbh->prepare('delete from personas where Per_Id = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }
    public function insert_usuario($ide,$nombre,$apellido,$rol,$correo,$genero,$celular,$usuario,$contrasena,$perfil)
    {
        try {
            $query = $this->dbh->prepare('insert into personas values(?,?,?,?,"No Disponible",?,?,?,?,?,?,"../../proyectos/users/fotos/default.png")');
            $query->bindParam(1, $ide);
			$query->bindParam(2, $nombre);
            $query->bindParam(3, $apellido);
            $query->bindParam(4, $rol);
			$query->bindParam(5, $correo);
            $query->bindParam(6, $genero);
            $query->bindParam(7, $celular);
			$query->bindParam(8, $usuario);
            $query->bindParam(9, $contrasena);
            $query->bindParam(10, $perfil);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
	
	
	
    public function update_usuario($id,$nombre,$apellido,$rol,$correo,$genero,$celular,$usuario,$contrasena,$perfil)
    {
        try {
            $query = $this->dbh->prepare('update personas SET Per_Nombre = ?, Per_Apellido = ?, Per_Rol = ?, Per_Correo = ?, Per_Genero = ?, Per_Celular = ?, Per_Usuario = ?, Per_Contrasena = ?, Per_Perfil = ?  WHERE Per_Id = ?');
             $query->bindParam(1, $nombre);
            $query->bindParam(2, $apellido);
            $query->bindParam(3, $rol);
			$query->bindParam(4, $correo);
            $query->bindParam(5, $genero);
            $query->bindParam(6, $celular);
			$query->bindParam(7, $usuario);
            $query->bindParam(8, $contrasena);
            $query->bindParam(9, $perfil);
			$query->bindParam(10, $id);
            $query->execute();
			
			
			
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

   
	
	public function editar_perfil()
	{		
		/*$rutaServidor='../../proyectos/users/fotos';
		$rutaTemporal=$_FILES['foto']['tmp_name'];
		$nombreImagen=$_FILES['foto']['name'];
		$rutaDestino=$rutaServidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemporal, $rutaDestino);*/
		
		$sql="update personas set Per_Nombre = ?, Per_Apellido = ?, Per_Correo = ?, Per_Genero = ?, Per_Celular = ?, Per_Usuario = ?, Per_Contrasena = ?, Per_Perfil = ? where Per_Id = ?";	
		$query=$this->dbh->prepare($sql);
		
		$nom=strip_tags($_POST["nombre"]);
		$ape=strip_tags($_POST["apellido"]);
		//$rol=strip_tags($_POST["rol"]);
		$mail=strip_tags($_POST["correo"]);
		$gen=strip_tags($_POST["genero"]);
		$cel=strip_tags($_POST["celular"]);
		$usu=strip_tags($_POST["usuario"]);
		$pass=strip_tags($_POST["contrasena"]);
		$per=strip_tags($_POST["perfil"]);
		/*$pict=strip_tags($_POST["foto"]);*/
		
		$idn=strip_tags($_POST["identificacion"]);		
		
		$query->bindValue(1, $nom, PDO::PARAM_STR);
		$query->bindValue(2, $ape,PDO::PARAM_STR);
		//$query->bindValue(3, $rol,PDO::PARAM_STR);
		$query->bindValue(3, $mail,PDO::PARAM_STR);
		$query->bindValue(4, $gen,PDO::PARAM_STR);
		$query->bindValue(5, $cel,PDO::PARAM_STR);
		$query->bindValue(6, $usu,PDO::PARAM_STR);
		$query->bindValue(7, $pass,PDO::PARAM_STR);
		$query->bindValue(8, $per,PDO::PARAM_STR);
		
		$query->bindValue(9, $idn,PDO::PARAM_INT);
		
		$query->execute();
		
		
		header("Location: EditarPerfil.php?m=2");
	}
	
	
	public function subir_foto()
	{		
		$rutaServidor='../../proyectos/users/fotos';
		$rutaTemporal=$_FILES['foto']['tmp_name'];
		$nombreImagen=$_FILES['foto']['name'];
		$rutaDestino=$rutaServidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemporal, $rutaDestino);
		
		$sql="update personas set Per_Foto = '".$rutaDestino."' where Per_Id = ?";	
		$query=$this->dbh->prepare($sql);
		
		$idn=strip_tags($_POST["identifica"]);
		
		$query->bindValue(1, $idn,PDO::PARAM_INT);
		
		$query->execute();
		header("Location: EditarPerfil.php?m=1");
	}
	

   	public function eliminar_foto()
	{
		$sql="update personas set Per_Foto = '../../proyectos/users/fotos/default.png' where Per_Id = ?";	
		$query=$this->dbh->prepare($sql);
		
		$idn=strip_tags($_POST["identi"]);
		
		$query->bindValue(1, $idn,PDO::PARAM_INT);
		
		$query->execute();
		header("Location: EditarPerfil.php?m=3");
	}
	
	 public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>