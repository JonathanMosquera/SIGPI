<?php  
    class Conectar{
	
		public function conectarBD(){
	        //$this->$p=array();
			try{
				$dbh= new PDO('mysql:host=localhost;dbname=mydb', "root", "root");
				$dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
				$dbh->query("SET NAMES 'utf8'");
				return $dbh;
			}catch (PDOException $e) {
	        	cabecera("Error grave");
	        	print "<p>Error: No puede conectarse con la base de datos.</p>\n";
	//      print "<p>Error: " . $e->getMessage() . "</p>\n";
	        	pie();
	        	exit();
			}
		}
		
		public function comillas_inteligentes($valor) {
      // Retirar las barras
      if (get_magic_quotes_gpc()) {
         $valor = stripslashes($valor);
      }
      // Colocar comillas si no es entero
      if (!is_numeric($valor)) {
         $valor = "'" . $this->PDO->real_escape_string($valor) . "'";
      }
      return $valor;
   }

	
	}
?>
