<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transportasi_m extends CI_Model {

    function getDataComboBox($id_label = "", $id_selected = "") {
        $options = array();
        $items = array();
        $this->db->order_by("nama_transportasi", "asc");
        $query = $this->db->get('m_transportasi');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $i++;
                if ($i == 1) {
                    $items[""] = "";
                }
                $items[$row->id_transportasi] = $row->nama_transportasi;
            }
            $options = $items;
        }
        return form_dropdown($id_label, $options, $id_selected, 'id ="' . $id_label . '" Class="select2me form-control" data-placeholder="Pilih Transportasi..."');
    }

    function getTransportasi($criteria = "", $keyword = "", $sort = "", $dir = "", $start = "", $limit = "") {
        $this->db->from("m_transportasi a");
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

    function getCountTransportasi($criteria = "", $keyword = "") {
        $this->db->from("m_transportasi a");
        if ($criteria && $keyword) {
            $this->db->like($criteria, $keyword);
        }
        return $this->db->count_all_results();
    }

    function insert($nama_transportasi = "") {
        $data = array(
            "nama_transportasi" => $nama_transportasi
        );
        $this->db->insert("m_transportasi", $data);
    }

    function update($id_transportasi = "", $nama_transportasi = "") {
        $data = array(
            "nama_transportasi" => $nama_transportasi
        );
        $this->db->where('id_transportasi', $id_transportasi);
        $this->db->update('m_transportasi', $data);
    }

    function delete($id_transportasi = "") {
        if ($id_transportasi) {
            $this->db->delete("m_transportasi", array("id_transportasi" => $id_transportasi));
        }
    }

    function Chek_Data($id_transportasi = "", $nama_transportasi = "") {
        if ($id_transportasi) {
            $this->db->where("id_transportasi", $id_transportasi);
        } else {
            $this->db->where("nama_transportasi", $nama_transportasi);
        }
        $query = $this->db->get("m_transportasi");
        return $query->num_rows();
    }

    function List_Data($id_transportasi = "") {
        $query = $this->db->get_where('m_transportasi', array('id_transportasi' => $id_transportasi));
        return $query->row();
    }

}
