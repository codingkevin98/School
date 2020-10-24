<?php   
    class inventarioController extends controller
    {
        public function _construct()
        {
            parent::_construct();
        }


        public function index()
        {
            $this->_view->renderizar('index');
        }
    }