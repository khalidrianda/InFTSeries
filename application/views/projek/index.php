<div class="content-wrapper">
     <section class="content-header">
      <h1>
        Data Projek
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Projek</li>
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
        <div>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i> Tambah Projek</button> 
        </div>
        <hr>
        <br>
        <div class="col-lg-12">
            <div class="tab-pane fade in active">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example5">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th width="350px"><center>Nama Projek</center></th>
                                <th><center>Tipe Data</center></th>
                                <th><center>Jumlah Data</center></th>
                                <th><center>Import Data</center></th>
                                <th width="70px"><center>Lihat Data</center></th>
                                <th width="10px"><center>Edit</center></th>
                                <th width="10px"><center>Hapus</center></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no =1;
                                foreach($projek as $pjk) : ?>
                            <tr>
                                <?php $query=$this->db->query('SELECT * FROM bandwidth WHERE id_projek = '.$pjk->id); ?>
                                <td><center><?php echo $no++ ?></center></td>
                                <td><?php echo $pjk->title_projek ?></td>
                                <td><?php echo $pjk->ket ?></td>
                                <td><center><?php echo $query->num_rows() ?></center></td>
                                <td><center><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1" data-id="<?php echo $pjk->id; ?>"><i class="fa fa-file"></i> Import Data</button></center></td>
                                <td><center><?php echo anchor('data/detail/'.$pjk->id.'/'.$pjk->ket, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>'); ?></center></td>
                                 <td><center>
                                  <a type="button" class="btn waves-effect waves-light btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit" 
                                  data-id="<?php echo $pjk->id; ?>" data-title_projek="<?php echo $pjk->title_projek; ?>" data-tipe="<?php echo $pjk->tipe; ?>" data-ket="<?php echo $pjk->ket; ?>" data-peramalan="<?php echo $pjk->peramalan; ?>" data-aktual="<?php echo $pjk->data_aktual; ?>">
                                  <i class="fa fa-edit" ></i></a>
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
                <input type="hidden" name="peramalan" class="form-control" value="0">
                <input type="hidden" name="data_aktual" class="form-control" value="0">
                <input type="text" name="title_projek" class="form-control">    
            </div>
             <div class="form-group">
                <label>Tipe Peramalan</label>
                <select class="form-control" name="tipe">
                  <option>Fuzzy Time Series</option>
                  <option>Fuzzy Time Series Cheng</option>
                </select>    
            </div>
             <div class="form-group">
                <label>Keterangan</label>
                 <select class="form-control" name="ket">
                  <option>Data Tahunan</option>
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
                                            <input type="hidden" class="form-control" id="peramalan"  name="peramalan">
                                            <input type="hidden" class="form-control" id="aktual"  name="aktual">
                                            <label class="bmd-label-floating">Nama Projek</label>
                                            <input type="text" class="form-control" id="title_projek"  name="title_projek">
                                            <label class="bmd-label-floating">Tipe</label>
                                                 <select class="form-control" id="tipe" name="tipe">
                                                  <option>Fuzzy Time Series</option>
                                                  <option>Fuzzy Time Series Cheng</option>
                                                </select>
                                            <label class="bmd-label-floating">Keterangan</label>
                                              <select class="form-control" id="ket" name="ket">
                                                <option>Data Tahunan</option>
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
        <div class="form-group">
            <button class="btn btn-info btn-sm" onclick="window.open('<?php echo site_url("fungsi/tempfile"); ?>')" style="margin-right: 5px">Template.xls</button> Unduh template file
        </div>
        <form method="post" action="<?php echo base_url('assets/uploadc.php'); ?>" id="import_form" enctype="multipart/form-data">
             <div class="form-group">
                <label>Select excel file</label>
                <input type="hidden" name="id" id="id" class="form-control">
                <input type="hidden" name="title" id="title" class="form-control" value="<?php echo $title; ?>">
                <input type="file" name="file" id="file" required accept=".xls, xlsx" class="form-control">    
            </div>
            <button type="submit" name="import" value="Import" class="btn btn-info">Import</button>
           </form>
      </div>
    </div>
  </div>
</div>

</div>



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
            var peramalan = button.data('peramalan')
            var aktual = button.data('aktual')

            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #title_projek').val(title_projek)
            modal.find('.modal-body #tipe').val(tipe)
            modal.find('.modal-body #ket').val(ket)
            modal.find('.modal-body #peramalan').val(peramalan)
            modal.find('.modal-body #aktual').val(aktual)

        });
    });
</script>

<script>

    $(document).ready(function(){
        $("#exampleModal1").on("show.bs.modal", function(event) {

            var button = $(event.relatedTarget);

            var id = button.data('id')
            
            var modal = $(this)
            modal.find('.modal-body #id').val(id)

        });
    });
</script>