<?php 

Class Modelo {

  private $conexion;

  public function __construct()
  {
    require_once './config/configDb.php';
    try{
      $this->conexion = new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
       if ($this->conexion->connect_error) {
                error_log('Error de conexión: ' . $this->conexion->connect_error);
                throw new Exception('No se pudo conectar a la base de datos.');
            }
    }catch(Throwable $th){
      error_log($th->getMessage());
    }
  }


  public function obtenerRanking()
  {
    try{
      $sql = 'SELECT nickname,puntuacion FROM partida WHERE nickname <> "" ORDER BY puntuacion DESC';
      $stmt = $this->conexion->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        $ranking = $result->fetch_all(MYSQLI_ASSOC);
        return $ranking;

      } else {
        throw new Exception('Error en el resultado de la consulta');
      }


    }catch(Throwable $th){
      error_log($th->getMessage());
      return [];
    }
  }

 }
