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
                            <th width="10"><center>No</center></th>
                            <th width="300"><center>Nama Projek</center></th>
                            <th width="90"><center>Tipe Data</center></th>
                            <th width="50"><center>Grafik</center></th>
                            <th width="50"><center>Excel</center></th>
                            <th width="50"><center>Cetak</center></th>
                        </thead>
                        <tbody>
                            <?php 
                            $no =1;
                            foreach($projek as $pjk) : ?>
                        <tr>
                            <td><center><?php echo $no++ ?></center></td>
                            <td><?php echo $pjk->title_projek ?></td>
                            <td><?php echo $pjk->ket ?></td>
                            <?php if($pjk->peramalan == 0) : ?>
                            <td><center><div class="btn btn-danger btn-sm">Empty</div></center></td>
                            <td><center><div class="btn btn-danger btn-sm">Empty</div></center></td>
                            <td><center><div class="btn btn-danger btn-sm">Empty</div></center></td>
                            <?php else : ?>
                            <td><center><button type="button" onclick="window.open('<?php echo site_url("fungsi/printgrap/".$pjk->id);?>')" class="btn btn-primary"><i class="fa fa-line-chart"></i>
                                </button>
                            </center></td>
                            <td><center><button type="button" onclick="window.open('<?php echo site_url("fungsi/export/".$pjk->id);?>')" class="btn btn-primary"><i class="fa fa-file-excel-o"></i>
                                </button></center></td>
                            <td><center><div type="button" onclick="window.open('<?php echo site_url("fungsi/prints/".$pjk->id);?>')" class="btn btn-primary"><i class="fa fa-print"></div></i></center></td>
                            </center></td>
                            <?php endif; ?>
                        </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    

<!-- Modal -->
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
        <form method="post" action="<?php echo base_url().'projek/tambah_aksi'; ?>">
            <div class="form-group">
                <label>Nama Projek</label>
                <input type="text" name="title_projek" class="form-control">    
            </div>
             <div class="form-group">
                <label>Tipe Peramalan</label>
                <select class="form-control" name="tipe">
                  <option>Fuzzy Time Series</option>
                </select>    
            </div>
             <div class="form-group">
                <label>Keterangan</label>
                 <select class="form-control" name="ket">
                  <option>Data Bulanan</option>
                  <option>Data Harian</option>
                </select>     
            </div>
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal" id="exampleModalEdit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?php echo base_url('projek/update'); ?>">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="id"  name="id">
                                            <label class="bmd-label-floating">Nama Projek</label>
                                            <input type="text" class="form-control" id="title_projek"  name="title_projek">
                                            <label class="bmd-label-floating">Tipe</label>
                                            <input type="text" class="form-control" id="tipe"  name="tipe">
                                            <label class="bmd-label-floating">Keterangan</label>
                                              <select class="form-control" id="ket" name="ket">
                                                <option>Data Bulanan</option>
                                                <option>Data Harian</option>
                                              </select>
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
        $("#exampleModalEdit").on("show.bs.modal", function(event) {

            var button = $(event.relatedTarget);

            var id = button.data('id')
            var title_projek = button.data('title_projek')
            var tipe = button.data('tipe')
            var ket = button.data('ket')

            
            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #title_projek').val(title_projek)
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