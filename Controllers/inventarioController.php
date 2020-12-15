<?php   
    class inventarioController extends controller
    {
        public function _construct()
        {
            parent::_construct();
        }


        public function index()
        {
            Accesos::acceso('admin')
            $this->_view->renderizar('index');
        }
    }