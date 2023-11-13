<?php
require_once 'app/models/apimodel.php';
require_once 'app/models/config.php';
class PeliModel extends Model{


  

    public function getPeli() {
        $query = $this->db->prepare("SELECT * FROM peliculas"); 
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);
        return $peliculas;
    }
    public function getPeliById($id_pelicula) {
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id_pelicula =?');
        
            $query->execute([$id_pelicula]);
        
            $peliculas = $query->fetchAll(PDO::FETCH_OBJ);
        
            return $peliculas;
    }  
    public function insertPeli($nombre, $director, $tipo, $genero, $servicio_fk) {
        $query = $this->db->prepare("INSERT INTO peliculas (nombre, director, tipo, genero, servicio_fk) VALUES (?, ?, ?, ?, ?)");
    
        $query->execute([$nombre, $director, $tipo, $genero, $servicio_fk]);
    
        return $this->db->lastInsertId();
    }
    
    
    public function editarPeliByID($id_pelicula,$nombre, $director, $tipo, $genero, $servicio_fk){
        $query = $this->db->prepare('UPDATE peliculas SET nombre = ?, director = ?, tipo = ?, genero = ?, servicio_fk = ? WHERE id_pelicula=?');
        $query->execute([$nombre, $director, $tipo, $genero, $servicio_fk, $id_pelicula]); 
    }
    function borrarPeli($id_peliculas) {
        $query =$this-> db->prepare('DELETE FROM peliculas WHERE id_pelicula = ?');
        $query->execute([$id_peliculas]);
    }
    function getPeliOrdenada($orden) {
        $query = $this->db->prepare('SELECT * FROM peliculas ORDER BY id_pelicula ' . $orden);
        $query->execute();
        
        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);
        return $peliculas;
    }
    public function getPeliByServicioFk($servicio_fk) {
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE servicio_fk = ?');
        $query->execute([$servicio_fk]);
        
        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);
        return $peliculas;
    }
 
    
    
    }
    
