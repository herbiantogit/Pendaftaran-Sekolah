<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agama_m extends CI_Model {

    function getDataComboBox($id_label = "", $id_selected = "") {
        $options = array();
        $items = array();
        $this->db->order_by("nama_agama", "asc");
        $query = $this->db->get('m_agama');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $i++;
                if ($i == 1) {
                    $items[""] = "";
                }
                $items[$row->id_agama] = $row->nama_agama;
            }
            $options = $items;
        }
        return form_dropdown($id_label, $options, $id_selected, 'id ="' . $id_label . '" Class="select2me form-control" data-placeholder="Pilih Agama..."');
    }

    function getAgama($criteria = "", $keyword = "", $sort = "", $dir = "", $start = "", $limit = "") {
        $this->db->from("m_agama a");
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

    function getCountAgama($criteria = "", $keyword = "") {
        $this->db->from("m_agama a");
        if ($criteria && $keyword) {
            $this->db->like($criteria, $keyword);
        }
        return $this->db->count_all_results();
    }

    function insert($nama_agama = "") {
        $data = array(
            "nama_agama" => $nama_agama
        );
        $this->db->insert("m_agama", $data);
    }

    function update($id_agama = "", $nama_agama = "") {
        $data = array(
            "nama_agama" => $nama_agama
        );
        $this->db->where('id_agama', $id_agama);
        $this->db->update('m_agama', $data);
    }

    function delete($id_agama = "") {
        if ($id_agama) {
            $this->db->delete("m_agama", array("id_agama" => $id_agama));
        }
    }

    function Chek_Data($id_agama = "", $nama_agama = "") {
        if ($id_agama) {
            $this->db->where("id_agama", $id_agama);
        } else {
            $this->db->where("nama_agama", $nama_agama);
        }
        $query = $this->db->get("m_agama");
        return $query->num_rows();
    }

    function List_Data($id_agama = "") {
        $query = $this->db->get_where('m_agama', array('id_agama' => $id_agama));
        return $query->row();
    }

}
