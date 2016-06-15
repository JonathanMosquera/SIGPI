<?php
class Projects
{
    private static $instancia;
    private $dbh;

    private function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
            $this->dbh->exec("SET CHARACTER SET utf8");
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


    public function listar_proyectos()
    {
        try {
            $query = $this->dbh->prepare('select * from proyectos');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
	
	public function listar_proyectos_CualquierCampo()
    {
        try {
            $query = $this->dbh->prepare("select * from proyectos p where p.Pro_Fase=? || p.Pro_CondicionDos=? || p.Pro_Intervalo= ? || p.Pro_Centro= ? || p.Pro_Presupuesto >= ? and p.Pro_Presupuesto <= ? || p.Pro_Ficha= ? || p.Pro_Fecha_Inicio >= ? and p.Pro_Fecha_Fin <= ?;");
			$fase=strip_tags($_POST["fase"]);
			$con=strip_tags($_POST["condicion"]);
			$inter=strip_tags($_POST["inter"]);
			$centro=strip_tags($_POST["Centro"]);
			$p1=strip_tags($_POST["presue"]);
			$p2=strip_tags($_POST["presued"]);
			$ficha=strip_tags($_POST["ficha"]);
			$fi=strip_tags($_POST["fechaini"]);
			$ff=strip_tags($_POST["fechafin"]);
			$query->bindValue(1, $fase, PDO::PARAM_STR);
			$query->bindValue(2, $con, PDO::PARAM_STR);
			$query->bindValue(3, $inter, PDO::PARAM_STR);
			$query->bindValue(4, $centro, PDO::PARAM_STR);
			$query->bindValue(5, $p1, PDO::PARAM_STR);
			$query->bindValue(6, $p2, PDO::PARAM_STR);
			$query->bindValue(7, $ficha, PDO::PARAM_STR);
			$query->bindValue(8, $fi, PDO::PARAM_STR);
			$query->bindValue(9, $ff, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
	
	
	
	
	public function boton_EliminarDos($nom)
    {
        try {
            $query = $this->dbh->prepare("select * from proyectos where Pro_Codigo = ? and Pro_Condicion = 'Pendiente'");
            $query->bindParam(1, $nom);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }
	
	
	 public function boton_Eliminar($nom)
    {
        try {
            $query = $this->dbh->prepare("select * from proyectos where Pro_Codigo = ? and Pro_CondicionDos = 'No Aprobado'");
            $query->bindParam(1, $nom);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }

	 public function boton_Aprobar($nom)
    {
        try {
            $query = $this->dbh->prepare("select * from proyectos where Pro_Codigo = ? and Pro_Condicion = 'Pendiente'");
            $query->bindParam(1, $nom);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }
	
	 public function boton_AprobarLider($nom)
    {
        try {
            $query = $this->dbh->prepare("select * from proyectos where Pro_Codigo = ? and Pro_CondicionDos = 'Pendiente'");
            $query->bindParam(1, $nom);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }
	
	public function boton_NoAprobarLider($nom)
    {
        try {
            $query = $this->dbh->prepare("select * from proyectos where Pro_Codigo = ? and Pro_CondicionDos = 'Pendiente'");
            $query->bindParam(1, $nom);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }

public function informacion_Proyecto($nom)
    {
        try {
            $query = $this->dbh->prepare("select * from  proyectos  where Pro_Codigo = ? ");
            $query->bindParam(1, $nom);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }


    public function info_Proyecto($nom)
    {
        try {
            $query = $this->dbh->prepare("select * from personas per inner join desarrolla d on(per.Per_Id=d.Per_Id) inner join proyectos p on(d.Pro_Codigo=p.Pro_Codigo) where p.Pro_Codigo = ? LIMIT 1");
            $query->bindParam(1, $nom);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }
	
	
	 public function responsable_Proyecto($nom)
    {
        try {
            $query = $this->dbh->prepare('select * from personas per inner join desarrolla d on(per.Per_Id=d.Per_Id) inner join proyectos p on(d.Pro_Codigo=p.Pro_Codigo) where p.Pro_Codigo = ? and per.Per_RolC ="Lider" or per.Per_RolC = "Lider/Miembro" LIMIT 1');
            $query->bindParam(1, $nom);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }
	
	 public function miembros_Proyecto($nom)
    {
        try {
            $query = $this->dbh->prepare('select * from personas per inner join desarrolla d on(per.Per_Id=d.Per_Id) inner join proyectos p on(d.Pro_Codigo=p.Pro_Codigo) where p.Pro_Codigo = ?');
            $query->bindParam(1, $nom);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }
	
	 public function archivo_pdfs($si)
    {
        try {
            $query = $this->dbh->prepare('select *  from archivos  where Pro_Codigo= ? and Arc_Nombre LIKE "%.pdf";');
            $query->bindParam(1, $si);
            $query->execute();
			return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }
	
	 public function archivo_pptx($si)
    {
        try {
            $query = $this->dbh->prepare('select *  from archivos  where Pro_Codigo= ? and Arc_Nombre LIKE "%.pptx" || Pro_Codigo= ? and Arc_Nombre LIKE "%.ppt" ;');
            $query->bindParam(1, $si);
			$query->bindParam(2, $si);
            $query->execute();
			return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }
	
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
	
	
	public function proyectos_aprobados()
    {
        try {
            $query = $this->dbh->prepare('select * from proyectos p where Pro_Condicion = "Aprobado"');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }

    }
	
	public function proyectos_aprobadosGL()
    {
        try {
            $query = $this->dbh->prepare('select * from proyectos p where p.Pro_Condicion and p.Pro_CondicionDos = "Aprobado"');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }

    }
	public function proyectos_instructor($identificacion)
    {
        try {
            $query = $this->dbh->prepare('select p.*,per.* from personas per inner join desarrolla d on(per.Per_Id=d.Per_Id) inner join proyectos p on(d.Pro_Codigo=p.Pro_Codigo) where per.Per_Id= ? and Pro_CondicionDos');
			 $query->bindParam(1, $identificacion);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }

    }
	
	
	
	
	
	public function UsuarioRol($usu)
    {
        try {
            $query = $this->dbh->prepare("select p.Per_Nombre, p.Per_Apellido, p.Per_Usuario from personas p where Per_Usuario = ?");
            $query->bindParam(1, $usu);
            $query->execute();
			 return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
           $e->getMessage();
        }
    }

    public function delete_project($id)
    {
        try {
            $query = $this->dbh->prepare('delete from proyectos where Pro_Codigo = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
	
	 public function delete_projectgestor($id,$di,$de,$do)
    {
        try {
            $query = $this->dbh->prepare('delete from archivos where Pro_Codigo= ?; delete from comentarios where PROYECTOS_Pro_Codigo= ?; delete from  desarrolla  where Pro_Codigo =?; delete from  proyectos  where Pro_Codigo =? ; ');
            $query->bindParam(1, $id);
			$query->bindParam(2, $di);
			$query->bindParam(3, $de);
			$query->bindParam(4, $do);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
	


public function aprobar_proyectos($id)
    {
        try {
            $query = $this->dbh->prepare('update proyectos set Pro_CondicionDos = "Aprobado", Pro_Fase = "Ejecucion" where Pro_Codigo = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
	
	
	public function aprobar_proyectosgestor($id)
    {
        try {
            $query = $this->dbh->prepare('update proyectos set Pro_Condicion = "Aprobado" where Pro_Codigo = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
	
	
	
	public function noaprobar_proyectos($id)
    {
        try {
            $query = $this->dbh->prepare('update proyectos set Pro_CondicionDos = "No Aprobado" where Pro_Codigo = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
	
	public function view_comentarios($nom)
    {
        try {
            $query = $this->dbh->prepare('select * from comentarios c inner join personas p on(c.Per_Id=p.Per_Id) where PROYECTOS_Pro_Codigo = ? ORDER BY c.idComentarios DESC ');
			$query->bindParam(1, $nom);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }

    }
	
			public function insert_comment()
	{	
	
	
		if(isset($_POST["comentar"])==" "&& isset($_POST["codigoproyecto"])&& isset($_POST["usuarioco"])){	
			
	$sql="insert into comentarios (idComentarios, Com_Comentarios, fecha, PROYECTOS_Pro_Codigo,Per_Id) values (null,?,?,?,?)";
		$query=$this->dbh->prepare($sql);
		
		
		$comment=strip_tags($_POST["comentar"]);
		ini_set('date.timezone','America/Bogota');
		$fecha = date('d-m-Y  g:i A');
		$codpro=strip_tags($_POST["codigoproyecto"]);
		$usual=strip_tags($_POST["usuarioco"]);
		
		
		$query->bindValue(1, $comment, PDO::PARAM_STR);
		$query->bindValue(2, $fecha,PDO::PARAM_STR);
		$query->bindValue(3, $codpro,PDO::PARAM_INT);
		$query->bindValue(4, $usual,PDO::PARAM_INT);

		
		$query->execute();
		}
		
	}

	
	public function insert_pro($do)
	{		
		
		
		$sql="insert into proyectos (Pro_Codigo,Pro_Nombre, Pro_Descripcion, Pro_Justificacion, Pro_Intervalo,Pro_Presupuesto, Pro_Ficha, Pro_Centro, Pro_Condicion, Pro_CondicionDos, Pro_Fecha_Inicio, Pro_Fecha_Fin,Pro_Clasificacion, Pro_Fase) values (null,?,?,?,?,?,?,?,'Pendiente', 'Pendiente',?,?,null,'Inicio')";
		$query=$this->dbh->prepare($sql);
		
		$nom=strip_tags($_POST["Nombre_proyecto"]);
		$desc=strip_tags($_POST["Descripcion_Proyecto"]);
		$just=strip_tags($_POST["Justifi_Proyecto"]);
		$interv=strip_tags($_POST["Intervalo_Proyecto"]);
		$presu=strip_tags($_POST["Presu_Proyecto"]);
		$ficha=strip_tags($_POST["Ficha_Proyecto"]);
		$centro=strip_tags($_POST["Centro_Proyecto"]);
		$fechini= date('Y-m-d');
		$fechfin=strip_tags($_POST["Fechafin_Proyecto"]);
		//$area=strip_tags($_POST["Area_Proyecto"]);
		//$pict=strip_tags($_POST["foto"]);
		
		//$idn=strip_tags($_POST["identificacion"]);
		
		
		$query->bindValue(1, $nom, PDO::PARAM_STR);
		$query->bindValue(2, $desc,PDO::PARAM_STR);
		$query->bindValue(3, $just,PDO::PARAM_STR);
		$query->bindValue(4, $interv,PDO::PARAM_STR);
		$query->bindValue(5, $presu,PDO::PARAM_STR);
		$query->bindValue(6, $ficha,PDO::PARAM_STR);
		$query->bindValue(7, $centro,PDO::PARAM_STR);
		$query->bindValue(8, $fechini,PDO::PARAM_STR);
		$query->bindValue(9, $fechfin,PDO::PARAM_STR);
		 
		//$query->bindValue(9, $area,PDO::PARAM_STR);
		
		//$query->bindValue(10, $idn,PDO::PARAM_INT);
		
		$query->execute();
		
		
		 $query = $this->dbh->prepare("select max(Pro_Codigo)codigo from proyectos");
		$query->execute();
		$result = $query->fetchColumn();
		
	

				
            $query = $this->dbh->prepare("insert into desarrolla (De_Codigo,Pro_Codigo,Per_Id,De_Fecha_Vinculcion,De_Fecha_Desvincul,De_Estado) values(null,".$result.",?,'2016-02-08','2016-02-08','Vinculado');
");
 $query->bindParam(1, $do);
$query->execute();


 $talvez=$_SESSION['jona']['identi'];
  $query = $this->dbh->prepare("select Per_Nombre from personas where Per_Id =".$talvez);
		$query->execute();
			$pernom = $query->fetchColumn();
 
 
 $sepueda= $_SESSION['jona']['identi'];
   $query = $this->dbh->prepare("select Per_Apellido from personas where Per_Id=".$sepueda);
		$query->execute();
		$perapel = $query->fetchColumn();
 

 
 $nombrecarpeta=$pernom." ".$perapel;
 $rutaServidor='../../proyectos/users/';
 
$directorio= $rutaServidor.$nombrecarpeta;

/*$caracter=array('&','¡','¿','®','©','€','á','é','í','ó','ú','ñ','ä','ë');
for($i=0;$i<=count($caracter)-1;$i++){
mkdir(utf8_decode($caracter[$i]));
}*/

mkdir(utf8_decode($directorio),0777,true);


	
	foreach ($_FILES["arpdf"]["error"] as $clave => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $ruta = $_FILES["arpdf"]["tmp_name"][$clave];
		$rutaTemporalpdf = utf8_decode($ruta);
        $nombrePdf = $_FILES["arpdf"]["name"][$clave];
		$rutaDestinopdf= utf8_decode($directorio).'/'. utf8_decode($nombrePdf);
        move_uploaded_file($rutaTemporalpdf, $rutaDestinopdf);
		
		$query = $this->dbh->prepare("select max(Pro_Codigo)codigo from proyectos");
		$query->execute();
		$toma = $query->fetchColumn();
		
		$jonathanM= $nombrePdf;
		$rutabd =  $directorio.'/'. $nombrePdf;
		
		$query = $this->dbh->prepare("insert into archivos (Arc_Codigo,Arc_Nombre,Arc_Tipo,Arc_Ruta,Pro_Codigo) values(null,'".$jonathanM."','".$tipopdf."','".$rutabd."',".$toma.");");
		$query->execute();	
		
    }
	
}

$binjona=$_SESSION['jona']['identi'];
  $query = $this->dbh->prepare("update personas set Per_RolC = 'Lider' where Per_Id =".$binjona);
		$query->execute();

 $this->dbh = null;
		header("Location: ConsultarProyectos.php?m=1");
	}
		public function edit_pro()
	{			
		$sql="update proyectos set Pro_Nombre = ?, Pro_Descripcion = ?, Pro_Justificacion = ?, Pro_Intervalo = ?, Pro_Presupuesto = ?, Pro_Ficha = ?, Pro_Centro = ? where Pro_Codigo = ?";
		$query=$this->dbh->prepare($sql);
		
		$nom=strip_tags($_POST["Nombre_proyecto"]);
		$desc=strip_tags($_POST["Descripcion_Proyecto"]);
		$just=strip_tags($_POST["Justifi_Proyecto"]);
		$interv=strip_tags($_POST["Intervalo_Proyecto"]);
		$presu=strip_tags($_POST["Presu_Proyecto"]);
		$ficha=strip_tags($_POST["Ficha_Proyecto"]);
		$centro=strip_tags($_POST["Centro_Proyecto"]);
		
		$id=strip_tags($_POST["procod_editar"]);		
		
		$query->bindValue(1, $nom, PDO::PARAM_STR);
		$query->bindValue(2, $desc,PDO::PARAM_STR);
		$query->bindValue(3, $just,PDO::PARAM_STR);
		$query->bindValue(4, $interv,PDO::PARAM_STR);
		$query->bindValue(5, $presu,PDO::PARAM_STR);
		$query->bindValue(6, $ficha,PDO::PARAM_STR);
		$query->bindValue(7, $centro,PDO::PARAM_STR);
		$query->bindValue(8, $id,PDO::PARAM_INT);
		
		$query->execute();
		
		$this->dbh = null;
		header("Location: InfoProyecto.php?m=".$id."&n=1");
}


    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>