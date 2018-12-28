<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Akun/Item</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Form Tambah Akun</a></div>
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <p class="section-lead">
                Menambahkan Akun/Item Untuk Permintaan RAB.
            </p>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menambahkan Data</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" method="post" action="<?php echo base_url('item/save');?>">
                                <label class="sr-only" for="inlineFormInputName2"></label>
                                <input type="text" class="form-control mb-2 mr-sm-2" name="input_akun" placeholder="Nama Item">

                                <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control" name="input_satuan" placeholder="Satuan">
                                </div>
                                <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control" name="input_harga" placeholder="Harga">
                                </div>
                                <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control" name="input_toko" placeholder="Nama Toko">
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <select name="input_type" class="form-control" >
                                        <option>Offline</option>
                                        <option>Online</option>
                                    </select>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Item</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                    <tr>
                                        <th>Akun/Item</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Nama Toko</th>
                                        <th>Jenis</th>
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
            "url": '<?php echo site_url('item/list_item'); ?>',
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columns": [
            {"data": "n_i"},
            {"data": "satu"},
            {"data": "e_h_i"},
            {"data": "n_toko"},
            {"data": "t_toko"},
            {"data": "get_view","bSortable": false,"searchable": false},
            {"data": "view","bSortable": false,"searchable": false}
        ],
    });
</script>