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
                                <span>Master Pekerjaan</span>
                            </li>
                        </ul>
                    </div>
                    <h3 class="page-title"></h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-table"></i>Tabel Data Pekerjaan
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
                                                    <th style="text-align: center; vertical-align: middle"> Nama Pekerjaan </th>
                                                    <th style="width: 20%; text-align: center; vertical-align: middle">
                                                        <button id="tambah" data-target="#tambah_pekerjaan" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="tambah_pekerjaan" class="modal fade" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-detail">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="widget-box widget-color-blue2">
                                                        <div class="widget-header">
                                                            <h4 class="widget-title lighter smaller">Tambah Pekerjaan</h4>
                                                        </div>
                                                        <hr>
                                                        <div class="widget-body">
                                                            <form class="form-horizontal" action="#" id="formku" name="formku" style="margin-top: 15px">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Nama Pekerjaan</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="hidden" id="mode_form" name="mode_form" value="Tambah"/>
                                                                                    <input type="hidden" id="id_pekerjaan" name="id_pekerjaan"/>
                                                                                    <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-control" placeholder="Masukkan Nama Pekerjaan" autocomplete="off" autofocus/>
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

                var InitController = function () {
                    var handleValidation = function () {
                        $('#formku').validate({
                            errorElement: 'span', //default input error message container
                            errorClass: 'help-block', // default input error message class
                            focusInvalid: true, // do not focus the last invalid input
                            ignore: "",
                            rules: {
                                nama_pekerjaan: {
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
                                $('#tambah_pekerjaan').modal('hide');
                                $.ajax({
                                    method: 'POST',
                                    dataType: 'json',
                                    url: '<?= site_url() ?>master/do_Simpan_Pekerjaan',
                                    data: $('#formku').serializeArray(),
                                    success: function (data) {
                                        if (data.success === true) {
                                            $.unblockUI();
                                            handleClearForm();
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
                            "sAjaxSource": "<?= site_url() ?>master/do_Tabel_Pekerjaan",
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
                                    'aTargets': [0, 2]
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
                                url: '<?= site_url() ?>master/do_Ubah_Pekerjaan',
                                data: {'id_pekerjaan': $(this).attr("data-id")},
                                success: function (data) {
                                    if (data.success === true) {
                                        $.unblockUI();
                                        $('#mode_form').val(data.results.mode_form);
                                        $('#id_pekerjaan').val(data.results.id_pekerjaan);
                                        $('#nama_pekerjaan').val(data.results.nama_pekerjaan);
                                        $('#tambah_pekerjaan').modal('show');
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
                                message: "Apakah anda yakin menghapus </br>Pekerjaan : <b>" + name + "</b> ?",
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
                                                url: '<?= site_url() ?>master/do_Hapus_Pekerjaan',
                                                data: {'id_pekerjaan': id},
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
                $('#tambah_pekerjaan').modal('hide');
            });

            $('#tambah').on('click', function () {
                handleClearForm();
            });

            function handleClearForm() {
                $('#formku').each(function () {
                    this.reset();
                });
                $('#mode_form').val('Tambah');
            }
        </script>
    </body>

</html>
