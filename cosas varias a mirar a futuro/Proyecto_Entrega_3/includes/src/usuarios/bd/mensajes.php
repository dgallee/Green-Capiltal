<?php

class Mensajes {
    private $idmensajes;
    private $idC;
    private $idusuario;
    private $mensaje;

    public function __construct($idmensajes, $idC, $idusuario, $mensaje) {
        $this->idmensajes = $idmensajes;
        $this->idC = $idC;
        $this->idusuario = $idusuario;
        $this->mensaje = $mensaje;
    }

    public function getIdmensajes() {
        return $this->idmensajes;
    }

    public function getIdC() {
        return $this->idC;
    }

    public function getIdusuario() {
        return $this->idusuario;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function setIdmensajes($idmensajes) {
        $this->idmensajes = $idmensajes
