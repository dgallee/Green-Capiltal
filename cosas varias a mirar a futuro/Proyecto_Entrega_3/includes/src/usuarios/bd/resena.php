<?php 
class Resena {
    private $idresenas;
    private $idpost;
    private $idUsuario;
    private $resena;

    public function __construct($idresenas, $idpost, $idUsuario, $resena) {
        $this->idresenas = $idresenas;
        $this->idpost = $idpost;
        $this->idUsuario = $idUsuario;
        $this->resena = $resena;
    }

    public function getIdResenas() {
        return $this->idresenas;
    }

    public function setIdResenas($idresenas) {
        $this->idresenas = $idresenas;
    }

    public function getIdPost() {
        return $this->idpost;
    }

    public function setIdPost($idpost) {
        $this->idpost = $idpost;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getResena() {
        return $this->resena;
    }

    public function setResena($resena) {
        $this->resena = $resena;
    }
}
?>
