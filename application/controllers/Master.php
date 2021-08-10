<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Menuakses_m');
        $this->load->model('Jabatan_m');
        $this->load->model('Agama_m');
        $this->load->model('Pekerjaan_m');
        $this->load->model('Pendidikan_m');
        $this->load->model('Transportasi_m');
        $this->load->model('Jeniskelamin_m');
        $this->load->model('Jenis_keluarga_m');
        $this->load->model('User_m');
        
        $this->Layout_m->Check_Login();
    }

    /*
     * Master Menu Akses
     */

    function akses() {
        $data['nama_menu'] = "Menu Akses";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $data['id_jabatan'] = $this->Jabatan_m->getDataComboBox('id_jabatan');
        $data['id_menu'] = $this->Menuakses_m->getDataComboBox('id_menu');

        $this->parser->parse('master/akses_v', $data);
    }

    function do_Simpan_Akses() {
        $return = array();
        $error = "";
        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_jabatan = ($this->input->post("id_jabatan") != "") ? $this->input->post("id_jabatan") : "";
        $id_menu = ($this->input->post("id_menu") != "") ? $this->input->post("id_menu") : "";
        if ($mode_form == "Tambah") {
            foreach (explode(",", $id_menu) as $id_menu) {
                $this->Menuakses_m->insert($id_menu, $id_jabatan);
            }
        } else if ($mode_form == "Ubah") {
            $this->Menuakses_m->delete_all($id_jabatan);
            foreach (explode(",", $id_menu) as $id_menu) {
                $this->Menuakses_m->insert($id_menu, $id_jabatan);
            }
        }
        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data Menu Akses Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data Menu Akses Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Tabel_Akses() {

        $records["aaData"] = array();
        $aColumns = array('id_menu_user', 'nama_menu', 'nama_jabatan');
        //default
        $sort = "id_menu_user";
        $dir = "desc";
        $criteria = "upper(nama_menu || nama_jabatan)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->Menuakses_m->getCountMenuakses($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->Menuakses_m->getMenuakses($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $records["aaData"][] = array(
                    $no,
                    $Fields->nama_menu,
                    $Fields->nama_jabatan,
                    '<center><a href="javascript:;" data-id="' . $Fields->id_menu_user . '" data-name="' . $Fields->nama_menu . '" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Hapus_Akses() {
        $id_menu_user = ($this->input->post("id_menu_user") != "") ? $this->input->post("id_menu_user") : "";
        $this->Menuakses_m->delete($id_menu_user);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data User Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data User Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }



     /*
     * Master Agama
     */

    function agama() {
        $data['nama_menu'] = "Agama";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('master/agama_v', $data);
    }

    function do_Tabel_Agama() {

        $records["aaData"] = array();
        $aColumns = array('id_agama', 'nama_agama');
        //default
        $sort = "id_agama";
        $dir = "desc";
        $criteria = "upper(nama_agama)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->Agama_m->getCountAgama($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->Agama_m->getAgama($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $records["aaData"][] = array(
                    '<center>' . $no . '.</center>',
                    $Fields->nama_agama,
                    '<center><a href="javascript:;" data-id="' . $Fields->id_agama . '" data-name="' . $Fields->nama_agama . '" class="btn btn-xs yellow btn-editable"><i class="fa fa-pencil"></i> Ubah</a> '
                    . '<a href="javascript:;" data-id="' . $Fields->id_agama . '" data-name="' . $Fields->nama_agama . '" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Simpan_Agama() {
        $return = array();
        $error = "";

        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_agama = ($this->input->post("id_agama") != "") ? $this->input->post("id_agama") : "";
        $nama_agama = ($this->input->post("nama_agama") != "") ? $this->input->post("nama_agama") : "";

        if ($mode_form == "Tambah") {
            if ($this->Agama_m->Chek_Data("", $nama_agama) == 0) {
                $this->Agama_m->insert($nama_agama);
            } else {
                $error = "Maaf, Data Agama Sudah ada. !!!";
            }
        } else if ($mode_form == "Ubah") {
            if ($this->Agama_m->Chek_Data($id_agama) > 0) {
                $this->Agama_m->update($id_agama, $nama_agama);
            } else {
                $error = "Maaf, Data Agama Tidak ditemukan. !!!";
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data Agama Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data Agama Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Hapus_Agama() {
        $id_agama = ($this->input->post("id_agama") != "") ? $this->input->post("id_agama") : "";
        $this->Agama_m->delete($id_agama);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data Agama Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data Agama Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }

    function do_Ubah_Agama() {
        $return = array();
        $itemList = array();
        $id_agama = ($this->input->post("id_agama") != "") ? $this->input->post("id_agama") : "";
        if ($this->Agama_m->Chek_Data($id_agama) > 0) {
            $Fields = $this->Agama_m->List_Data($id_agama);
            $item = array(
                "mode_form" => "Ubah",
                "id_agama" => $Fields->id_agama,
                "nama_agama" => $Fields->nama_agama
            );
            $itemList[] = $item;
            $return["success"] = TRUE;
            $return["results"] = $item;
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Data Agama Tidak Ditemukan.";
        }

        echo json_encode($return);
    }


    /*
     * Master Jabatan
     */

    function jabatan() {
        $data['nama_menu'] = "Jabatan";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('master/jabatan_v', $data);
    }

    function do_Tabel_Jabatan() {

        $records["aaData"] = array();
        $aColumns = array('id_jabatan', 'nama_jabatan');
        //default
        $sort = "id_jabatan";
        $dir = "desc";
        $criteria = "upper(nama_jabatan)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->Jabatan_m->getCountJabatan($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->Jabatan_m->getJabatan($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $records["aaData"][] = array(
                    '<center>' . $no . '.</center>',
                    $Fields->nama_jabatan,
                    '<center><a href="javascript:;" data-id="' . $Fields->id_jabatan . '" data-name="' . $Fields->nama_jabatan . '" class="btn btn-xs yellow btn-editable"><i class="fa fa-pencil"></i> Ubah</a> '
                    . '<a href="javascript:;" data-id="' . $Fields->id_jabatan . '" data-name="' . $Fields->nama_jabatan . '" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Simpan_Jabatan() {
        $return = array();
        $error = "";

        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_jabatan = ($this->input->post("id_jabatan") != "") ? $this->input->post("id_jabatan") : "";
        $nama_jabatan = ($this->input->post("nama_jabatan") != "") ? $this->input->post("nama_jabatan") : "";

        if ($mode_form == "Tambah") {
            if ($this->Jabatan_m->Chek_Data("", $nama_jabatan) == 0) {
                $this->Jabatan_m->insert($nama_jabatan);
            } else {
                $error = "Maaf, Data Jabatan Sudah ada. !!!";
            }
        } else if ($mode_form == "Ubah") {
            if ($this->Jabatan_m->Chek_Data($id_jabatan) > 0) {
                $this->Jabatan_m->update($id_jabatan, $nama_jabatan);
            } else {
                $error = "Maaf, Data Jabatan Tidak ditemukan. !!!";
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data Jabatan Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data Jabatan Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Hapus_Jabatan() {
        $id_jabatan = ($this->input->post("id_jabatan") != "") ? $this->input->post("id_jabatan") : "";
        $this->Jabatan_m->delete($id_jabatan);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data Jabatan Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data Jabatan Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }

    function do_Ubah_Jabatan() {
        $return = array();
        $itemList = array();
        $id_jabatan = ($this->input->post("id_jabatan") != "") ? $this->input->post("id_jabatan") : "";
        if ($this->Jabatan_m->Chek_Data($id_jabatan) > 0) {
            $Fields = $this->Jabatan_m->List_Data($id_jabatan);
            $item = array(
                "mode_form" => "Ubah",
                "id_jabatan" => $Fields->id_jabatan,
                "nama_jabatan" => $Fields->nama_jabatan
            );
            $itemList[] = $item;
            $return["success"] = TRUE;
            $return["results"] = $item;
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Data Jabatan Tidak Ditemukan.";
        }

        echo json_encode($return);
    }


   /*
     * Master Pekerjaan
     */

    function pekerjaan() {
        $data['nama_menu'] = "Pekerjaan";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('master/pekerjaan_v', $data);
    }

    function do_Tabel_Pekerjaan() {

        $records["aaData"] = array();
        $aColumns = array('id_pekerjaan', 'nama_pekerjaan');
        //default
        $sort = "id_pekerjaan";
        $dir = "desc";
        $criteria = "upper(nama_pekerjaan)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->Pekerjaan_m->getCountPekerjaan($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->Pekerjaan_m->getPekerjaan($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $records["aaData"][] = array(
                    '<center>' . $no . '.</center>',
                    $Fields->nama_pekerjaan,
                    '<center><a href="javascript:;" data-id="' . $Fields->id_pekerjaan . '" data-name="' . $Fields->nama_pekerjaan . '" class="btn btn-xs yellow btn-editable"><i class="fa fa-pencil"></i> Ubah</a> '
                    . '<a href="javascript:;" data-id="' . $Fields->id_pekerjaan . '" data-name="' . $Fields->nama_pekerjaan . '" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Simpan_Pekerjaan() {
        $return = array();
        $error = "";

        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_pekerjaan = ($this->input->post("id_pekerjaan") != "") ? $this->input->post("id_pekerjaan") : "";
        $nama_pekerjaan = ($this->input->post("nama_pekerjaan") != "") ? $this->input->post("nama_pekerjaan") : "";

        if ($mode_form == "Tambah") {
            if ($this->Pekerjaan_m->Chek_Data("", $nama_pekerjaan) == 0) {
                $this->Pekerjaan_m->insert($nama_pekerjaan);
            } else {
                $error = "Maaf, Data Pekerjaan Sudah ada. !!!";
            }
        } else if ($mode_form == "Ubah") {
            if ($this->Pekerjaan_m->Chek_Data($id_pekerjaan) > 0) {
                $this->Pekerjaan_m->update($id_pekerjaan, $nama_pekerjaan);
            } else {
                $error = "Maaf, Data Pekerjaan Tidak ditemukan. !!!";
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data Pekerjaan Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data Pekerjaan Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Hapus_Pekerjaan() {
        $id_pekerjaan = ($this->input->post("id_pekerjaan") != "") ? $this->input->post("id_pekerjaan") : "";
        $this->Pekerjaan_m->delete($id_pekerjaan);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data Pekerjaan Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data Pekerjaan Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }

    function do_Ubah_Pekerjaan() {
        $return = array();
        $itemList = array();
        $id_pekerjaan = ($this->input->post("id_pekerjaan") != "") ? $this->input->post("id_pekerjaan") : "";
        if ($this->Pekerjaan_m->Chek_Data($id_pekerjaan) > 0) {
            $Fields = $this->Pekerjaan_m->List_Data($id_pekerjaan);
            $item = array(
                "mode_form" => "Ubah",
                "id_pekerjaan" => $Fields->id_pekerjaan,
                "nama_pekerjaan" => $Fields->nama_pekerjaan
            );
            $itemList[] = $item;
            $return["success"] = TRUE;
            $return["results"] = $item;
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Data Pekerjaan Tidak Ditemukan.";
        }

        echo json_encode($return);
    }

   /*
     * Master Pendidikan
     */

    function pendidikan() {
        $data['nama_menu'] = "Pendidikan";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('master/pendidikan_v', $data);
    }

    function do_Tabel_Pendidikan() {

        $records["aaData"] = array();
        $aColumns = array('id_pendidikan', 'nama_pendidikan');
        //default
        $sort = "id_pendidikan";
        $dir = "desc";
        $criteria = "upper(nama_pendidikan)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->Pendidikan_m->getCountPendidikan($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->Pendidikan_m->getPendidikan($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $records["aaData"][] = array(
                    '<center>' . $no . '.</center>',
                    $Fields->nama_pendidikan,
                    '<center><a href="javascript:;" data-id="' . $Fields->id_pendidikan . '" data-name="' . $Fields->nama_pendidikan . '" class="btn btn-xs yellow btn-editable"><i class="fa fa-pencil"></i> Ubah</a> '
                    . '<a href="javascript:;" data-id="' . $Fields->id_pendidikan . '" data-name="' . $Fields->nama_pendidikan . '" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Simpan_Pendidikan() {
        $return = array();
        $error = "";

        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_pendidikan = ($this->input->post("id_pendidikan") != "") ? $this->input->post("id_pendidikan") : "";
        $nama_pendidikan = ($this->input->post("nama_pendidikan") != "") ? $this->input->post("nama_pendidikan") : "";

        if ($mode_form == "Tambah") {
            if ($this->Pendidikan_m->Chek_Data("", $nama_pendidikan) == 0) {
                $this->Pendidikan_m->insert($nama_pendidikan);
            } else {
                $error = "Maaf, Data Pendidikan Sudah ada. !!!";
            }
        } else if ($mode_form == "Ubah") {
            if ($this->Pendidikan_m->Chek_Data($id_pendidikan) > 0) {
                $this->Pendidikan_m->update($id_pendidikan, $nama_pendidikan);
            } else {
                $error = "Maaf, Data Pendidikan Tidak ditemukan. !!!";
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data Pendidikan Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data Pendidikan Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Hapus_Pendidikan() {
        $id_pendidikan = ($this->input->post("id_pendidikan") != "") ? $this->input->post("id_pendidikan") : "";
        $this->Pendidikan_m->delete($id_pendidikan);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data Pendidikan Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data Pendidikan Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }

    function do_Ubah_Pendidikan() {
        $return = array();
        $itemList = array();
        $id_pendidikan = ($this->input->post("id_pendidikan") != "") ? $this->input->post("id_pendidikan") : "";
        if ($this->Pendidikan_m->Chek_Data($id_pendidikan) > 0) {
            $Fields = $this->Pendidikan_m->List_Data($id_pendidikan);
            $item = array(
                "mode_form" => "Ubah",
                "id_pendidikan" => $Fields->id_pendidikan,
                "nama_pendidikan" => $Fields->nama_pendidikan
            );
            $itemList[] = $item;
            $return["success"] = TRUE;
            $return["results"] = $item;
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Data Pendidikan Tidak Ditemukan.";
        }

        echo json_encode($return);
    }

/*
     * Master Jk
     */

    function jk() {
        $data['nama_menu'] = "Jk";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('master/jk_v', $data);
    }

    function do_Tabel_Jk() {

        $records["aaData"] = array();
        $aColumns = array('id_jk', 'nama_jk');
        //default
        $sort = "id_jk";
        $dir = "desc";
        $criteria = "upper(nama_jk)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->Jk_m->getCountJk($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->Jk_m->getJk($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $records["aaData"][] = array(
                    '<center>' . $no . '.</center>',
                    $Fields->nama_jk,
                    '<center><a href="javascript:;" data-id="' . $Fields->id_jk . '" data-name="' . $Fields->nama_jk . '" class="btn btn-xs yellow btn-editable"><i class="fa fa-pencil"></i> Ubah</a> '
                    . '<a href="javascript:;" data-id="' . $Fields->id_jk . '" data-name="' . $Fields->nama_jk . '" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Simpan_Jk() {
        $return = array();
        $error = "";

        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_jk = ($this->input->post("id_jk") != "") ? $this->input->post("id_jk") : "";
        $nama_jk = ($this->input->post("nama_jk") != "") ? $this->input->post("nama_jk") : "";

        if ($mode_form == "Tambah") {
            if ($this->Jk_m->Chek_Data("", $nama_jk) == 0) {
                $this->Jk_m->insert($nama_jk);
            } else {
                $error = "Maaf, Data Jk Sudah ada. !!!";
            }
        } else if ($mode_form == "Ubah") {
            if ($this->Jk_m->Chek_Data($id_jk) > 0) {
                $this->Jk_m->update($id_jk, $nama_jk);
            } else {
                $error = "Maaf, Data Jk Tidak ditemukan. !!!";
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data Jk Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data Jk Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Hapus_Jk() {
        $id_jk = ($this->input->post("id_jk") != "") ? $this->input->post("id_jk") : "";
        $this->Jk_m->delete($id_jk);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data Jk Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data Jk Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }

    function do_Ubah_Jk() {
        $return = array();
        $itemList = array();
        $id_jk = ($this->input->post("id_jk") != "") ? $this->input->post("id_jk") : "";
        if ($this->Jk_m->Chek_Data($id_jk) > 0) {
            $Fields = $this->Jk_m->List_Data($id_jk);
            $item = array(
                "mode_form" => "Ubah",
                "id_jk" => $Fields->id_jk,
                "nama_jk" => $Fields->nama_jk
            );
            $itemList[] = $item;
            $return["success"] = TRUE;
            $return["results"] = $item;
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Data Jk Tidak Ditemukan.";
        }

        echo json_encode($return);
    }



/*
     * Master Transportasi
     */

    function transportasi() {
        $data['nama_menu'] = "Transportasi";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('master/transportasi_v', $data);
    }

    function do_Tabel_Transportasi() {

        $records["aaData"] = array();
        $aColumns = array('id_transportasi', 'nama_transportasi');
        //default
        $sort = "id_transportasi";
        $dir = "desc";
        $criteria = "upper(nama_transportasi)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->Transportasi_m->getCountTransportasi($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->Transportasi_m->getTransportasi($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $records["aaData"][] = array(
                    '<center>' . $no . '.</center>',
                    $Fields->nama_transportasi,
                    '<center><a href="javascript:;" data-id="' . $Fields->id_transportasi . '" data-name="' . $Fields->nama_transportasi . '" class="btn btn-xs yellow btn-editable"><i class="fa fa-pencil"></i> Ubah</a> '
                    . '<a href="javascript:;" data-id="' . $Fields->id_transportasi . '" data-name="' . $Fields->nama_transportasi . '" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Simpan_Transportasi() {
        $return = array();
        $error = "";

        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_transportasi = ($this->input->post("id_transportasi") != "") ? $this->input->post("id_transportasi") : "";
        $nama_transportasi = ($this->input->post("nama_transportasi") != "") ? $this->input->post("nama_transportasi") : "";

        if ($mode_form == "Tambah") {
            if ($this->Transportasi_m->Chek_Data("", $nama_transportasi) == 0) {
                $this->Transportasi_m->insert($nama_transportasi);
            } else {
                $error = "Maaf, Data Transportasi Sudah ada. !!!";
            }
        } else if ($mode_form == "Ubah") {
            if ($this->Transportasi_m->Chek_Data($id_transportasi) > 0) {
                $this->Transportasi_m->update($id_transportasi, $nama_transportasi);
            } else {
                $error = "Maaf, Data Transportasi Tidak ditemukan. !!!";
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data Transportasi Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data Transportasi Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Hapus_Transportasi() {
        $id_transportasi = ($this->input->post("id_transportasi") != "") ? $this->input->post("id_transportasi") : "";
        $this->Transportasi_m->delete($id_transportasi);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data Transportasi Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data Transportasi Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }

    function do_Ubah_Transportasi() {
        $return = array();
        $itemList = array();
        $id_transportasi = ($this->input->post("id_transportasi") != "") ? $this->input->post("id_transportasi") : "";
        if ($this->Transportasi_m->Chek_Data($id_transportasi) > 0) {
            $Fields = $this->Transportasi_m->List_Data($id_transportasi);
            $item = array(
                "mode_form" => "Ubah",
                "id_transportasi" => $Fields->id_transportasi,
                "nama_transportasi" => $Fields->nama_transportasi
            );
            $itemList[] = $item;
            $return["success"] = TRUE;
            $return["results"] = $item;
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Data Transportasi Tidak Ditemukan.";
        }

        echo json_encode($return);
    }


/*
     * Master Jeniskelamin
     */

    function jeniskelamin() {
        $data['nama_menu'] = "Jenis kelamin";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('master/jeniskelamin_v', $data);
    }

    function do_Tabel_Jeniskelamin() {

        $records["aaData"] = array();
        $aColumns = array('id_jeniskelamin', 'nama_jeniskelamin');
        //default
        $sort = "id_jk";
        $dir = "desc";
        $criteria = "upper(nama_jeniskelamin)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->Jeniskelamin_m->getCountJeniskelamin($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->Jeniskelamin_m->getJeniskelamin($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $records["aaData"][] = array(
                    '<center>' . $no . '.</center>',
                    $Fields->nama_jeniskelamin,
                    '<center><a href="javascript:;" data-id="' . $Fields->id_jk . '" data-name="' . $Fields->nama_jeniskelamin . '" class="btn btn-xs yellow btn-editable"><i class="fa fa-pencil"></i> Ubah</a> '
                    . '<a href="javascript:;" data-id="' . $Fields->id_jk . '" data-name="' . $Fields->nama_jeniskelamin . '" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Simpan_Jeniskelamin() {
        $return = array();
        $error = "";

        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_jeniskelamin = ($this->input->post("id_jk") != "") ? $this->input->post("id_jk") : "";
        $nama_jeniskelamin = ($this->input->post("nama_jeniskelamin") != "") ? $this->input->post("nama_jeniskelamin") : "";

        if ($mode_form == "Tambah") {
            if ($this->Jeniskelamin_m->Chek_Data("", $nama_jeniskelamin) == 0) {
                $this->Jeniskelamin_m->insert($nama_jeniskelamin);
            } else {
                $error = "Maaf, Data Jeniskelamin Sudah ada. !!!";
            }
        } else if ($mode_form == "Ubah") {
            if ($this->Jeniskelamin_m->Chek_Data($id_jeniskelamin) > 0) {
                $this->Jeniskelamin_m->update($id_jeniskelamin, $nama_jeniskelamin);
            } else {
                $error = "Maaf, Data Jeniskelamin Tidak ditemukan. !!!";
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data Jeniskelamin Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data Jeniskelamin Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Hapus_Jeniskelamin() {
        $id_jeniskelamin = ($this->input->post("id_jk") != "") ? $this->input->post("id_jk") : "";
        $this->Jeniskelamin_m->delete($id_jk);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data Jeniskelamin Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data Jeniskelamin Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }

    function do_Ubah_Jeniskelamin() {
        $return = array();
        $itemList = array();
        $id_jeniskelamin = ($this->input->post("id_jk") != "") ? $this->input->post("id_jk") : "";
        if ($this->Jeniskelamin_m->Chek_Data($id_jeniskelamin) > 0) {
            $Fields = $this->Jeniskelamin_m->List_Data($id_jeniskelamin);
            $item = array(
                "mode_form" => "Ubah",
                "id_jk" => $Fields->id_jeniskelamin,
                "nama_jeniskelamin" => $Fields->nama_jeniskelamin
            );
            $itemList[] = $item;
            $return["success"] = TRUE;
            $return["results"] = $item;
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Data Jeniskelamin Tidak Ditemukan.";
        }

        echo json_encode($return);
    }


 /*
     * Master Jenis_keluarga
     */

    function jenis_keluarga() {
        $data['nama_menu'] = "Jenis_keluarga";

        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('master/jenis_keluarga_v', $data);
    }

    function do_Tabel_Jenis_keluarga() {

        $records["aaData"] = array();
        $aColumns = array('id_jenis_keluarga', 'nama_jenis_keluarga');
        //default
        $sort = "id_jenis_keluarga";
        $dir = "desc";
        $criteria = "upper(nama_jenis_keluarga)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->Jenis_keluarga_m->getCountJenis_keluarga($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->Jenis_keluarga_m->getJenis_keluarga($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $records["aaData"][] = array(
                    '<center>' . $no . '.</center>',
                    $Fields->nama_jenis_keluarga,
                    '<center><a href="javascript:;" data-id="' . $Fields->id_jenis_keluarga . '" data-name="' . $Fields->nama_jenis_keluarga . '" class="btn btn-xs yellow btn-editable"><i class="fa fa-pencil"></i> Ubah</a> '
                    . '<a href="javascript:;" data-id="' . $Fields->id_jenis_keluarga . '" data-name="' . $Fields->nama_jenis_keluarga . '" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Simpan_Jenis_keluarga() {
        $return = array();
        $error = "";

        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_jenis_keluarga = ($this->input->post("id_jenis_keluarga") != "") ? $this->input->post("id_jenis_keluarga") : "";
        $nama_jenis_keluarga = ($this->input->post("nama_jenis_keluarga") != "") ? $this->input->post("nama_jenis_keluarga") : "";

        if ($mode_form == "Tambah") {
            if ($this->Jenis_keluarga_m->Chek_Data("", $nama_jenis_keluarga) == 0) {
                $this->Jenis_keluarga_m->insert($nama_jenis_keluarga);
            } else {
                $error = "Maaf, Data Jenis keluarga Sudah ada. !!!";
            }
        } else if ($mode_form == "Ubah") {
            if ($this->Jenis_keluarga_m->Chek_Data($id_jenis_keluarga) > 0) {
                $this->Jenis_keluarga_m->update($id_jenis_keluarga, $nama_jenis_keluarga);
            } else {
                $error = "Maaf, Data Jenis keluarga Tidak ditemukan. !!!";
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data Jenis keluarga Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data Jenis keluarga Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Hapus_Jenis_keluarga() {
        $id_jenis_keluarga = ($this->input->post("id_jenis_keluarga") != "") ? $this->input->post("id_jenis_keluarga") : "";
        $this->Jenis_keluarga_m->delete($id_jenis_keluarga);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data Jenis keluarga Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data Jenis keluarga Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }

    function do_Ubah_Jenis_keluarga() {
        $return = array();
        $itemList = array();
        $id_jenis_keluarga = ($this->input->post("id_jenis_keluarga") != "") ? $this->input->post("id_jenis_keluarga") : "";
        if ($this->Jenis_keluarga_m->Chek_Data($id_jenis_keluarga) > 0) {
            $Fields = $this->Jenis_keluarga_m->List_Data($id_jenis_keluarga);
            $item = array(
                "mode_form" => "Ubah",
                "id_jenis_keluarga" => $Fields->id_jenis_keluarga,
                "nama_jenis_keluarga" => $Fields->nama_jenis_keluarga
            );
            $itemList[] = $item;
            $return["success"] = TRUE;
            $return["results"] = $item;
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Data Jenis keluarga Tidak Ditemukan.";
        }

        echo json_encode($return);
    }

    /*
     * Master User
     */

    function user() {
        $data['nama_menu'] = "User";
        $data['parent_id_menu'] = $this->Layout_m->getMenuParent($data['nama_menu']);
        $data['id_menu_'] = $this->Layout_m->checkMenu($data['nama_menu']);

        $data['setMeta'] = $this->Layout_m->setMeta($data['nama_menu']);
        $data['setHeader'] = $this->Layout_m->setHeader();
        $data['setMenu'] = $this->Layout_m->setMenu();
        $data['setFooter'] = $this->Layout_m->setFooter();
        $data['setJS'] = $this->Layout_m->setJS();

        $this->parser->parse('master/user_v', $data);
    }

    function do_Tabel_User() {

        $records["aaData"] = array();
        $aColumns = array('id_user', 'username', 'nama_lengkap', 'no_hp', 'nama_jabatan');
        //default
        $sort = "a.id_user";
        $dir = "desc";
        $criteria = "upper(username || nama_lengkap || no_hp || nama_jabatan)";

        $sSearch = ($this->input->post("sSearch") != "") ? strtoupper(quotes_to_entities($this->input->post("sSearch"))) : "";
        $iDisplayLength = ($this->input->post("iDisplayLength") != "") ? $this->input->post("iDisplayLength") : "";
        $iDisplayStart = ($this->input->post("iDisplayStart") != "") ? $this->input->post("iDisplayStart") : "";
        $sEcho = ($this->input->post("sEcho") != "") ? $this->input->post("sEcho") : "";

        // Shorting
        $iSortCol_0 = ($this->input->post("iSortCol_0") != "") ? $this->input->post("iSortCol_0") : "";
        $iSortingCols = ($this->input->post("iSortingCols") != "") ? $this->input->post("iSortingCols") : "";
        if ($iSortCol_0) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $sort = $aColumns[intval($this->input->post('iSortCol_' . $i))];
                $dir = ($this->input->post('sSortDir_' . $i) != "") ? $this->input->post('sSortDir_' . $i) : "";
            }
        }
        $iTotalRecords = $this->User_m->getCountUser($criteria, $sSearch);

        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;

        $records["sEcho"] = $sEcho;
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        $query = $this->User_m->getUser($criteria, $sSearch, $sort, $dir, $iDisplayStart, $iDisplayLength);

        if ($query->num_rows() > 0) {
            $no = $iDisplayStart;
            foreach ($query->result() as $Fields) {
                $no++;
                $status = ($Fields->status == 't') ? "Akfif" : "Tidak Aktif";

                $records["aaData"][] = array(
                    '<center>' . $no . '.</center>',
                    '<center>' . $Fields->username . '</center>',
                    $Fields->nama_lengkap,
                    '<center>' . $Fields->no_hp . '</center>',
                    '<center>' . $Fields->nama_jabatan . '</center>',
                    '<center>' . $status . '</center>',
                    '<center><a href="javascript:;" data-id="' . $Fields->id_user . '" data-name="' . $Fields->username . ' (' . $Fields->nama_lengkap . ')" class="btn btn-xs yellow btn-editable"><i class="fa fa-pencil"></i> Ubah</a> '
                    . '<a href="javascript:;" data-id="' . $Fields->id_user . '" data-name="' . $Fields->username . ' (' . $Fields->nama_lengkap . ')" class="btn btn-xs red btn-removable"><i class="fa fa-times"></i> Hapus</a></center>');
            }
        }
        echo json_encode($records);
    }

    function do_Simpan_User() {
        $return = array();
        $error = "";

        $mode_form = ($this->input->post("mode_form") != "") ? $this->input->post("mode_form") : "";
        $id_user = ($this->input->post("id_user") != "") ? $this->input->post("id_user") : "";
        $nama_lengkap = ($this->input->post("nama_lengkap") != "") ? $this->input->post("nama_lengkap") : "";
        $email = ($this->input->post("email") != "") ? $this->input->post("email") : "";
        $no_hp = ($this->input->post("no_hp") != "") ? $this->input->post("no_hp") : "";
        $status = ($this->input->post("status") != "") ? $this->input->post("status") : "";
        $passwd = ($this->input->post("passwd") != "") ? $this->input->post("passwd") : "";
        $id_jabatan = ($this->input->post("id_jabatan") != "") ? $this->input->post("id_jabatan") : "";
        $flag_password_user = ($this->input->post("flag_password_user") != "") ? $this->input->post("flag_password_user") : "";
        $fileFoto = '';

        $cekUrut = $this->User_m->cekUrut();
        $nextUrut = $cekUrut + 1;
        $username = $this->getUsername($nextUrut);

        if (strlen($no_hp) >= 8 || strlen($no_hp <= 14)) {
            $config['upload_path'] = './assets/upload';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $this->load->library('upload', $config);
            foreach ($_FILES as $key => $value) {
                if (!empty($value['name'])) {
                    if (!$this->upload->do_upload($key)) {
                        $error = $this->upload->display_errors();
                        $return["msgServer"] = $error;
                        $return["success"] = FALSE;
                    } else {
                        if ($key == "foto") {
                            $data_upload = $this->upload->data();
                            $fileFoto = $username . "_Foto_" . $data_upload['file_ext'];

                            rename($data_upload['full_path'], $data_upload['file_path'] . $fileFoto);
                            copy($data_upload['file_path'] . $fileFoto, $data_upload['file_path'] . "foto/" . $fileFoto);
                            unlink($data_upload['file_path'] . $fileFoto);
                        }
                    }
                }
            }

            if ($mode_form == "Tambah") {
                if ($this->User_m->Chek_Data("", $email) == 0) {
                    $this->User_m->insert($nama_lengkap, $email, $flag_password_user, $passwd, $username, $no_hp, $status, $id_jabatan, $fileFoto, $nextUrut);
                } else {
                    $error = "Maaf, Data Email Sudah ada. !!!";
                }
            } else if ($mode_form == "Ubah") {
                if ($this->User_m->Chek_Data($id_user) > 0) {
                    $this->User_m->update($id_user, $nama_lengkap, $email, $flag_password_user, $passwd, $username, $no_hp, $status, $id_jabatan, $fileFoto);
                } else {
                    $error = "Maaf, Data User Tidak ditemukan. !!!";
                }
            }
        } else {
            $error = "Maaf, No HP Lebih dari 8 dan kurang dari 14 Digit. !!!";
        }

        if ($this->db->trans_status() === FALSE) {
            $return["msgServer"] = "Simpan Data User Gagal. !!!";
            $return["success"] = FALSE;
        } else {
            if ($error != "") {
                $return["msgServer"] = $error;
                $return["success"] = FALSE;
            } else {
                $return["msgServer"] = "Simpan Data User Berhasil.";
                $return["success"] = TRUE;
            }
        }

        echo json_encode($return);
    }

    function do_Hapus_User() {
        $id_user = ($this->input->post("id_user") != "") ? $this->input->post("id_user") : "";
        $this->User_m->delete($id_user);
        if ($this->db->trans_status() === false) {
            $return["msgServer"] = "Maaf, Hapus Data User Gagal.";
            $return["success"] = false;
        } else {
            $return["msgServer"] = "Hapus Data User Berhasil.";
            $return["success"] = true;
        }

        echo json_encode($return);
    }

    function do_Ubah_User() {
        $return = array();
        $itemList = array();
        $id_user = ($this->input->post("id_user") != "") ? $this->input->post("id_user") : "";
        if ($this->User_m->Chek_Data($id_user) > 0) {
            $Fields = $this->User_m->List_Data($id_user);
            $item = array(
                "mode_form" => "Ubah",
                "id_user" => $Fields->id_user,
                "nama_lengkap" => $Fields->nama_lengkap,
                "email" => $Fields->email,
                "username" => $Fields->username,
                "no_hp" => $Fields->no_hp,
                "id_jabatan" => $Fields->id_jabatan,
                "status" => $Fields->status
            );
            $itemList[] = $item;
            $return["success"] = TRUE;
            $return["results"] = $item;
        } else {
            $return["success"] = FALSE;
            $return["msgServer"] = "Maaf, Data User Tidak Ditemukan.";
        }

        echo json_encode($return);
    }

    function getUsername($urut = "") {
        if ($urut > 0 && $urut < 10) {
            $username = date('Y') . "000" . $urut;
        } elseif ($urut >= 10 && $urut < 100) {
            $username = date('Y') . "00" . $urut;
        } elseif ($urut >= 100 && $urut < 1000) {
            $username = date('Y') . "0" . $urut;
        } else {
            $username = date('Y') . $urut;
        }
        return $username;
    }

}
