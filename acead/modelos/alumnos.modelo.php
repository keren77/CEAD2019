<?php

require_once "conexion.php";

class ModeloAlumnos{

	/*=============================================
	MOSTRAR ALUMNOS
	=============================================*/

	static public function MdlMostrarAlumnos($tabla, $item, $valor){


		if($item != null){

			$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}


		$stmt -> Cerrar_Conexion();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE ALUMNOS
	=============================================*/

	static public function mdlIngresarAlumno($tabla, $datos){


		$stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla (PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, FechaNacimiento, CorreoElectronico, Telefono, Cedula,  Id_estadocivil, Id_genero)
																									VALUES (:nombre1, :nombre2, :apellido1, :apellido2, :FechaNac, :email, :telefono, :cedula, :estcivil, :genero)");


		$stmt->bindParam(":nombre1", $datos["PrimerNombre"], PDO::PARAM_STR);
    $stmt->bindParam(":nombre2", $datos["SegundoNombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido1", $datos["PrimerApellido"], PDO::PARAM_STR);
    $stmt->bindParam(":apellido2", $datos["SegundoApellido"], PDO::PARAM_STR);
		$stmt->bindParam(":FechaNac", $datos["FechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["CorreoElectronico"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":cedula", $datos["Cedula"], PDO::PARAM_STR);
    $stmt->bindParam(":estcivil", $datos["Id_EstadoCivil"], PDO::PARAM_STR);
    $stmt->bindParam(":genero", $datos["Id_Genero"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
			echo "<script type='text/javascript'>alert('neles')</script>";
		}

		$stmt->close();

		$stmt = null;

	}

	/*=============================================
	EDITAR ALUMNO
	=============================================*/

	static public function mdlEditarAlumno($tabla, $datos){
//echo "<script type='text/javascript'>alert('nenes pasteles')</script>";*
		$stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET PrimerNombre = :nombre1,
                                                                   SegundoNombre = :nombre2,
                                                                   PrimerApellido = :apellido1,
                                                                   SegundoApellido = :apellido2,
																																	 CorreoElectronico = :email,
                                                                   Telefono = :telefono,
                                                                   Cedula = :cedula,
                                                                   Id_estadocivil = :estcivil,
                                                                   Id_genero = :genero,
                                                                WHERE Id_Alumno = :id");

		$stmt->bindParam(":nombre1", $datos["PrimerNombre"], PDO::PARAM_STR);
    $stmt->bindParam(":nombre2", $datos["SegundoNombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido1", $datos["PrimerApellido"], PDO::PARAM_STR);
    $stmt->bindParam(":apellido2", $datos["SegundoApellido"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["CorreoElectronico"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":cedula", $datos["Cedula"], PDO::PARAM_STR);
    $stmt->bindParam(":estcivil", $datos["Id_estadocivil"], PDO::PARAM_STR);
    $stmt->bindParam(":genero", $datos["Id_genero"], PDO::PARAM_STR);



		if ($stmt ->execute()) {

			return "ok";
		}else{

			return "error";

		}
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR ALUMNO
	=============================================*/

	static public function mdlActualizarAlumno($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR ALUMNO
	=============================================*/

	static public function mdlBorrarAlumno($tabla, $datos){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("DELETE FROM tbl_alumnos WHERE Id_Alumno = :id");

    $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);


		if($stmt -> execute() ){

			return "ok";



		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;


	}




 /*=============================================
  CARGAR SELECT
  =============================================*/
  static public function mdlCargarSelect($tabla){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla");
  	$stmt -> execute();

  	return $stmt -> fetchall();

    }



}
