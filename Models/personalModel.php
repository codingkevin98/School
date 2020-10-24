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
    }

    ?>