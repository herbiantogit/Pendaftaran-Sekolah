<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jeniskelamin_m extends CI_Model {

    function getDataComboBox($id_label = "", $id_selected = "") {
        $options = array();
        $items = array();
        $this->db->order_by("nama_jeniskelamin", "asc");
        $query = $this->db->get('m_jeniskelamin');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $i++;
                if ($i == 1) {
                    $items[""] = "";
                }
                $items[$row->id_jk] = $row->nama_jk;
            }
            $options = $items;
        }
        return form_dropdown($id_label, $options, $id_selected, 'id ="' . $id_label . '" Class="select2me form-control" data-placeholder="Pilih Jenis kelamin..."');
    }

    function getJeniskelamin($criteria = "", $keyword = "", $sort = "", $dir = "", $start = "", $limit = "") {
        $this->db->from("m_jeniskelamin a");
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

    function getCountJeniskelamin($criteria = "", $keyword = "") {
        $this->db->from("m_jeniskelamin a");
        if ($criteria && $keyword) {
            $this->db->like($criteria, $keyword);
        }
        return $this->db->count_all_results();
    }

    function insert($nama_jeniskelamin = "") {
        $data = array(
            "nama_jeniskelamin" => $nama_jeniskelamin
        );
        $this->db->insert("m_jeniskelamin", $data);
    }

    function update($id_jeniskelamin = "", $nama_jeniskelamin = "") {
        $data = array(
            "nama_jeniskelamin" => $nama_jeniskelamin
        );
        $this->db->where('id_jk', $id_jeniskelamin);
        $this->db->update('m_jeniskelamin', $data);
    }

    function delete($id_jeniskelamin = "") {
        if ($id_jeniskelamin) {
            $this->db->delete("m_jeniskelamin", array("id_jk" => $id_jk));
        }
    }

    function Chek_Data($id_jeniskelamin = "", $nama_jeniskelamin = "") {
        if ($id_jeniskelamin) {
            $this->db->where("id_jk", $id_jk);
        } else {
            $this->db->where("nama_jeniskelamin", $nama_jeniskelamin);
        }
        $query = $this->db->get("m_jeniskelamin");
        return $query->num_rows();
    }

    function List_Data($id_jeniskelamin = "") {
        $query = $this->db->get_where('m_jeniskelamin', array('id_jk' => $id_jk));
        return $query->row();
    }

}
