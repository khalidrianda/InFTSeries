<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/step.css">
</head>
<div class="content-wrapper">
  <form id="msform" style="background-color: #dddddd">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active"><a href="#interval" data-toggle="tab">Interval</a></li>
    <li><a href="#fuzzifikasi" data-toggle="tab">Fuzzifikasi</a></li>
    <li><a href="#flr" data-toggle="tab">Fuzzy Logic Relationship</a></li>
    <li><a href="#flrg" data-toggle="tab">Fuzzy Logic Relationship Group</a></li>
    <li><a href="#defuzzifikasi" data-toggle="tab">Defuzzifikasi FLRG</a></li>
    <li><a href="#hasil" data-toggle="tab">Hasil Peramalan</a></li>
    <li><a href="#akurasi" data-toggle="tab">Akurasi</a></li>
    <li><a href="#grafik" data-toggle="tab">Grafik</a></li>
  </ul>
  <!-- fieldsets -->
  <div class="panel-body">
   <div class="col-lg-12">
    <!-- /.panel-heading -->
    <div class="panel-body">
      <!-- Tab panes -->
      <div class="tab-content" style='margin-top:-20px'>
        <fieldset>
           <input type="button" name="next" class="next action-button pull-right" value="Next" />
                <div class="tab-pane fade in" id="interval">
                      <?php foreach($nilai as $pjk) : ?>
                      <?php 
                        if($tipe=="FTSCHENG"){
                          $min = $pjk->min;
                          $max= $pjk->max;
                          $jarak = $pjk->jarak;
                          $temp_min = $max;
                          $temp_max = 0;
                          $i=0;
                          while($temp_min > $min){
                            $temp_max = $temp_min;
                            $temp_min = $temp_min-$jarak;
                            $temp_interval[$i][0] = $temp_min;
                            $temp_interval[$i][1] = $temp_max;
                            $i++;
                          }
                          $interval = ($temp_interval);
                          
                        }else{
                          $DU = $pjk->DU;
                          $DL = $pjk->DL; $o= $pjk->interval_o;
                          $min = $pjk->min;
                          $max= $pjk->max;

                          $temp_min = $max;
                          $temp_max = 0;
                          $i=0;
                          $angka = 1;
                          
                          while ($o>$i){
                            $temp_min = round ($min+(($angka-1)*(($DU-$DL)/$o)), 0);
                            $temp_max = round ($min+($angka*(($DU-$DL)/$o)), 0);
                            if($DU > $temp_max){
                              $temp_interval[$i][0] = $temp_min;
                              $temp_interval[$i][1] = $temp_max;
                            }else{
                              $temp_max=round($max, 0);
                              $temp_interval[$i][0] = $temp_min;
                              $temp_interval[$i][1] = $temp_max;
                            }
                            $angka++;
                            $i++;
                          }
                          $interval = ($temp_interval);
                        }
                       ?>
                      <?php endforeach; ?>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <?php
                                $warna = array("danger","primary","success","info","warning");
                                $count_warna = 0;
                                for($i=0; $i<count($interval); $i++){
                                  echo "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'>";
                                  echo "<a class='btn btn-sm btn-block btn-".$warna[$count_warna]." block' style='margin-top:10px;'>U<sub>".($i+1)."</sub></a>";
                                  echo "<a class='btn btn-sm btn-block btn-default block' style='margin-bottom:10px;'><center>".$interval[$i][0]."-".$interval[$i][1]."</center></a>";
                                  echo "</div>";
                                  if($count_warna < 4) $count_warna++;
                                  else $count_warna = 0;
                                }
                                
                              ?>
                    </div>

            </div>
  </fieldset>
  <fieldset>
    <input type="button" name="next" class="next action-button pull-right" value="Next" />
    <input type="button" name="previous" class="previous action-button pull-right" style="margin-right: 5px" value="Previous" />
   <div class="tab-pane fade in" id="fuzzifikasi">
                      <br>
                      <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Tanggal</center></th>
                            <th><center>Bulan</center></th>
                            <th><center>Tahun</center></th>
                            <th><center>Data Aktual</center></th>
                            <th><center>Fuzzifikasi</center></th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                                    $no =1; $i=0; $a=count($detail);
                                    foreach($detail as $dtl) : 
                                      if ($i == ($a-1)) { break; }?>
                              <tr>
                                <td><center><?php echo $no++ ?></center></td>
                                        <td align="center"><?php echo $dtl->tanggal ?></td>
                                        <td align="center"><?php echo ucwords($dtl->bulan) ?></td>
                                        <td align="center"><?php echo $dtl->tahun ?></td>
                                        <td align="center"><?php echo $dtl->jumlah ?></td>
                                        <td align="center">A<?php echo $dtl->fuzzy ?></td>
                                        <?php $i++; ?>

                              </tr>
                              
                           <?php endforeach; ?>
                        </tbody>
                        </table>
                      </div>
                    <!-- /.table-responsive -->
        </div>
  </fieldset>
  <fieldset>
    <input type="button" name="next" class="next action-button pull-right" value="Next" />
    <input type="button" name="previous" class="previous action-button pull-right" style="margin-right: 5px" value="Previous" />
    <div class="tab-pane fade in" id="flr">
                      <br>
                      <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Urutan Waktu</center></th>
                            <th><center>FLR</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $i=0;
                            foreach ($detail as $dtl) : ?>
                          <?php 
                              $temp_intervall[$i][0] = $dtl->bulan;
                              $temp_intervall[$i][1] = $dtl->tahun;
                              $temp_intervall[$i][2] = $dtl->fuzzy;
                              $i++;
                           ?>
                          <?php endforeach; ?>

                           <?php $waktu = ($temp_intervall); ?>
                           
                          <?php
                            

                            for($i=0; $i<(count($waktu)-2); $i++){
                            
                              echo "<tr>";
                              echo "<td><center>".($i+1)."</center></td>";
                              echo "<td style='padding-left:30px'>".ucwords($waktu[$i][0])." ".$waktu[$i][1]." - ".ucwords($waktu[($i+1)][0])." ".$waktu[($i+1)][1]."</td>";
                              echo "<td><center>A<sub>".$waktu[$i][2]."</sub> - A<sub>".$waktu[($i+1)][2]."</sub></center></td>";
                              echo "</tr>";

                              $save_flrg[($waktu[$i][2]-1)][] = $waktu[($i+1)][2] ;
                            }
                            
                              
                          ?>
                        

                        </tbody>
                        </table>
                      </div>
                            <!-- /.table-responsive -->
                    </div>
  </fieldset>
  <fieldset>
    <input type="button" name="next" class="next action-button pull-right" value="Next" />
    <input type="button" name="previous" class="previous action-button pull-right" style="margin-right: 5px" value="Previous" />
    <div class="tab-pane fade in" id="flrg">
                      <br>
                      <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example3">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Current State</center></th>
                            <th><center>Bandwidth Hasil Peramalan</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          
                            for($i=0; $i<(count($waktu)); $i++){
                              if(!empty($save_flrg[$i])){
                                $unik[$i] = array_unique($save_flrg[$i]);
                                foreach($unik[$i] as $key=>$value){
                                  $flrg[$i][] = $value;
                                }
                              }
                            }
                            $x=0;
                            for($i=0; $i<(count($waktu)); $i++){
                              if(!empty($flrg[$i])){
                                echo "<tr>";
                                  echo "<td align='center'>".($x+1)."</td>";
                                  echo "<td align='center'>A<sub>".($i+1)."</sub> => </td>";
                                  echo "<td align='center'>";
                                  for($j=0; $j<count($flrg[$i]); $j++){
                                    if($j<(count($flrg[$i])-1))
                                      echo "A<sub>".$flrg[$i][$j]."</sub>, ";
                                    else
                                      echo "A<sub>".$flrg[$i][$j]."</sub>";
                                  }
                                  echo "</td>";
                                echo "</tr>";
                                $x++;
                              }
                            }
                          
                          ?>
                          
                        </tbody>
                        </table>
                      </div>
                    <!-- /.table-responsive -->
                    </div>
  </fieldset>
  <fieldset>
    <input type="button" name="next" class="next action-button pull-right" value="Next" />
    <input type="button" name="previous" class="previous action-button pull-right" style="margin-right: 5px" value="Previous" />
    <div class="tab-pane fade in" id="defuzzifikasi">
                      <br>
                      <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Current State</center></th>
                            <th><center>Next State</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          
                            
                            for($i=0; $i<count($interval); $i++){
                              $jml = 0;
                              if(!empty($flrg[$i])){
                                for($j=0; $j<count($flrg[$i]); $j++){
                                  $jml += (($interval[($flrg[$i][$j]-1)][0] + $interval[($flrg[$i][$j]-1)][1])/2);
                                }
                                $rata2[] = $jml / count($flrg[$i]);
                              }
                              else{
                                $rata2[] = (($interval[$i][0]+$interval[$i][1])/2);
                              }
                            }
                            
                            for($i=0; $i<count($rata2); $i++){
                              echo "<tr>";
                                echo "<td align='center'>".($i+1)."</td>";
                                echo "<td align='center'>A<sub>".($i+1)."</sub></td>";
                                echo "<td align='center'>".number_format($rata2[$i], 2)."</td>";
                              echo "</tr>";
                            }
                            
                            
                          ?>
                        </tbody>
                        </table>
                      </div>
                    <!-- /.table-responsive -->
                    </div>

  </fieldset>
  <fieldset>
    <input type="button" name="next" class="next action-button pull-right" value="Next" />
    <input type="button" name="previous" class="previous action-button pull-right" style="margin-right: 5px" value="Previous" />
    <div class="tab-pane fade in active" id="hasil">
                      <br>
                      <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example5">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Tanggal</center></th>
                            <th><center>Bulan</center></th>
                            <th><center>Tahun</center></th>
                            <th><center>Bandwidth Aktual</center></th>
                            <th><center>Fuzzifikasi</center></th>
                            <th><center>Bandwidth Peramalan</center></th>
                            <th><center>MAPE</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                                    $no =1; $row=-1; $akurasi=0;
                                    foreach($detail as $dtl) : ?>
                              <?php $akurasi += $dtl->mape; $row++; 
                                
                                if($dtl->jumlah==0){
                                  $jumla[] = "-";
                                }else{
                                  $jumla[] = $dtl->jumlah;  
                                }
                                if($dtl->hasil_ramal==0){
                                  $hasila[] = "-";
                                }else{
                                  $hasila[] = $dtl->hasil_ramal;
                                }
                                $toge[] = $dtl->tanggal;
                                $tog = ($dtl->tanggal." ".ucwords($dtl->bulan)." ".$dtl->tahun);
                                $tampung[] = $tog;
                              ?>
                              <tr>
                                <td><center><?php echo $no++ ?></center></td>
                                        <td align="center"><?php echo $dtl->tanggal ?></td>
                                        <td align="center"><?php echo ucwords($dtl->bulan) ?></td>
                                        <td align="center"><?php echo $dtl->tahun ?></td>
                                        <td align="center"><?php echo $dtl->jumlah ?></td>
                                        <td align="center">A<?php echo $dtl->fuzzy ?></td>
                                        <td align="center"><?php echo $dtl->hasil_ramal ?></td>
                                        <td align="center"><?php echo number_format($dtl->mape, 2) ?></td>
                              </tr>
                              
                           <?php endforeach; ?>
                        </tbody>
                        </table>
                      </div>
                    <!-- /.table-responsive -->
                    </div>
                    
  </fieldset>
    <fieldset>
    <input type="button" name="next" class="next action-button pull-right" value="Next" />
    <input type="button" name="previous" class="previous action-button pull-right" style="margin-right: 5px" value="Previous" />
    <div class="tab-pane fade in" id="akurasi">
                      <br>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <?php
                            $akurasi = $akurasi-100;
                            $row = $row-1;
                            $akurat =  $akurasi/$row;?>

                            <button class='btn btn-info'>MAPE</button> &nbsp;  <u>100 % x <?php echo number_format($akurasi); ?>
                            </u><br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row;  ?>
                            <br/>
                            
                            <button class='btn btn-info'>MAPE</button> &nbsp; = <?php echo number_format($akurat,2) ?> %
                            <br/>
                            <br>
                            <?php if($akurat<10){
                            echo '<button class="btn btn-success">PERAMALAN SANGAT BAIK</button>';
                            }else if($akurat<20){
                            echo '<button class="btn btn-info">PERAMALAN BAIK</button>';
                            }else if($akurat<30){
                            echo '<button class="btn btn-warning">PERAMALAN CUKUP</button>';
                            }else if($akurat>30){
                            echo '<button class="btn btn-danger">PERAMALAN TIDAK AKURAT</button>';
                            }
                             ?>
                        </div>
                    </div>
  </fieldset>
   <fieldset>
    <input type="submit" name="previous" class="previous action-button pull-right"  value="Submit" />
    <div class="tab-pane fade in" id="grafik">
                      <br>
                        <canvas id="lineChart"></canvas>
                    </div>
  </fieldset>
