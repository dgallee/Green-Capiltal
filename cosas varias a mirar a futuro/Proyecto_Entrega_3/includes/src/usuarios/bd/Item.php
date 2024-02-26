<?php 
class Item {
    use MagicProperties;

    private $id;
    private $idUs;
    private $Nombre;
    private $descripcion;
    private $Image;

    public function __construct($id, $idUs, $Nombre, $descripcion,$image) {
        $this->id = $id;
        $this->idUs = $idUs;
        $this->Nombre = $Nombre;
        $this->descripcion = $descripcion;
        $this->Image=$image;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdUs() {
        return $this->idUs;
    }

    public function setIdUs($idUs) {
        $this->idUs = $idUs;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }
    
    public function getImage() {
        return $this->Image;
    }

    public function SetImage($Image) {
        $this->Image = $Image;
    }
 

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public static function findById($id, $idUs, $conexion) {
        $query = "SELECT * FROM items WHERE id = :id AND idUs = :idUs";
        $statement = $conexion->prepare($query);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":idUs", $idUs, PDO::PARAM_INT);
        $statement->execute();

        if ($statement->rowCount() == 0) {
            return null;
        }

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return new Item($result["id"], $result["idUs"], $result["Nombre"], $result["Descripcion"]);
    }

    public static function findByUser($idUs, $conexion) {
        $query = "SELECT * FROM items WHERE idUs = :idUs";
        $statement = $conexion->prepare($query);
        $statement->bindValue(":idUs", $idUs, PDO::PARAM_INT);
        $statement->execute();

        $items = array();

        while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
            $item = new Item($result["id"], $result["idUs"], $result["Nombre"], $result["Descripcion"]);
            array_push($items, $item);
        }

        return $items;
    }

    public function save($conexion) {
        if ($this->id == null) {
            $query = "INSERT INTO items (idUs, Nombre, Descripcion) VALUES (:idUs, :nombre, :descripcion)";
            $statement = $conexion->prepare($query);
            $statement->bindValue(":idUs", $this->idUs, PDO::PARAM_INT);
            $statement->bindValue(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindValue(":descripcion", $this->descripcion, PDO::PARAM_STR);
            $statement->execute();

            $this->id = $conexion->lastInsertId();
        } else {
            $query = "UPDATE items SET Nombre = :nombre, Descripcion = :descripcion WHERE id = :id AND idUs = :idUs";
            $statement = $conexion->prepare($query);
            $statement->bindValue(":id", $this->id, PDO::PARAM_INT);
            $statement->bindValue(":idUs", $this->idUs, PDO::PARAM_INT);
            $statement->bindValue(":nombre", $this->nombre, PDO::PARAM_STR);
            $statement->bindValue(":descripcion", $this->descripcion, PDO::PARAM_STR);
            $statement->execute();
        }
    }

    public function delete($conexion) {
        $query = "DELETE FROM items WHERE id = :id AND idUs = :idUs";
        $statement = $conexion->prepare($query);
        $statement->bindValue(":id", $this->id, PDO::PARAM_INT);
        $statement->bindValue(":idUs", $this->idUs, PDO::PARAM_INT);
        $statement->execute();
    }
}
?>
