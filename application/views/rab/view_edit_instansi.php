
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Instansi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Edit Data Instansi</a></div>
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Data Instansi</h2>
            <p class="section-lead">
                Edit Data Instansi.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit</h4>
                        </div>
                        <form action="<?php echo base_url('instansi/save_edit');?>" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nama Instansi Lama</label>
                                        <input disabled type="text" class="form-control" value="<?php echo $nama_lama;?>">
                                        <input hidden type="text" class="form-control" name="suntik" value="<?php echo $suntik;?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Nama Instansi Baru</label>
                                        <input type="text" class="form-control" name="instansi" placeholder="Nama Baru Instansi">
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


