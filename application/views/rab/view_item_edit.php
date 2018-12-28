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
                            <h4>Edit Data</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" method="post" action="<?php echo base_url('item/do_edit');?>">
                                <label class="sr-only" for="inlineFormInputName2"></label>
                                <input hidden type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="di_edit" value="<?php echo $di_edit;?>" placeholder="akun">
                                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="input_akun" value="<?php echo $n_akun;?>" placeholder="Nama Item">
                                <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="input_satuan" value="<?php echo $satuan;?>" placeholder="Satuan">
                                </div>
                                <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="input_harga" value="<?php echo $estimasi_harga_item;?>" placeholder="Harga">
                                </div>
                                <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="input_toko" value="<?php echo $nama_toko;?>" placeholder="Nama Toko">
                                </div>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="input_type" value="<?php echo $type_toko;?>"  placeholder="Type Toko">
                                </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Edit</button>
                        </div>
                        </form>
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