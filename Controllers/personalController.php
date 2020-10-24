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
                $tabla.= "    <tr>
                            <td>".$p['id']."</td>
                            <td>".$p['nombre']."</td>
                            <td>".$p['edad']."</td>
                            <td>".$p['puesto']."</td>
                            <td><button class='btn btn-success' data-toggle='modal' data-target='#editar_p'><i class='fas fa-edit'></i></button></td>
                            
                    </tr>";
            }

            return $tabla;
        }

        public function index()
        {
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
                $p_nombre = $this->getTexto('nombre');
                $p_edad = $this->getTexto('edad');
                $p_puesto = $this->getTexto('puesto');
                $this->per->agregarPersonal($p_nombre,$p_edad,$p_puesto);
                echo $this->generarTabla();
        }
    }