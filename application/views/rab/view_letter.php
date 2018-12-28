        <!-- Main Content -->

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1><?php echo $title;?></h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#"><?php echo $title;?></a></div>
                        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    </div>
                </div>

                <div class="section-body">
                    <h2 class="section-title"><?php echo $title;?></h2>
                    <p class="section-lead">
                        Input data surat sebagai acuan permintaan di RAB
                    </p>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                    <div class="card-header">
                                        <h4><?php echo $title;?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Instansi</label>
                                            <select class="form-control" name="insta" id="insta">
                                                <option>Biro/Fakultas</option>
                                                <?php foreach ($data_ins->result() as $row):?>
                                                    <option value="<?php echo $row->id_instansi;?>"><?php echo $row->nama_instansi;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Surat</label>
                                            <input type="text" name="nom_s" id="nom_s" class="form-control" placeholder="Nomor Surat" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Terima</label>
                                            <input type="text" class="form-control pull-right" id="datepicker" name="tgl_trm" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keperluan</label>
                                            <input type="text" name="keperluan" id="keperluan" class="form-control" placeholder="Keperluan/Tujuan">
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button id="inputsurat" class="btn btn-primary">Submit</button>
                                    </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <form>
                                    <div class="card-header">
                                        <h4>Susun RAB Baru</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="card-body text-center">
                                            <div class="mb-2">Susun RAB Berdasarkan Nomer Permintaan Surat Yang Sudah Di Input</div>
                                            <div id="surat_results">
                                            </div>
                                        </div>
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
        <!-- bootstrap datepicker -->
        <script src="<?php echo base_url('assets');?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url('assets');?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <script type="text/javascript">
            jQuery('#datepicker').datepicker({
                    format: 'dd/mm/yyyy'
                });
            $(document).ready(function () {
                $('#inputsurat').click(function () {
                    var insta = $('#insta').val();
                    var nom_s = $('#nom_s').val();
                    var datepicker = $('#datepicker').val();
                    var keperluan = $('#keperluan').val();
                    $.ajax({
                        type    : 'POST',
                        data    : {insta: insta, nom_s: nom_s, datepicker: datepicker, keperluan: keperluan},
                        url     : '<?php echo base_url('letter/do_record_letter');?>',
                        beforeSend: function () {
                            $('#surat_results').html('<div class="alert alert-info fade in">Submitting order...</div>');
                        },
                        success : function (result) {
                            $('#surat_results').html(result);
                            //window.location.href = 'https://facebook.com';
                        },
                    })
                })
            })
        </script>
