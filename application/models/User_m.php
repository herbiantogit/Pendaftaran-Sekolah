<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_m extends CI_Model {

    function getUser($criteria = "", $keyword = "", $sort = "", $dir = "", $start = "", $limit = "") {
        $this->db->select("a.*, b.nama_jabatan");
        $this->db->from("m_user a");
        $this->db->join("m_jabatan b", "a.id_jabatan=b.id_jabatan", "left");
        if ($criteria && $keyword) {
            $this->db->like($criteria, $keyword);
        }
        if ($sort && $dir) {
            $this->db->order_by($sort, $dir);
        }
        if ($start != "" && $limit != "") {
            $this->db->limit($limit, $start);
        }
        return $this->db->get();
    }

    function getCountUser($criteria = "", $keyword = "") {
        $this->db->select("a.*, b.nama_jabatan");
        $this->db->from("m_user a");
        $this->db->join("m_jabatan b", "a.id_jabatan=b.id_jabatan", "left");
        if ($criteria && $keyword) {
            $this->db->like($criteria, $keyword);
        }
        return $this->db->count_all_results();
    }

    function insert($nama_lengkap = "", $email = "", $flag_password_user = "", $passwd = "", $username = "", $no_hp = "", $status = "", $id_jabatan = "", $fileFoto = "", $urut = "") {
        $data = array(
            "nama_lengkap" => $nama_lengkap,
            "email" => $email,
            "username" => $username,
            "no_hp" => $no_hp,
            "urut" => $urut,
            "id_jabatan" => $id_jabatan
        );
        if ($flag_password_user == 'true') {
            $data['passwd'] = md5($passwd);
        } else {
            $data['passwd'] = md5('123456');
        }
        if ($status == 'on') {
            $data['status'] = TRUE;
        }
        if ($fileFoto != "") {
            $data['foto'] = $fileFoto;
        }
        $this->db->insert("m_user", $data);
    }

    function update($id_user = "", $nama_lengkap = "", $email = "", $flag_password_user = "", $passwd = "", $username = "", $no_hp = "", $status = "", $id_jabatan = "", $fileFoto = "") {
        $data = array(
            "nama_lengkap" => $nama_lengkap,
            "email" => $email,
            "username" => $username,
            "no_hp" => $no_hp,
            "id_jabatan" => $id_jabatan
        );
        if ($flag_password_user == 'true') {
            $data['passwd'] = md5($passwd);
        }
        if ($status == 'on') {
            $data['status'] = TRUE;
        } else {
            $data['status'] = FALSE;
        }
        if ($fileFoto != "") {
            $data['foto'] = $fileFoto;
        }
        $this->db->where('id_user', $id_user);
        $this->db->update('m_user', $data);
    }

    function delete($id_user = "") {
        if ($id_user) {
            $this->db->delete("m_user", array("id_user" => $id_user));
        }
    }

    function Chek_Data($id_user = "", $email = "") {
        if ($id_user) {
            $this->db->where("id_user", $id_user);
        } else {
            $this->db->where("email", $email);
        }
        $query = $this->db->get("m_user");
        return $query->num_rows();
    }

    function List_Data($id_user = "") {
        $query = $this->db->get_where('m_user', array('id_user' => $id_user));
        return $query->row();
    }

    function cekUrut() {
        $sql = $this->db->query("select max(urut) as urut from m_user where to_char(tgl_ins, 'yyyy')='" . date('Y') . "'");
        return $sql->row()->urut;
    }

}
