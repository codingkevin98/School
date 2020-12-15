<?php   

    class personalController extends Controller
    {
        private $per;
       function __construct()
        {
            parent::__construct();
            $this->per=$this->loadModel("personal");
        }

        public function generarTabla(){
            $personal = $this->per->getpersonal();
            $tabla = "";
            foreach($personal as $p){
                $per = json_encode($p);
                $tabla.= "<tr>
                            <td>".$p['id']."</td>
                            <td>".$p['nombre']."</td>
                            <td>".$p['edad']."</td>
                            <td>".$p['puesto'].'</td>
                            <td><button class="btn btn-success editarInfo" data-toggle="modal" data-target="#editarModal" data-datos=\''.$per.'\'><i class="fas fa-edit"></i></button></td>
                            <td><button class="btn btn-danger elimInfo" data-id='.$p['id'].'><i class="fas fa-trash"></i></button></td>
                            
                    </tr>';
            }

            return $tabla;
        }

        public function index()
        {
            Accesos::acceso('registrador');
            $this->_view->titulo= '
                <div class="d-flex justify-content-around mb-3 border-bottom p-3">
                    <p class="h3">Personal de trabajo</p>
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#agregarModal">
                        Agregar
                    </a>
                </div>
                ';
            $tabla='';  
            $tabla=$this->generarTabla();

            $this->_view->contenido=$tabla;
            $this->_view->renderizar('index');
        }

        public function agregar(){
                Accesos::acceso('admin');
                $p_nombre = $this->getTexto('nombre');
                $p_edad = $this->getTexto('edad');
                $p_puesto = $this->getTexto('puesto');
                $this->per->agregarPersonal($p_nombre,$p_edad,$p_puesto);
                echo $this->generarTabla();
        }

        public function update(){
            $this->per->upd(array(
                "id" => $this->getTexto('id'),
                "nombre" => $this->getTexto('nombre'),
                "edad" => $this->getTexto('edad'),
                "cargo" => $this->getTexto('cargo')
            ));
            
            echo $this->generarTabla();
        }

        public function delete(){
           $this->per->del($this->getTexto('id'));
        }
    }