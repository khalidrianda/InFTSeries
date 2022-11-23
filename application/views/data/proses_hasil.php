<div class="content-wrapper">
     <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('projek'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title; ?></li>
      </ol>
    </section>

    <section class="content">
       <div class="modal fade" id="addSurvey" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
      </div>
       <div class="panel-body">
        <br>
        <div class="col-lg-12">
            <div class="tab-pane fade in active">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example5">
                        <thead>
                        <tr>
                            <th width="10"><center>No</center></th>
                            <th width="300px"><center>Nama Projek</center></th>
                            <th width="70"><center>Tipe Peramalan</center></th>
                            <th width="70"><center>Tipe Data</center></th>
                            <th width="90"><center>Proses Peramalan</center></th>
                            <th width="120"><center>Lihat Proses Peramalan</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $no =1;
                            foreach($projek as $pjk) : ?>
                        <tr>
                            <td><center><?php echo $no++ ?></center></td>
                            <td><?php echo $pjk->title_projek ?></td>
                            <td><?php echo $pjk->tipe ?></td>
                            <td><?php echo $pjk->ket ?></td>
                            <td><center>
                            <?php $query=$this->db->query('SELECT * FROM bandwidth WHERE id_projek = '.$pjk->id); ?>
                              <?php if($query->num_rows() > 0) : ?>
                                  <?php if($pjk->peramalan == 0) : ?>
                                      <div class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalFTS" data-id="<?php echo $pjk->id; ?>"  data-ket="<?php echo $pjk->ket; ?>" data-tipe="<?php echo $pjk->tipe; ?>"><i class="fa fa-tasks"></i></div>
                                  <?php else : ?>
                                  <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalFTS" data-id="<?php echo $pjk->id; ?>"  data-ket="<?php echo $pjk->ket; ?>" data-tipe="<?php echo $pjk->tipe; ?>"><i class="fa fa-tasks"></i></div>
                                  <?php endif; ?>
                              <?php else : ?>
                                  <a href="<?php echo base_url('projek') ?>"><div class="btn btn-danger btn-sm" style="font-family: #fff">Empty Data</div></a>
                              <?php endif; ?>
                            </center></td>
                            <td><center>
                                <?php if($pjk->peramalan == 0) : ?>
                                     <div class="btn btn-danger btn-sm">Empty</div>
                                <?php else : ?>
                                     <?php echo anchor('fungsi/detail/'.$pjk->id.'/'.$title.'/'.$pjk->tipe, '<div class="btn btn-primary btn-sm"><i class="fa fa-area-chart"></i></div>'); ?>
                                <?php endif; ?>
                                </center></td>
                            </center></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
            </div>
          </div>
         </div>
        </div>
        
    </section>
</div>

<!-- Modal FTS-->
<div class="modal fade" id="exampleModalFTS" tabindex="-1" role="dialog" aria-labelledby="exampleModalFTS" aria-hidden="true">
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
                <label>t(α)</label>
                <input type="hidden" name="id" id="id"class="form-control">
                <input type="hidden" name="peramalan" id="peramalan" class="form-control" value="1">
                <input type="hidden" name="ket" id="ket" class="form-control">
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
                <label>Tipe Peramalan</label>
                <select class="form-control" name="tipe" id="tipe">
                  <option>Fuzzy Time Series</option>
                  <option>Fuzzy Time Series Cheng</option>
                </select>    
            </div>
            <div class="form-group">
                <label>Jumlah nilai linguistik</label>
                <input type="text" name="kolominterval" id="kolominterval" class="form-control" placeholder="Masukkan Jumlah Interval">
                <input type="checkbox" name="kolomauto" id="kolomauto" value="auto"> Automatic</label>
            </div>
            <div class="form-group">
                <label>Jumlah data prediksi</label>
                <input type="text" name="prediksi" id="prediksi" class="form-control" placeholder="Masukkan jumlah prediksi yang diinginkan">    
            </div>
            <button type="submit" name="fuzifikasi" value="fuzifikasi" class="btn btn-info">Proses Perhitungan</button>
           </form>
      </div>
    </div>
  </div>
</div>

<script>

    $(document).ready(function(){
        $("#exampleModalFTS").on("show.bs.modal", function(event) {

            var button = $(event.relatedTarget);

            var id = button.data('id')
            var tipe = button.data('tipe')
            var ket = button.data('ket')
            
            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #tipe').val(tipe)
            modal.find('.modal-body #ket').val(ket)

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#dataTables-example5').DataTable({
                responsive: true
        });
    });
</script>