<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('login_v');
    }

    function do_login() {
        $return = array();

        $username = $this->input->post("username");
        $passwd = $this->input->post("passwd");

        $this->db->select("a.*, b.nama_jabatan");
        $this->db->from("m_user a");
        $this->db->join("m_jabatan b", "b.id_jabatan=a.id_jabatan", "left");
        $this->db->where(array('a.username' => $username, 'a.passwd' => md5($passwd)));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $Fields = $query->row();
            if ($Fields->status == 't') {
                $newdata = array(
                    "id_user" => $Fields->id_user,
                    "username" => $Fields->username,
                    "nama_lengkap" => $Fields->nama_lengkap,
                    "id_jabatan" => $Fields->id_jabatan,
                    "nama_jabatan" => $Fields->nama_jabatan,
                    "email" => $Fields->email,
                    "no_hp" => $Fields->no_hp,
                    "foto" => ($Fields->foto != "") ? $Fields->foto : "no_image.png",
                    "logged" => TRUE
                );
                $this->session->set_userdata($newdata);

                $return["page"] = 'welcome';

                $return["success"] = TRUE;
                $return["msgServer"] = "Login Sukses.";
            } else {
                $return["success"] = FALSE;
                $return["msgServer"] = "Maaf, Akun anda tidak aktif, silahkan melaporkan ke pihak sekolah.";
            }
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Username atau Password Salah.";
        }

        echo json_encode($return);
    }

    function do_Logout() {
        $this->Layout_m->Check_Logout();
    }

}
