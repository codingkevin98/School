<?php   
    class loginController extends controller
    {
        public function _construct()
        {
            parent::_construct();
        }


        public function index()
        {
            if($this->getTexto('ingresar')== '1')
            {
                //acceso a la base de datos con los campos para verificar si el usuario y la clave son validos
                if($this->getTexto('usuario')=='kevin' && $this->getTexto('clave') == 'kev')
                {
                    Accesos::setDato('validado','true');
                    Accesos::setDato('rol´','admin');
                    Accesos::setDato('usuario´','kevin Jimenez');
                    $this->redireccionar('index');

                }
                else {
                    $this->_view->mensaje= "<h2>Usuario y/o clave incorrecta</h2>";
                }
            }
            $this->_view->renderizar('index');
        }

        public function salir()
        {
            Accesos::salir();
            $this->redireccionar('login');
        }
    }