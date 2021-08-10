<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_keluarga_m extends CI_Model {

    function getDataComboBox($id_label = "", $id_selected = "") {
        $options = array();
        $items = array();
        $this->db->order_by("nama_jenis_keluarga", "asc");
        $query = $this->db->get('m_jenis_keluarga');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $i++;
                if ($i == 1) {
                    $items[""] = "";
                }
                $items[$row->id_jenis_keluarga] = $row->nama_jenis_keluarga;
            }
            $options = $items;
        }
        return form_dropdown($id_label, $options, $id_selected, 'id ="' . $id_label . '" Class="select2me form-control" data-placeholder="Pilih Jenis keluarga..."');
    }

    function getJenis_keluarga($criteria = "", $keyword = "", $sort = "", $dir = "", $start = "", $limit = "") {
        $this->db->from("m_jenis_keluarga a");
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

    function getCountJenis_keluarga($criteria = "", $keyword = "") {
        $this->db->from("m_jenis_keluarga a");
        if ($criteria && $keyword) {
            $this->db->like($criteria, $keyword);
        }
        return $this->db->count_all_results();
    }

    function insert($nama_jenis_keluarga = "") {
        $data = array(
            "nama_jenis_keluarga" => $nama_jenis_keluarga
        );
        $this->db->insert("m_jenis_keluarga", $data);
    }

    function update($id_jenis_keluarga = "", $nama_jenis_keluarga = "") {
        $data = array(
            "nama_jenis_keluarga" => $nama_jenis_keluarga
        );
        $this->db->where('id_jenis_keluarga', $id_jenis_keluarga);
        $this->db->update('m_jenis_keluarga', $data);
    }

    function delete($id_jenis_keluarga = "") {
        if ($id_jenis_keluarga) {
            $this->db->delete("m_jenis_keluarga", array("id_jenis_keluarga" => $id_jenis_keluarga));
        }
    }

    function Chek_Data($id_jenis_keluarga = "", $nama_jenis_keluarga = "") {
        if ($id_jenis_keluarga) {
            $this->db->where("id_jenis_keluarga", $id_jenis_keluarga);
        } else {
            $this->db->where("nama_jenis_keluarga", $nama_jenis_keluarga);
        }
        $query = $this->db->get("m_jenis_keluarga");
        return $query->num_rows();
    }

    function List_Data($id_jenis_keluarga = "") {
        $query = $this->db->get_where('m_jenis_keluarga', array('id_jenis_keluarga' => $id_jenis_keluarga));
        return $query->row();
    }

}
