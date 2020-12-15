<?php   
    class errorController extends controller
    {
        public function _construct()
        {
            parent::_construct();
        }


        public function index()
        {
            
        }

        public function error($error)
        {
            if($error==503)
                $this->_view->mensaje='<div><h3 class="text-danger"> no tiene suficientes privilegios</h3></div>';
               else if($error==504)
                    $this->_view->mensaje='<div><h3 class="text-danger"> Debe ingresar al sistema</h3></div>';
                    else
                    $this->_view->mensaje='<div><h3 class="text-danger"> Error desconocido</h3></div>';
                    $this->_view->renderizar('index');
        }
    }