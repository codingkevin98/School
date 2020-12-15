<?php   

    class personalModel extends Model
    {
        
        public function __construct()
        {
            parent::__construct();
        
        }


      public function getpersonal($clave = null, $valor= null){
          $personal = $this->_db->query("Select * from personal")->fetchAll();
          return $personal;
      }

      public function agregarPersonal($nom,$ed,$pue){
          $this->_db->prepare("INSERT INTO personal(nombre,edad,puesto) VALUES(:nom,:ed,:pue)")->execute(
              array(
                  "nom" => $nom,
                  "ed" => $ed,
                  "pue" => $pue,
              )
          );
      }

      public function upd($datos){
        $this->_db->prepare("UPDATE personal SET nombre = :nom,edad = :eda, puesto = :pue WHERE id = :id")->execute(array(
            "id" => $datos['id'],
            "nom" => $datos['nombre'],
            "eda" => $datos['edad'],
            "pue" => $datos['cargo']
        ));
      }

      public function del($id){
        $this->prepare("DELETE FROM personal WHERE id = :idPer")->execute(array("idPer" => $id));
        }
    }

    ?>