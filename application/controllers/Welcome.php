<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->Layout_m->Check_Login();
    }

    public function index() {
        $data['nama_menu'] = "Home";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('home_v', $data);
    }

}
