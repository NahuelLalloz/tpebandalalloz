<?php
require_once './app/models/apimodel.php';
require_once 'app/models/config.php';
class StreamingModel extends Model{
  

   

    public function getStreaming() {
        $query = $this->db->prepare('SELECT * FROM servicio_streaming');
        $query->execute();
        $servicios = $query->fetchAll(PDO::FETCH_OBJ);
        return $servicios;
    }
    function borrarStream($id_servicio_streaming) {
        $query =$this-> db->prepare('DELETE FROM servicio_streaming WHERE id_servicio_streaming = ?');
        $query->execute([$id_servicio_streaming]);
    }
    public function insertServicio($nombre) {
        $query = $this->db->prepare("INSERT INTO servicio_streaming (nombre) VALUES (?)");
    
        $query->execute([$nombre]);
    
        return $this->db->lastInsertId();
    }
    public function editarStream($id_servicio_streaming, $nombre){
        $query = $this->db->prepare('UPDATE servicio_streaming SET nombre = ? WHERE id_servicio_streaming = ?');
        $query->execute([$nombre, $id_servicio_streaming]);
    }

    public function getStreamById($id_servicio_streaming) {
        $query = $this->db->prepare('SELECT servicio_streaming.*
            FROM servicio_streaming
            WHERE servicio_streaming.id_servicio_streaming = ?');
    
        $query->execute([$id_servicio_streaming]);
    
        $servicios = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $servicios;
    }
    function getPeliOrdenada($orden) {
        $query = $this->db->prepare('SELECT * FROM servicio_streaming ORDER BY id_servicio_streaming ' . $orden);
        $query->execute();
        
        $servicios = $query->fetchAll(PDO::FETCH_OBJ);
        return $servicios;
    }
   
}  