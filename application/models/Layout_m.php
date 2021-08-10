<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layout_m extends CI_Model {

    function setMeta($title = "") {
        $text = '<head>
                    <meta charset="utf-8" />
                    <title>Home | Pendaftaran Online Anugerah Pekerti</title>
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta content="width=device-width, initial-scale=1" name="viewport" />
                    <meta content="" name="description" />
                    <meta content="" name="author" />
                    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
                    <link href="' . base_url() . 'assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/layouts/layout/css/themes/light2.min.css" rel="stylesheet" type="text/css" id="style_color" />
                    <link href="' . base_url() . 'assets/global/plugins/data-tables/DT_bootstrap.css" rel="stylesheet" />
                    <link href="' . base_url() . 'assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" />
                    <link href="' . base_url() . 'assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
                    <link href="' . base_url() . 'assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
                    <link rel="shortcut icon" href="' . base_url() . 'assets/global/img/logo.png" /> 
                </head>';
        return $text;
    }

    function setHeader() {
        $text = '<div class="page-header navbar navbar-fixed-top">
                    <div class="page-header-inner ">
                        <div class="page-logo">
                            <a href="' . site_url() . 'welcome">
                                <img style="width: 150px; margin-top: 8px" src="' . base_url() . 'assets/global/img/logo_header.png" alt="logo" class="logo-default" /> </a>
                            <div class="menu-toggler sidebar-toggler"> </div>
                        </div>
                        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">
                                <li class="dropdown dropdown-user">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <img alt="" class="img-circle" src="' . base_url() . 'assets/upload/foto/' . $this->session->userdata('foto') . '" />
                                        <span class="username username-hide-on-mobile"> ' . $this->session->userdata('nama_lengkap') . ' </span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-default">
                                        <li>
                                            <a href="page_user_profile_1.html">
                                                <i class="icon-user"></i> My Profile </a>
                                        </li>
                                        <li>
                                            <a href="' . site_url() . 'login/do_Logout">
                                                <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>';
        return $text;
    }

    function setMenu() {

        $this->db->from("t_menu_user a");
        $this->db->join("c_menu b", "b.id_menu=a.id_menu", "left");
        $this->db->join("m_jabatan c", "c.id_jabatan=a.id_jabatan", "left");
        $this->db->where("a.id_jabatan", $this->session->userdata("id_jabatan"));
        $this->db->where("b.parent_menu", 0);
        $this->db->order_by("b.urut", "asc");
        $query = $this->db->get();

        $text = '<div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler"> </div>
                            </li>';
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $Fields) {
                $id_menu = $Fields->id_menu;
                $link_menu = $Fields->link_menu;
                $nama_menu = $Fields->nama_menu;
                $class_icon = $Fields->class_icon;

                $this->db->from("t_menu_user a");
                $this->db->join("c_menu b", "b.id_menu=a.id_menu", "left");
                $this->db->join("m_jabatan c", "c.id_jabatan=a.id_jabatan", "left");
                $this->db->where("a.id_jabatan", $this->session->userdata("id_jabatan"));
                $this->db->where("b.parent_menu", $id_menu);
                $this->db->order_by("b.urut", "asc");
                $query2 = $this->db->get();

                if ($query2->num_rows() > 0) {
                    $text .= '<li id="' . $id_menu . '" class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="' . $class_icon . '"></i>
                                    <span class="title">' . $nama_menu . '</span>
                                    <span class="selected"></span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">';
                    foreach ($query2->result() as $Fields2) {
                        $text .= '<li id="' . $Fields2->id_menu . '" class="nav-item start">
                                    <a href="' . site_url() . $Fields2->link_menu . '" class="nav-link ">
                                        <i class="' . $Fields2->class_icon . '"></i>
                                        <span class="title">' . $Fields2->nama_menu . '</span>
                                    </a>
                                </li>';
                    }
                    $text .= '</ul>';
                } else {
                    $text .= '<li id="' . $id_menu . '" class="nav-item start">
                                <a href="' . site_url() . $link_menu . '">
                                    <i class="' . $class_icon . '"></i>
                                    <span class="title">' . $nama_menu . '</span>
                                </a>
                            </li>';
                }
                $text .= '</li>';
            }
        }

        $text .= '</ul>
                </div>
            </div>';
        return $text;
    }

    function setFooter() {
        $text = '<div class="page-footer">
                    <div class="page-footer-inner"> 2021 &copy; Pendaftaran Online Anugerah Pekerti</div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                </div>';
        return $text;
    }

    function setJS() {
        $text = '<script src="' . base_url() . 'assets/global/plugins/jquery.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/moment.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/scripts/app.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/data-tables/jquery.dataTables.js" type="text/javascript" ></script>
                <script src="' . base_url() . 'assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
                <script src="' . base_url() . 'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/global/plugins/bootstrap-toastr/toastr.min.js"></script> 
                <script src="' . base_url() . 'assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
                <script src="' . base_url() . 'assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>';
        return $text;
    }

    function checkMenu($nama_menu = "") {

        $this->db->from("t_menu_user a");
        $this->db->join("c_menu b", "b.id_menu=a.id_menu", "left");
        $this->db->join("m_jabatan c", "c.id_jabatan=a.id_jabatan", "left");
        $this->db->where("a.id_jabatan", $this->session->userdata("id_jabatan"));
        $this->db->where("b.nama_menu", $nama_menu);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            redirect(site_url() . 'login/do_Logout');
        } else {
            $Fields = $query->row();
            return $Fields->id_menu;
        }
    }

    function getMenuParent($nama_menu = "") {
        $this->db->from("c_menu a");
        $this->db->where("a.nama_menu", $nama_menu);
        $query = $this->db->get();
        $Fields = $query->row();

        if ($Fields->parent_menu > 0) {
            return $Fields->parent_menu;
        } else {
            return $Fields->id_menu;
        }
    }

    function Check_Login() {
        $logged = $this->session->userdata("logged");
        if ($logged == FALSE) {
            redirect(site_url(), "refresh");
        }
    }

    function Check_Logout() {
        $this->session->sess_destroy();
        redirect(site_url(), "refresh");
    }

}
