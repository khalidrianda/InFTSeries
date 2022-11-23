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
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i> Tambah Data</button>
        <hr>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah</th>
            </tr>
            <?php 
                $no =1;
                foreach($projek as $pjk) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pjk->title_projek ?></td>
                <td><?php echo $pjk->tipe ?></td>
                <td><?php echo $pjk->ket ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </section>
    

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Bandwidth</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post"action="<?php echo base_url().'bandwidth/tambah_aksi' ?>"></form>
            <div class="form-group">
                <label>Bulan</label>
                <input type="text" name="bulan">    
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>