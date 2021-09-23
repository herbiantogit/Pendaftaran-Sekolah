<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendidikan_m extends CI_Model {

    function getDataComboBox($id_label = "", $id_selected = "") {
        $options = array();
        $items = array();
        $this->db->order_by("nama_pendidikan", "asc");
        $query = $this->db->get('m_pendidikan');
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $i++;
                if ($i == 1) {
                    $items[""] = "";
                }
                $items[$row->id_pendidikan] = $row->nama_pendidikan;
            }
            $options = $items;
        }
        return form_dropdown($id_label, $options, $id_selected, 'id ="' . $id_label . '" Class="select2me form-control" data-placeholder="Pilih Pendidikan..."');
    }

    function getPendidikan($criteria = "", $keyword = "", $sort = "", $dir = "", $start = "", $limit = "") {
        $this->db->from("m_pendidikan a");
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

    function getCountPendidikan($criteria = "", $keyword = "") {
        $this->db->from("m_pendidikan a");
        if ($criteria && $keyword) {
            $this->db->like($criteria, $keyword);
        }
        return $this->db->count_all_results();
    }

    function insert($nama_pendidikan = "") {
        $data = array(
            "nama_pendidikan" => $nama_pendidikan
        );
        $this->db->insert("m_pendidikan", $data);
    }

    function update($id_pendidikan = "", $nama_pendidikan = "") {
        $data = array(
            "nama_pendidikan" => $nama_pendidikan
        );
        $this->db->where('id_pendidikan', $id_pendidikan);
        $this->db->update('m_pendidikan', $data);
    }

    function delete($id_pendidikan = "") {
        if ($id_pendidikan) {
            $this->db->delete("m_pendidikan", array("id_pendidikan" => $id_pendidikan));
        }
    }

    function Chek_Data($id_pendidikan = "", $nama_pendidikan = "") {
        if ($id_pendidikan) {
            $this->db->where("id_pendidikan", $id_pendidikan);
        } else {
            $this->db->where("nama_pendidikan", $nama_pendidikan);
        }
        $query = $this->db->get("m_pendidikan");
        return $query->num_rows();
    }

    function List_Data($id_pendidikan = "") {
        $query = $this->db->get_where('m_pendidikan', array('id_pendidikan' => $id_pendidikan));
        return $query->row();
    }

}
