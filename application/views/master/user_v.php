<!DOCTYPE html>
<html lang="en">
    {setMeta}
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        {setHeader}
        <div class="clearfix"> </div>
        <div class="page-container">
            {setMenu}
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?= site_url() ?>welcome">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Master User</span>
                            </li>
                        </ul>
                    </div>
                    <h3 class="page-title"></h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>Tabel Data User
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="tabelku">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%; text-align: center; vertical-align: middle"> No </th>
                                                    <th style="width: 15%; text-align: center; vertical-align: middle"> Username </th>
                                                    <th style="text-align: center; vertical-align: middle"> Nama User </th>
                                                    <th style="width: 15%; text-align: center; vertical-align: middle"> No HP </th>
                                                    <th style="width: 18%; text-align: center; vertical-align: middle"> Nama Jabatan </th>
                                                    <th style="width: 10%; text-align: center; vertical-align: middle"> Status </th>
                                                    <th style="width: 15%; text-align: center; vertical-align: middle">
                                                        <button id="tambah" data-target="#tambah_user" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="tambah_user" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog modal-detail">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="widget-box widget-color-blue2">
                                                        <div class="widget-header">
                                                            <h4 class="widget-title lighter smaller">Tambah User</h4>
                                                        </div>
                                                        <hr>
                                                        <div class="widget-body">
                                                            <form class="form-horizontal" action="#" id="formku" name="formku" style="margin-top: 15px">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Username</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="hidden" id="mode_form" name="mode_form" value="Tambah"/>
                                                                                    <input type="hidden" id="id_user" name="id_user"/>
                                                                                    <input type="text" id="username" readonly name="username" class="form-control" placeholder="Masukkan Username" autocomplete="off" autofocus/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Nama Lengkap</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" autocomplete="off" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">E-Mail</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan E-Mail" autocomplete="off" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">No HP</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="number" id="no_hp" name="no_hp" class="form-control" placeholder="Masukkan No HP" autocomplete="off" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Jabatan</label>
                                                                                <div class="col-md-8">
                                                                                    <?= $this->Jabatan_m->getDataComboBox('id_jabatan') ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Foto</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="file" id="foto" name="foto" class="form-control" placeholder="Masukkan Foto" autocomplete="off" />
                                                                                    <span>Extention .jpg|.jpeg|.png</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Password
                                                                                    <label><input type="checkbox" id="flag_password_user" class="flag" name="flag_password_user" value="false"></label>
                                                                                </label>
                                                                                <div class="col-md-8">
                                                                                    <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Masukkan password" readonly="true" autocomplete="off" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Status</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="checkbox" checked id="status" name="status" class="make-switch" data-on-text="Aktif" data-off-text="Tidak" data-size="small">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-actions fluid">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-offset-3 col-md-12">
                                                                                <button type="submit" class="btn btn-sm btn-primary" id="simpan"><i class="fa fa-save"></i> Simpan</button>
                                                                                <button type="button" class="btn btn-sm btn-danger" id="clear"><i class="fa fa-refresh"></i> Batal</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {setFooter}
        {setJS}
        <script>
            jQuery(document).ready(function () {
                App.init();
                $('#{parent_id_menu}').addClass('active');
                $('#{id_menu_}').addClass('active');

                $('#flag_password_user').click(function () {
                    if (!$(this).is(':checked')) {
                        $('#passwd').attr('readonly', true);
                        $('#passwd').val('');
                        $('#flag_password_user').val('false');
                    } else {
                        $('#passwd').attr('readonly', false);
                        $('#passwd').val('');
                        $('#flag_password_user').val('true');
                    }
                });

                var InitController = function () {
                    var handleValidation = function () {
                        $('#formku').validate({
                            errorElement: 'span', //default input error message container
                            errorClass: 'help-block', // default input error message class
                            focusInvalid: true, // do not focus the last invalid input
                            ignore: "",
                            rules: {
                                nama_lengkap: {
                                    required: true
                                },
                                email: {
                                    required: true
                                },
                                no_hp: {
                                    required: true
                                },
                                id_jabatan: {
                                    required: true
                                }
                            },
                            invalidHandler: function (event, validator) { //display error alert on form submit              
                                toastr.error("Maaf, Inputkan data dengan lengkap");
                            },
                            errorPlacement: function (error, element) { // render error placement for each input type
                                var icon = $(element).parent('.input-icon').children('i');
                                icon.removeClass('fa-check').addClass("fa-warning");
                                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                            },
                            highlight: function (element) { // hightlight error inputs
                                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group   
                            },
                            unhighlight: function (element) { // revert the change done by hightlight
                            },
                            success: function (label, element) {
                                var icon = $(element).parent('.input-icon').children('i');
                                $(element).closest('.form-group').removeClass('has-error');
                                icon.removeClass("fa-warning");
                            },
                            submitHandler: function (form) {
                                $.blockUI();
                                $.ajax({
                                    url: '<?= site_url() ?>master/do_Simpan_User',
                                    type: 'POST',
                                    data: new FormData($('#formku')[0]),
                                    async: false,
                                    success: function (data) {
                                        var data = jQuery.parseJSON(data);
                                        if (data.success === true) {
                                            $.unblockUI();
                                            handleClearForm();
                                            $('#tambah_user').modal('hide');
                                            toastr.success(data.msgServer);
                                            $('#tabelku').dataTable().fnClearTable();
                                        } else {
                                            $.unblockUI();
                                            toastr.warning(data.msgServer);
                                        }
                                    },
                                    contentType: false,
                                    processData: false
                                });
                            }
                        });
                    };
                    var handleTable = function () {
                        if (!jQuery().dataTable) {
                            return;
                        }
                        // begin first table
                        $('#tabelku').dataTable({
                            "sDom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", //default layout without horizontal scroll(remove this setting to enable horizontal scroll for the table)
                            "aLengthMenu": [
                                [10, 20, 30, 40, -1],
                                [10, 20, 30, 40, "All"] // change per page values here
                            ],
                            "bProcessing": true,
                            "bServerSide": true,
                            "sServerMethod": "POST",
                            "bRetrieve": true,
                            "sAjaxSource": "<?= site_url() ?>master/do_Tabel_User",
                            // set the initial value
                            "iDisplayLength": 10,
                            "sPaginationType": "bootstrap_full_number",
                            "oLanguage": {
                                "sProcessing": '<i class="fa fa-coffee"></i>&nbsp;Please wait...',
                                "sLengthMenu": "_MENU_ records",
                                "oPaginate": {
                                    "sPrevious": "Prev",
                                    "sNext": "Next"
                                }
                            },
                            "aoColumnDefs": [{
                                    'bSortable': false,
                                    'aTargets': [0, 6]
                                }
                            ]
                        });
                        jQuery('#tabelku_wrapper .dataTables_filter input').addClass("form-control input-medium"); // modify table search input
                        jQuery('#tabelku_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown

                        // handle record edit/remove
                        $('body').on('click', '#tabelku_wrapper .btn-editable', function () {
                            $.blockUI();
                            $.ajax({
                                method: 'POST',
                                dataType: 'json',
                                url: '<?= site_url() ?>master/do_Ubah_User',
                                data: {'id_user': $(this).attr("data-id")},
                                success: function (data) {
                                    if (data.success === true) {
                                        $.unblockUI();
                                        $('#mode_form').val(data.results.mode_form);
                                        $('#id_user').val(data.results.id_user);
                                        $('#nama_lengkap').val(data.results.nama_lengkap);
                                        $('#email').val(data.results.email);
                                        $('#username').val(data.results.username);
                                        $('#no_hp').val(data.results.no_hp);
                                        $('#id_jabatan').select2('val', data.results.id_jabatan);
                                        (data.results.status === "t") ? $('#status').bootstrapSwitch('state', true) : $('#status').bootstrapSwitch('state', false);
                                        $('#tambah_user').modal('show');
                                    } else {
                                        $.unblockUI();
                                        toastr.warning(data.msgServer);
                                    }
                                },
                                fail: function (e) {
                                    $.unblockUI();
                                    toastr.error(e);
                                }
                            });
                        });

                        $('body').on('click', '#tabelku_wrapper .btn-removable', function () {
                            var id = $(this).attr("data-id");
                            var name = $(this).attr("data-name");
                            bootbox.dialog({
                                message: "Apakah anda yakin menghapus </br>Username dan Nama User : <b>" + name + "</b> ?",
                                title: "Konfirmasi Hapus",
                                buttons: {
                                    success: {
                                        label: "Ya",
                                        className: "green",
                                        callback: function () {
                                            $.blockUI();
                                            $.ajax({
                                                method: 'POST',
                                                dataType: 'json',
                                                url: '<?= site_url() ?>master/do_Hapus_User',
                                                data: {'id_user': id},
                                                success: function (data) {
                                                    if (data.success === true) {
                                                        $.unblockUI();
                                                        toastr.success(data.msgServer);
                                                        $('#tabelku').dataTable().fnClearTable();
                                                    } else {
                                                        $.unblockUI();
                                                        toastr.warning(data.msgServer);
                                                    }
                                                },
                                                fail: function (e) {
                                                    $.unblockUI();
                                                    toastr.error(e);
                                                }
                                            });
                                        }
                                    },
                                    danger: {
                                        label: "Tidak",
                                        className: "red"
                                    }
                                }
                            });
                        });
                    };
                    return {
                        //main function to initiate the module
                        init: function () {
                            handleValidation();
                            handleTable();
                        }
                    };
                }();

                InitController.init();
            });

            $('#clear').on('click', function () {
                handleClearForm();
                $('#tambah_user').modal('hide');
            });

            $('#tambah').on('click', function () {
                handleClearForm();
            });

            function handleClearForm() {
                $('#formku').each(function () {
                    this.reset();
                });
                $('#mode_form').val('Tambah');
                $('#id_jabatan').select2('val', '');
                document.getElementById("passwd").readOnly = true;
                document.querySelectorAll(".flag").checked = false;
            }
        </script>
    </body>

</html>
