<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rincian RAB</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Rincian RAB</a></div>
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">RAB</h2>
            <p class="section-lead">
                Item List RAB.
            </p>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">

                            <div>
                                <button class="btn btn-info"><a href="<?php echo base_url('to_excel/do_export/').$ini_suntik;?>"><h4 style="color: white">export</h4></a></button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="section-title mt-0"><h4><?php echo $nama_insta;?></h4> No: <?php echo $nomor_surat;?>,<i> Kegiatan <?php echo $nomor_surat;?></i></div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Akun</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Satuan</th>
                                        <th align=right scope="col">Harga Satuan</th>
                                        <th align=right scope="col">Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($list_rab->result() as $u){
                                    ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $u->nama_item;?></td>
                                        <td><?php echo $u->qty_item;?></td>
                                        <td><?php echo $u->satuan;?></td>
                                        <td align=right><?php echo "Rp " .number_format($u->harga_item,0,',','.');?></td>
                                        <td align=right><?php echo "Rp " .number_format($u->sub_totalitem,0,',','.');?></td>
                                    </tr>
                                    </tbody>
                                    <?php };?>
                                    <tr>
                                        <td><b>Total</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td align=right><?php echo "Rp " .number_format($total_estimasi,0,',','.');?></td>
                                    </tr>
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