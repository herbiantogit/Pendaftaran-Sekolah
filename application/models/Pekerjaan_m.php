<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pekerjaan_m extends CI_Model {

    function getDataComboBox($id_label = "", $id_selected = "") {
        $options = array();
        $items = array();
        $this->db->order_by("nama_pekerjaan", "asc");
        $query = $this->db->get('m_pekerjaan');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $i++;
                if ($i == 1) {
                    $items[""] = "";
                }
                $items[$row->id_pekerjaan] = $row->nama_pekerjaan;
            }
            $options = $items;
        }
        return form_dropdown($id_label, $options, $id_selected, 'id ="' . $id_label . '" Class="select2me form-control" data-placeholder="Pilih Pekerjaan..."');
    }

    function getPekerjaan($criteria = "", $keyword = "", $sort = "", $dir = "", $start = "", $limit = "") {
        $this->db->from("m_pekerjaan a");
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

    function getCountPekerjaan($criteria = "", $keyword = "") {
        $this->db->from("m_pekerjaan a");
        if ($criteria && $keyword) {
            $this->db->like($criteria, $keyword);
        }
        return $this->db->count_all_results();
    }

    function insert($nama_pekerjaan = "") {
        $data = array(
            "nama_pekerjaan" => $nama_pekerjaan
        );
        $this->db->insert("m_pekerjaan", $data);
    }

    function update($id_pekerjaan = "", $nama_pekerjaan = "") {
        $data = array(
            "nama_pekerjaan" => $nama_pekerjaan
        );
        $this->db->where('id_pekerjaan', $id_pekerjaan);
        $this->db->update('m_pekerjaan', $data);
    }

    function delete($id_pekerjaan = "") {
        if ($id_pekerjaan) {
            $this->db->delete("m_pekerjaan", array("id_pekerjaan" => $id_pekerjaan));
        }
    }

    function Chek_Data($id_pekerjaan = "", $nama_pekerjaan = "") {
        if ($id_pekerjaan) {
            $this->db->where("id_pekerjaan", $id_pekerjaan);
        } else {
            $this->db->where("nama_pekerjaan", $nama_pekerjaan);
        }
        $query = $this->db->get("m_pekerjaan");
        return $query->num_rows();
    }

    function List_Data($id_pekerjaan = "") {
        $query = $this->db->get_where('m_pekerjaan', array('id_pekerjaan' => $id_pekerjaan));
        return $query->row();
    }

}