</div></div></div></div>
</form>
</div>

<script >
  var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
 
$(".next").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});
 
$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});
 
$(".submit").click(function(){
  return false;
})
</script>

 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
     <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable({
                responsive: true
        });
    });
    </script>
  
   <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example3').DataTable({
                responsive: true
        });
    });
    </script>
  
  
   <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example4').DataTable({
                responsive: true
        });
    });
    </script>
   <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example5').DataTable({
                responsive: true
        });
    });
    </script>
  
   <script>
      //line
    var dataa = new Array();
    <?php foreach($hasila as $key => $val){ ?>
        dataa.push('<?php echo $val; ?>');
    <?php } ?>

    var juml = new Array();
    <?php foreach($jumla as $key => $val1){ ?>
        juml.push('<?php echo $val1; ?>');
    <?php } ?>

    var tamp = new Array();
    <?php foreach($tampung as $key => $val1){ ?>
        tamp.push('<?php echo $val1; ?>');
    <?php } ?>
  
  var ctxL = document.getElementById("lineChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
  labels: tamp,
  datasets: [{
  label: "Data Aktual",
  data: juml,
  backgroundColor: [
  'rgba(105, 0, 132, .2)',
  ],
  borderColor: [
  'rgba(200, 99, 132, .7)',
  ],
  borderWidth: 2
  },
  {
  label: "Data Hasil Ramal",
  data: dataa,
  backgroundColor: [
  'rgba(0, 137, 132, .2)',
  ],
  borderColor: [
  'rgba(0, 10, 130, .7)',
  ],
  borderWidth: 2
  }
  ]
  },
  options: {
  responsive: true
  }
  });

    </script>
