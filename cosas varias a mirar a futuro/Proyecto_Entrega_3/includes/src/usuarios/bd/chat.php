<?php

class Chat {
    private $idChat;
    private $idusuario1;
    private $idusuario2;

    public function __construct($idChat, $idusuario1, $idusuario2) {
        $this->idChat = $idChat;
        $this->idusuario1 = $idusuario1;
        $this->idusuario2 = $idusuario2;
    }

    public function getIdChat() {
        return $this->idChat;
    }

    public function getIdusuario1() {
        return $this->idusuario1;
    }

    public function getIdusuario2() {
        return $this->idusuario2;
    }

    public function setIdChat($idChat) {
        $this->idChat = $idChat;
    }

    public function setIdusuario1($idusuario1) {
        $this->idusuario1 = $idusuario1;
    }

    public function setIdusuario2($idusuario2) {
        $this->idusuario2 = $idusuario2;
    }
}

?>
