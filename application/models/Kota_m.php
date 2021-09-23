<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Provinsi_m extends CI_Model {

    function getDataComboBox($id_label = "", $id_selected = "") {
        $options = array();
        $items = array();
        $this->db->order_by("nama_provinsi", "asc");
        $query = $this->db->get('m_provinsi');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $i++;
                if ($i == 1) {
                    $items[""] = "";
                }
                $items[$row->id_provinsi] = $row->nama_provinsi;
            }
            $options = $items;
        }
        return form_dropdown($id_label, $options, $id_selected, 'id ="' . $id_label . '" Class="select2me form-control" data-placeholder="Pilih Jenis keluarga..."');
    }

    function getProvinsi($criteria = "", $keyword = "", $sort = "", $dir = "", $start = "", $limit = "") {
        $this->db->from("m_provinsi a");
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

    function getCountProvinsi($criteria = "", $keyword = "") {
        $this->db->from("m_provinsi a");
        if ($criteria && $keyword) {
            $this->db->like($criteria, $keyword);
        }
        return $this->db->count_all_results();
    }

    function insert($nama_provinsi = "") {
        $data = array(
            "nama_provinsi" => $nama_provinsi
        );
        $this->db->insert("m_provinsi", $data);
    }

    function update($id_provinsi = "", $nama_provinsi = "") {
        $data = array(
            "nama_provinsi" => $nama_provinsi
        );
        $this->db->where('id_provinsi', $id_provinsi);
        $this->db->update('m_provinsi', $data);
    }

    function delete($id_provinsi = "") {
        if ($id_provinsi) {
            $this->db->delete("m_provinsi", array("id_provinsi" => $id_provinsi));
        }
    }

    function Chek_Data($id_provinsi = "", $nama_provinsi = "") {
        if ($id_provinsi) {
            $this->db->where("id_provinsi", $id_provinsi);
        } else {
            $this->db->where("nama_provinsi", $nama_provinsi);
        }
        $query = $this->db->get("m_provinsi");
        return $query->num_rows();
    }

    function List_Data($id_provinsi = "") {
        $query = $this->db->get_where('m_provinsi', array('id_provinsi' => $id_provinsi));
        return $query->row();
    }

}
