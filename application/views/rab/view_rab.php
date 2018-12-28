<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create RAB</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">RAB</a></div>
                <div class="breadcrumb-item"><a href="#"><?php echo $no_surat;?></a></div>
                <div class="breadcrumb-item"><?php echo $keperluan;?></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">RAB </h2>
            <p class="section-lead">
                <b><?php echo $nama_ins;?></b> .Nomer Surat: <b><?php echo $no_surat;?></b> <?php echo $keperluan;?>
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menambahkan Rincian Item Kedalam RAB</h4>
                        </div>
                        <form method="post" action="<?php echo base_url('letter/do_save_rab');?>">
                            <div class="tambah_dataitem_rab card-body">
                                <div class="form-row" id="tambahkan_data_item">
                                    <input hidden type="text" class="form-control id_surat_rab" name="id_surat_rab[]" value="<?php echo $suntik;?>">
                                    <input hidden type="text" class="form-control id_surat_rab" name="id_surat_rab_1" value="<?php echo $suntik;?>">
                                    <div class="form-group col-md-4">
                                        <label for="input_item_rab">Nama Item</label>
                                        <select id="input_item_rab" name="input_item_rab[]" class="ini_item form-control">
                                            <option>Pilih Item</option>
                                            <?php foreach ($item->result() as $row):?>
                                                <option value="<?php echo $row->id_item_rab;?>"><?php echo $row->nama_item;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <input hidden type="text" class="form-control real_name" name="real_name[]" id="real_name">
                                    <input hidden type="text" class="form-control real_satuan" name="real_satuan[]" id="real_satuan">
                                    <div class="form-group col-md-2">
                                        <label for="input_qty">Qty</label>
                                        <input type="text" class="form-control qty_ini input_qty" name="input_qty[]" onkeyup="hitung2();" id="input_qty">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="input_harga_item">Harga/Item</label>
                                        <!--<input type="text" class="form-control" name="input_harga_item[]" id="input_harga_item">-->
                                        <select class="form-control input_harga_item harga_ini ini_harga" name="masukan_harga[]" id="input_harga_item">
                                            <option value="0">...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="input_sub_total">Sub Total</label>
                                        <input type="text" class="form-control d2 ini_subtotal" name="input_sub_total[]" id="input_sub_total">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="add_item">+ Item</label>
                                        <input type="button" class="form-control btn btn-info" value="+" name="add_item[]" id="add_item">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="form-control btn btn-primary" value="Submit" name="add_item[]" id="btn_submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- General JS Scripts -->
        <script src="<?php echo base_url('assets');?>/dist/modules/jquery.min.js"></script>
        <script src="<?php echo base_url('assets');?>/dist/modules/popper.js"></script>
        <script src="<?php echo base_url('assets');?>/dist/modules/tooltip.js"></script>
        <script src="<?php echo base_url('assets');?>/dist/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets');?>/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?php echo base_url('assets');?>/dist/modules/moment.min.js"></script>
        <script src="<?php echo base_url('assets');?>/dist/js/stisla.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
               var i = 1;
               $('#add_item').click(function () {
                  i++;
                  $('.tambah_dataitem_rab').append('<div class="form-row" id="tambahkan_data_item'+i+'">\n' +
                      '\n' +
                      '                                <div class="form-group col-md-4">\n' +
                      '                                <input hidden type="text" class="form-control id_surat_rab" name="id_surat_rab[]" value="<?php echo $suntik;?>">\n' +
                      '                                    <label for="input_item_rab">Nama Item</label>\n' +
                      '                                    <select id="input_item_rab'+i+'" name="input_item_rab[]" class="ini_item form-control">\n' +
                      '                                        <option>Pilih Item</option>\n' +
                      '                                        <?php foreach ($item->result() as $row):?>\n' +
                      '                                            <option value="<?php echo $row->id_item_rab;?>"><?php echo $row->nama_item;?></option>\n' +
                      '                                        <?php endforeach;?>\n' +
                      '                                    </select>\n' +
                      '                                </div>\n' +
                      '                                <input hidden type="text" class="form-control real_name" name="real_name[]" id="real_name'+i+'">\n' +
                      '                                <input hidden type="text" class="form-control real_satuan" name="real_satuan[]" id="real_satuan'+i+'">\n' +
                      '                                <div class="form-group col-md-2">\n' +
                      '                                    <label for="input_qty">Qty</label>\n' +
                      '                                    <input type="text" class="form-control ini_qty'+i+' qty_ini'+i+' input_qty" name="input_qty[]" id="input_qty">\n' +
                      '                                </div>\n' +
                      '                                <div class="form-group col-md-2">\n' +
                      '                                    <label for="input_harga_item">Harga/Item</label>\n' +
                      '                                    <select class="form-control input_harga_item harga_ini'+i+' ini_harga" name="masukan_harga[]" id="input_harga_item'+i+'">\n' +
                      '                                    <option value="0">...</option>\n' +
                      '                                    </select>\n' +
                      '                                </div>\n' +
                      '                                <div class="form-group col-md-3">\n' +
                      '                                    <label for="input_sub_total">Sub Total</label>\n' +
                      '                                    <input type="text" class="form-control d2'+i+' ini_subtotal" name="input_sub_total[]" id="input_sub_total">\n' +
                      '                                </div>\n' +
                      '                                <div class="form-group col-md-1">\n' +
                      '                                    <label for="add_item">X Item</label>\n' +
                      '                                    <input type="button" class="form-control btn btn-danger btn_dihapus" value="X" name="add_item'+i+'" id="'+i+'">\n' +
                      '                                </div>\n' +
                      '                            </div>'
                  );
                   // cari harga per item
                   $('#input_item_rab'+i+'').change(function(){
                       var ide=$(this).val();
                       $.ajax({
                           url : "<?php echo base_url();?>letter/get_harga",
                           method : "POST",
                           data : {ide: ide},
                           async : false,
                           dataType : 'json',
                           success: function(data){
                               var html = '';
                               var id_data = '';
                               var id_satuan = '';
                               var a;
                               for(a=0; a<data.length; a++){
                                   html += '<option>'+data[a].harga_item+'</option>';
                                   id_data += data[a].data_item;
                                   id_satuan += data[a].data_satuan;
                               }
                               $('#input_harga_item'+i+'').html(html);
                               $('#real_name'+i+'').val(id_data);
                               $('#real_satuan'+i+'').val(id_satuan);
                           }
                       });
                   });
                   $('.ini_qty'+i+'').change(function () {
                       var a = $('.harga_ini'+i+'').val(); //harga
                       var b = $('.qty_ini'+i+'').val(); //qty
                       d = a * b; //a kali b
                       $('.d2'+i+'').val(d);
                   });
               });
               // function js hapus tambah data
               $(document).on('click', '.btn_dihapus', function () {
                  var button_id = $(this).attr("id");
                  $('#tambahkan_data_item'+button_id+'').remove();
               });
               $(document).ready(function () {
                   $('#input_item_rab').change(function(){
                       var ide=$(this).val();
                       $.ajax({
                           url : "<?php echo base_url();?>letter/get_harga",
                           method : "POST",
                           data : {ide: ide},
                           async : false,
                           dataType : 'json',
                           success: function(data){
                               var html = '';
                               var id_data = '';
                               var id_satuan = '';
                               var a;
                               for(a=0; a<data.length; a++){
                                   html += '<option>'+data[a].harga_item+'</option>';
                                   id_data += data[a].data_item;
                                   id_satuan += data[a].data_satuan;
                               }
                               $('#input_harga_item').html(html);
                               $('#real_name').val(id_data);
                               $('#real_satuan').val(id_satuan);
                           }
                       });
                   });
               });
            });
            function hitung2() {
                var a = $(".harga_ini").val(); //harga
                var b = $(".qty_ini").val(); //qty
                d = a * b; //a kali b
                $(".d2").val(d);
            }
            /*$(document).ready(function () {
                $('#btn_submit').click(function () {
                    var id_surat_rab = $('.id_surat_rab').val();
                    var ini_item = $('.ini_item').val();
                    var input_qty = $('.input_qty').val();
                    var ini_harga = $('.ini_harga').val();
                    var ini_subtotal = $('.ini_subtotal').val();
                    $.ajax({
                        type    : 'POST',
                        data    : {id_surat_rab: id_surat_rab, ini_item: ini_item, input_qty: input_qty, ini_harga: ini_harga, ini_subtotal: ini_subtotal},
                        url     : '< ?php echo base_url('letter/do_save_rab');?>',

                        beforeSend: function () {
                            $('#order_results').html('<div class="alert alert-info fade in">Submitting order...</div>');
                        },
                        success : function (result) {
                            $('#order_results').html(result);

                        }
                    })
                })
            })*/

        </script>
    </section>
</div>