<head>
     <!-- DataTables Responsive CSS -->
  <link href="<?php echo base_url() ?>assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

  <script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
  
</head>

<div class="content-wrapper">
     <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
                                <th><center>No</center></th>
                                <th width="300">Nama Projek</th>
                                <th>E-mail</th>
                                <th width="100">Tipe Peramalan</th>
                                <th width="70">Tipe Data</th>
                                <th width="20"><center>Hasil Ramal</center></th>
                                <th width="20"><center>Hapus Data</center></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no =1;
                                foreach($projek as $pjk) : ?>
                            <tr>
                                <td><center><?php echo $no++ ?></center></td>
                                <td><?php echo $pjk->title_projek ?></td>
                                <td><?php echo $pjk->email ?></td>
                                <td><?php echo $pjk->tipe ?></td>
                                <td><?php echo $pjk->ket ?></td>
                                <td><center>
                                <?php if($pjk->peramalan == 0) : ?>
                                    <div class="btn btn-danger btn-sm">Empty</i></div>
                                 <?php else : ?>
                                <?php echo anchor('fungsi/detail/'.$pjk->id.'/Proses%20Peramalan'.'/'.$pjk->tipe , '<div class="btn btn-success btn-sm"><i class="fa fa-search"></i></div>'); ?>
                                <?php endif; ?>
                                </center></td>
                                <td onclick="javascript: return confirm('Hapus projek ini?')"><center><?php echo anchor('projek/hapus/'.$pjk->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash" ></i></div>'); ?></center></td>
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

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url() ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url() ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url() ?>assets/dist/js/sb-admin-2.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example5').DataTable({
                responsive: true
        });
    });
</script>

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