<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Surat Masuk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">List Surat RAB</a></div>
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Surat Acuan RAB</h2>
            <p class="section-lead">
                List RAB Berdasarkan Surat Perintah/Disposisi.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Advanced Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                    <tr>
                                        <th>Fakultas/Biro</th>
                                        <th>Nomor Surat</th>
                                        <th>Keperluan</th>
                                        <th>Tanggal Surat Masuk</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- General JS Scripts -->
<script src="<?php echo base_url('assets');?>/dist/modules/jquery.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/popper.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/tooltip.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/moment.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/js/stisla.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url('assets');?>/dist/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script>
    $("#table-2").dataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": '<?php echo site_url('letter/list_rab'); ?>',
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columns": [
            {"data": "nam_ins"},
            {"data": "nom_sr"},
            {"data": "kprl"},
            {"data": "tgl_terima"},
            {"data": "get_view","bSortable": false,"searchable": false},
            {"data": "view","bSortable": false,"searchable": false}
        ],
    });
</script>

