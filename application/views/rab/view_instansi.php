<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Instansi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">List Data Instansi</a></div>
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Instansi</h2>
            <p class="section-lead">
                Tambah/Hapus/Edit Data Instansi.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Data Instansi</h4>
                        </div>
                        <form action="<?php echo base_url('instansi/tambah_ins');?>" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Nama Instansi</label>
                                        <input type="text" class="form-control" name="instansi">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Instansi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Instansi</th>
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
            "url": '<?php echo site_url('instansi/list_instansi'); ?>',
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columns": [
            {"data": "id_instansi"},
            {"data": "nama_instansi"},
            {"data": "view","bSortable": false,"searchable": false},
        ],
    });
</script>

