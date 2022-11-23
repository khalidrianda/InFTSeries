<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
</head>
<div class="content-wrapper">
  <section class="content-header">
              <h1>
                <?php echo $title; ?>
                <small>Control panel</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url('projek'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="active"><?php echo $title; ?></li>
              </ol>
              <br>
                <button style="margin-left: 5px" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data</button>
              <br><br>
  </section>

  <div class="modal fade" id="addSurvey" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      
      <div class="modal-dialog">
        <div class="modal-content">
          
        </div>
        <button type="button" onclick="window.location='<?php echo site_url("fungsi/export/".$id."/".$title);?>'" class="btn btn-primary" style="float:right;">
         Export (.xls)</button>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>  

	<section class="content">
            
          <div class="panel panel-info">
            <div class="panel-heading">
              <ul class="nav nav-pills">

                <li class="active"><a href="#hasil" data-toggle="tab">Data</a></li>
                <li><a href="#grafi" data-toggle="tab">Grafik</a></li>
              </ul>
            </div>


            <div class="panel-body">
              <div class="col-lg-12">
                <div class="panel-body">
                  <div class="tab-content" style='margin-top:-20px'>
                    <div class="tab-pane fade in active" id="hasil">
                      <div class="dataTable_wrapper">
                    		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                    			       <tr>
                                    <th width="5px"><center>No</center></th>
                                    <th width="80px"><center>Tanggal</center></th>
                                    <th width="70px"><center>Jumlah</center></th>
                                    <th width="30px"><center>Hapus</center></th>
                                    <th width="30px"><center>Edit</center></th>

                                </tr>
                                </thead>
                                <tbody>
                                 <?php 
                                    $no =1; 
                                    foreach($detail as $dtl) : ?>
                                      <?php $jumla[] = $dtl->jumlah;
                                            if($dtl->bulan==1){
                                              $bulan = "Januari";
                                            }else if($dtl->bulan==2){
                                              $bulan ="Februari";
                                            }else if($dtl->bulan==3){
                                              $bulan ="Maret";
                                            }else if($dtl->bulan==4){
                                              $bulan ="April";
                                            }else if($dtl->bulan==5){
                                              $bulan ="Mei";
                                            }else if($dtl->bulan==6){
                                              $bulan ="Juni";
                                            }else if($dtl->bulan==7){
                                              $bulan ="Juli";
                                            }else if($dtl->bulan==8){
                                              $bulan ="Agustus";
                                            }else if($dtl->bulan==9){
                                              $bulan ="September";
                                            }else if($dtl->bulan==10){
                                              $bulan ="Oktober";
                                            }else if($dtl->bulan==11){
                                              $bulan ="November";
                                            }else{
                                              $bulan ="Desember";
                                            }
                                            $tog = ($dtl->tanggal." ".$bulan." ".$dtl->tahun);
                                            $tampung[] = $tog;
                                          ?>
                                <tr>
                                    <td><center><?php echo $no++ ?></center></td>
                                    <td><center><?php echo $dtl->tanggal."/".$dtl->bulan."/".$dtl->tahun ?></center></td>
                                    <td><center><?php echo $dtl->jumlah ?></center></td>
                                    <td onclick="javascript: return confirm('Hapus projek ini?')"><center><?php echo anchor('data/hapus/'.$dtl->id.'/'.$title,  '<div class="btn btn-danger btn-sm"><i class="fa fa-trash" ></i></div>'); ?></center></td>
                                     <td><center>
                                      <button type="button" class="btn waves-effect waves-light btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalEditB" 
                                      data-id="<?php echo $dtl->id; ?>" data-id_projek="<?php echo $dtl->id_projek; ?>" data-tanggal="<?php echo $dtl->tanggal; ?>" data-bulan="<?php echo $dtl->bulan; ?>" data-tahun="<?php echo $dtl->tahun; ?>" data-jumlah="<?php echo $dtl->jumlah; ?>">
                                      <i class="fa fa-edit" ></i></button>
                                    </center></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                  		</table>
                    </div>
                  </div>

                  <div class="tab-pane fade in" id="grafi">
                      <br>
                        <canvas id="lineChart"></canvas>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
	</section>

<!-- Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Projek</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'data/tambah_aksi'; ?>">
            <div class="form-group">
                <label>Tanggal</label>
                 <input type="hidden" name="title" id="title" class="form-control" value="<?php echo $title; ?>">
                 <input type="hidden" name="data_aktual" id="data_aktual" class="form-control" value="1">    
                <input type="text" name="tanggal" class="form-control">    
            </div>
            <div class="form-group">
                <label>Bulan</label>
                <input type="text" name="bulan" class="form-control">    
            </div>
             <div class="form-group">
                <label>Tahun</label>
                <input type="text" name="tahun" class="form-control">    
            </div>
             <div class="form-group">
                <label>Jumlah</label>
                <input type="text" name="jumlah" class="form-control">    
            </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Import Data-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Import File</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('assets/uploadc.php'); ?>" id="import_form" enctype="multipart/form-data">
             <div class="form-group">
                <label>Select excel file</label>
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id; ?>">
                <input type="hidden" name="title" id="title" class="form-control" value="<?php echo $title; ?>">
                <input type="file" name="file" id="file" required accept=".xls, xlsx" class="form-control">    
            </div>
            <button type="submit" name="import" value="Import" class="btn btn-info">Import</button>
           </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal FTS-->
<div class="modal fade" id="exampleModalFTS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Proses Fuzzifikasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('fungsi/index'); ?>" id="fuzzy_form" enctype="multipart/form-data">
            <div class="form-group">
                <label>T alpha</label>
                <input type="hidden" name="id" id="id"class="form-control" value="<?php echo $id; ?>">
                <input type="hidden" name="ket" id="ket" class="form-control" value="<?php echo $keterangan['ket']; ?>">
                <select class="form-control" name="talpa" id="talpa">
                  <option value="satu">0.1</option>
                  <option value="dua">0.05</option>
                  <option value="tiga">0.025</option>
                  <option value="empat">0.01</option>
                  <option value="lima">0.005</option>
                  <option value="enam">0.0025</option>
                  <option value="tujuh">0.001</option>
                </select>    
            </div>
            <div class="form-group">
                <label>Jumlah nilai linguistik</label>
                <input type="text" name="kolominterval" id="kolominterval" class="form-control">    
            </div>
            <div class="form-group">
                <label>Jumlah data prediksi</label>
                <input type="text" name="prediksi" id="prediksi" class="form-control">    
            </div>
            <button type="submit" name="fuzifikasi" value="fuzifikasi" class="btn btn-info">Proses Perhitungan</button>
           </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal" id="exampleModalEditB" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?php echo base_url('data/update'); ?>">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="hidden" name="title" id="title" class="form-control" value="<?php echo $title; ?>">    
                                            <input type="hidden" class="form-control" id="id"  name="id">
                                            <input type="hidden" class="form-control" id="id_projek"  name="id_projek">
                                            <label class="bmd-label-floating">Tanggal</label>
                                            <input type="text" class="form-control" id="tanggal"  name="tanggal">
                                            <label class="bmd-label-floating">Bulan</label>
                                            <input type="text" class="form-control" id="bulan"  name="bulan">
                                            <label class="bmd-label-floating">Tahun</label>
                                            <input type="text" class="form-control" id="tahun"  name="tahun">
                                            <label class="bmd-label-floating">Jumlah</label>
                                            <input type="text" class="form-control" id="jumlah"  name="jumlah">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"
                                        style="margin-right: 10px">Batal
                                </button>
                                <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

</div>


<script>

    $(document).ready(function(){
        $("#exampleModalEditB").on("show.bs.modal", function(event) {

            var button = $(event.relatedTarget);

            var id = button.data('id')
            var id_projek = button.data('id_projek')
            var tanggal = button.data('tanggal')
            var bulan = button.data('bulan')
            var tahun = button.data('tahun')
            var jumlah = button.data('jumlah')

            
            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #id_projek').val(id_projek)
            modal.find('.modal-body #tanggal').val(tanggal)
            modal.find('.modal-body #bulan').val(bulan)
            modal.find('.modal-body #tahun').val(tahun)
            modal.find('.modal-body #jumlah').val(jumlah)

        });
    });
</script>

<script>
    //line
  var juml = new Array();
  <?php foreach($jumla as $key => $val1){ ?>
      juml.push('<?php echo $val1; ?>');
  <?php } ?>

  var tamp = new Array();
  <?php foreach($tampung as $key => $val1){ ?>
      tamp.push('<?php echo $val1; ?>');
  <?php } ?>
  var $titlee = <?php echo(json_encode($title)); ?>;

  var ctxL = document.getElementById("lineChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
  labels: tamp,
  datasets: [{
  label: $titlee,
  data: juml,
  backgroundColor: [
  'rgba(105, 0, 132, .2)',
  ],
  borderColor: [
  'rgba(200, 99, 132, .7)',
  ],
  borderWidth: 2
  }]
  },
  options: {
  responsive: true
  }
  });

    </script>

  <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>