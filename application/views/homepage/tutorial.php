
  <header>
        <div class="header-area " style="background-color: #42505d;">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="<?php echo base_url('home'); ?>">
                                        <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                         <li><a href="<?php echo base_url('home/guide'); ?>">Guide</a></li>
                                            <li><a href="<?php echo base_url('home/tutorial'); ?>">Tutorial</a></li>
                                            <li><a href="<?php echo base_url('home/research'); ?>">Research</a></li>
                                            <li><a href="<?php echo base_url('home/community'); ?>">Community</a>
                                            </li>
                                            <li><a href="<?php echo base_url('home/develop'); ?>">Dev</i></a>
                                                
                                            </li>
                                            <li><a href="<?php echo base_url('home/kontak'); ?>">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="#"> <i class="fa fa-phone"></i> +62 8226 7957 955</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                         <?php if($login=="tidak ada") : ?>
                                            <a class="boxed-btn4" href="<?php echo base_url('auth'); ?>">Login</a>
                                        <?php else : ?>
                                            <a class="boxed-btn4" href="<?php echo base_url('projek'); ?>">My Project</a>
                                        <?php endif; ?>
                                    </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

<body id="page-top">
  <br><br><br><br>
  <!-- Page Wrapper -->
  <div id="wrapper" style="margin-top: 9.4px; margin-left: 200px;">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <br>
      <div class="sidebar-heading" style="margin-top: 15px"><center>
        <a href="#kenapafuzzy">
            back to top
        </a></center>
      </div>                                
      <br>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Project
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-circle"></i>
          <span>Fuzzy Time Series</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Definisi:</h6>
            <a class="collapse-item" href="#kenapafuzzy">Kenapa fuzzy time series?</a>
            <a class="collapse-item" href="#carakerja">Cara kerja fuzzy time series</a>
            <a class="collapse-item" href="#tabelt">Tabel distribusi normal</a>
            <a class="collapse-item" href="#standardeviasi">Standar Deviasi</a>
          </div>
        </div>
      </li>

        <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-circle"></i>
          <span>Create Project</span>
        </a>
        <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Project:</h6>
            <a class="collapse-item" href="#buatprojek">Create Project</a>
            <a class="collapse-item" href="#tabelprojek">Tabel Project</a>
            <a class="collapse-item" href="#importprojek">Import Data</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-circle"></i>
          <span>Proses Peramalan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Proses Peramalan:</h6>
            <a class="collapse-item" href="#proses">Tabel Proses Peramalan</a>
            <a class="collapse-item" href="#prosesperamalan">Fuzzifikasi</a>
          </div>
        </div>
      </li>

        <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-circle"></i>
          <span>Tahapan Manual FTS</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Proses Peramalan:</h6>
            <a class="collapse-item" href="#buatdata">Masukkan Data</a>
            <a class="collapse-item" href="#himpsemes">Himpunan Semesta U</a>
            <a class="collapse-item" href="#buatinter">Interval</a>
            <a class="collapse-item" href="#fuzzifii">Fuzzifikasi</a>
            <a class="collapse-item" href="#flr">Fuzzy Logic Relationship</a>
            <a class="collapse-item" href="#flrg">FLR Group</a>
            <a class="collapse-item" href="#dflrg">Defuzzifikasi FLRG</a>
            <a class="collapse-item" href="#hramal">Hasil Ramal</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a href="#mape" class="nav-link">
          <i class="fas fa-fw fa-circle"></i>
          <span>MAPE</span>
        </a>
      </li>
    </ul>
    <!-- End of Sidebar -->

  <div id="wrapper" style="margin-top: -110px; background-color: #fff">
<!-- Begin Page Content -->
    <div class ="content-wrapper">
      <div class="container-fluid">
          <!-- Content Row -->
          <div class="row" style="margin-top: 0px;">
              <div class="about_area plus_padding">
                   <div class="container" >
                      <div class="row align-items-center">
                          <div class="col-lg-12 col-md-8">
                              <div class="about_info pl-68" align="justify">
                                  <div id="kenapafuzzy" class="about_list">
                                      <h3>Kenapa Fuzzy Time Series ?</h3>
                                      <li style="color: #444">Untuk meramalkan data, diperlukan parameter sebagai pendukung agar data dapat diramalkan. Parameter sering kali mengandung ketidakpastian dan memerlukan banyak faktor pendukung agar data yang diramalkan menjadi lebih akurat. Parameter-parameter ini dapat diwakili dan dibuat keputusan berdasarkan aturan fuzzy dengan menggunakan logika fuzzy, salah satunya fuzzy time series. Kelebihan metode fuzzy time series yaitu metode ini tidak membutuhkan asumsi-asumsi sebagaimana peramalan dengan menggunakan metode klasik lainnya. Fuzzy time series dapat menangkap pola dari masa lalu untuk memproyeksikan data dimasa depan.
                                  </li>
                                  </div>
                                  <hr>
                                  <div id="carakerja" class="about_list">
                                      <h3>Cara kerja metode fuzzy time series ?</h3>
                                      <li style="color: #444">Metode fuzzy time series meramal dengan menggunakan pola data dari masa lalu, untuk meramalkan data dimasa depan. Peramalan dilakukan dengan menggunakan tabel distribusi normal dan standar deviasi sebagai faktor penentu tingkat kepercayaan peramalan data.
                                      </li>
                                  </div>
                                  <hr>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="container">
                      <div class="row align-items-center">
                          <div class="col-lg-4 col-md-6">
                              <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                  <img src="<?php echo base_url(); ?>assets/img/Tutorial/tabelt.jpg" alt="">
                              </div>
                          </div>
                          <div class="col-lg-8 col-md-6">
                              <div class="about_info pl-68" align="justify">
                                  <div id="tabelt">
                                      <h3>Tabel distribusi normal</h3>
                                  </div>
                                  <p style="color: #444">Tabel distribusi normal digunakan untuk menentukan hipotesis, dengan nilai kepercayaan sebesar α. Banyak data yang dapat dihitung menggunakan tabel distribusi normal sebesar 300 data.</p>
                                  <hr>
                                  <h3 id="standardeviasi">Standar Deviasi / Simpangan Baku</h3>
                                  <p style="color: #444">Simpangan baku adalah salah satu teknik statistik yang sering digunakan untuk menjelaskan homogenitas dari sebuah kelompok. Simpangan baku  juga merupakan nilai statistik yang sering digunakan untuk menentukan bagaimana sebaran data dalam sampel, serta seberapa dekat titik data individu ke mean atau rata-rata nilai dari sampelnya.</p>
                              </div>
                          </div>
                      </div>
                      <hr>
                  </div>

                  <div id="buatprojek" class="container">
                      <div class="row align-items-center">
                          <div class="col-lg-6 col-md-6">
                              <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                  <img src="<?php echo base_url(); ?>assets/img/Tutorial/projek.png" alt="">
                              </div>
                          </div>
                          <div class="col-lg-5 col-md-6">
                              <div class="about_info pl-68">
                                  <h3>Membuat Projek</h3>
                                  <p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s">Untuk meramalkan data, anda harus membuat projek terlebih dahulu.</p>
                                  <div class="about_list">
                                      <ul>
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">Klik sidebar Projek.</li>
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Setelah halaman projek muncul, Kemudian tekan tombol tambah projek disudut kanan atas.</li>
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".7s">Isikan nama, tipe peramalan, dan jenis data. Lalu Simpan.</li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".8s">
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".9s">Projek anda telah dibuat.</li>
                                      </ul>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                  </div>

                   <div id="dataprojek" class="container" style="margin-top: 10px">
                      <div class="row align-items-center">
                          
                          <div class="col-lg-5 col-md-6">
                              <div class="about_info pl-68">
                                  <h3>Tabel Projek</h3>
                                   <p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s" align="justify">Tabel ini berisikan projek-projek yang telah anda buat dengan beberapa informasi didalamnya, yaitu :</p>
                                  <div class="about_list">
                                      <ul>
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Tipe data projek anda.</li>
                                          <li class="" data-wow-duration="1s" data-wow-delay=".5s">Jumlah data dalam projek anda.</li>
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Import data dari file excel.</li>
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".7s">Lihat data anda.</li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".8s">
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".9s">Edit dan Hapus data.</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                              <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                  <img src="<?php echo base_url(); ?>assets/img/Tutorial/ttprojek.png" alt="">
                              </div>
                          </div>
                      </div>
                  </div>

                  <div id="importprojek" class="container">
                      <div class="row align-items-center">
                          <div class="col-lg-6 col-md-6">
                              <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                  <img src="<?php echo base_url(); ?>assets/img/Tutorial/excel.png" alt="">
                              </div>
                          </div>
                          <div class="col-lg-5 col-md-6">
                              <div class="about_info pl-68">
                                  
                                      <h3>Import Data</h3>
                                  
                                  <p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s" align="justify">Untuk mengimport data, anda harus menggunakan file excel dengan format seperti digambar.</p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div id="proses" class="container" style="margin-top: 10px">
                      <div class="row align-items-center">
                          
                          <div class="col-lg-5 col-md-6">
                              <div class="about_info pl-68">
                                 
                                      <h3>Tabel Proses Peramalan</h3>
                                 
                                   <p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s" align="">Tabel ini memuat projek-projek yang akan diramalkan, di tabel ini memuat beberapa informasi, yaitu :</p>
                                  <div class="about_list" align="">
                                      <ul>
                                          <li class="" data-wow-duration="1s" data-wow-delay=".5s">Nama projek anda.</li>
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Tipe data projek anda.</li>
                                          <li class="" data-wow-duration="1s" data-wow-delay=".5s">Tombol fuzzifikasi untuk melakukan proses perhitungan</li>
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Tombol lihat proses peramalan untuk melihat proses peramalan yang telah dilakukan.</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-7 col-md-6">
                              <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                  <img src="<?php echo base_url(); ?>assets/img/Tutorial/proses.png" alt="">
                              </div>
                          </div>
                      </div>
                  </div>


                  <div id="prosesperamalan" class="container">
                      <div class="row align-items-center">
                          <div class="col-lg-5 col-md-6">
                              <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                  <img src="<?php echo base_url(); ?>assets/img/Tutorial/fuzzi.png" alt="">
                              </div>
                          </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="about_info pl-68">
                                  
                                      <h3>Tombol Fuzzifikasi</h3>
                                 
                                   <p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s" align="justify">Untuk melakukan peramalan, dibutuhkan beberapa input, yaitu :</p>
                                  <div class="about_list" align="justify">
                                      <ul>
                                          <li class="" data-wow-duration="1s" data-wow-delay=".5s">t(α) untuk memasukkan tingkat kepercayaan peramalan</li>
                                          <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Jumlah nilai linguistik, untuk membuat interval pada proses peramalan. Atau dapat dibuat secara otomatis dengan mencentang check box.</li>
                                          <li class="" data-wow-duration="1s" data-wow-delay=".5s">Jumlah data prediksi, yaitu berapa banyak data yang akan diramal ke masa depan.</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                   <div id="tahapanmanual" class="container" style="margin-top: 50px">
                      <div class="row align-items-center">
                          <div class="col-lg-12 col-md-6">
                              <div class="about_info pl-68" align="justify">
                                  <div>
                                      <h3>Tahapan manual proses peramalan fuzzy time series</h3>
                                  </div>
                                  <div class="about_list">
                                      <ul>
                                          <li id="buatdata" class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Menentukan Data Aktual.</li>
                                            <p>Anda harus memasukkan data terlebih dahulu untuk dapat melakukan peramalan, cara memasukkan data dapat dilihat pada <a href="#importprojek">import projek.</a></p>
                                          <li id="himpsemes" class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Menentukan himpunan semesta U.</li>
                                            <p>Penentuan himpunan semesta U merupakan tahapan awal dalam melakukan peramalan. Pencarian nilai semesta U akan dilakukan otomatis oleh sistem, berikut adalah rumus pencarian nilai semesta U.</p>
                                            <img src="<?php echo base_url(); ?>assets/img/Tutorial/himpsemes.png" alt="">
                                            <p style="margin-top: 10px"></p>
                                          <li id="buatinter" class="" data-wow-duration="1s" data-wow-delay=".5s">Membuat sejumlah interval data berdasarkan himpunan semesta U.</li>
                                            <p>Setelah penentuan nilai semesta u, data akan dibagi menjadi sejumlah ganjil interval yang sama u1, u2, …, um,. Misalkan 𝑈 = [DL,DU] bisa dibagi menjadi tujuh interval u1, u2, u3, u4, u5, u6, u7 dengan menggunakan rumus :</p>
                                            <img src="<?php echo base_url(); ?>assets/img/Tutorial/interv.png" alt="">
                                            <p style="margin-top: 10px">Disini kita perlu menginput nilai m (jumlah nilai linguistik/interval), saat melakukan proses peramalan.</p>
                                          <li id="fuzzifikasii" class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Fuzzifikasi.</li>
                                            <p>Selanjutnya adalah proses fuzzifikasi, dimana kita mengubah nilai nominal menjadi variabel nilai linguistik. Menurut Boaisha dan Amaitik, berikut adalah aturan untuk menentukan detajat keanggotaan U1 sebagai berikut :</p>
                                            <img src="<?php echo base_url(); ?>assets/img/Tutorial/fuzzifi.png" alt="">
                                            <p style="margin-top: 10px">Dimana derajat keanggotaan miliki ditentukan sebagai berikut :</p>
                                            <img src="<?php echo base_url(); ?>assets/img/Tutorial/fuzzifii.png" alt="">
                                            <p style="margin-top: 10px">Berikut merupakan contoh tabel hasil proses fuzzifikasi :</p>
                                            <img src="<?php echo base_url(); ?>assets/img/Tutorial/fuzzifik.png" alt="">
                                            <p></p>
                                          <li id="flr" class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".7s">Fuzzy Logic Relationship.</li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".8s">
                                            <p>Fuzzy logic relationship yaitu proses menghubungkan data-data historis membentuk sebuah pola ikatan antar data yang mana data pertama dihubungkan ke data kedua, data kedua dihubungkan dengan data ketiga, dst. Berikut merupakan tabel contoh fuzzifikasi :</p>
                                            <img src="<?php echo base_url(); ?>assets/img/Tutorial/fuzzifiii.png" alt="">
                                            <p></p>
                                          <li id="flrg" class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".9s">Fuzzy Logic Relationship Group.</li>
                                            <p>Dari Rumus 2.6. maka bisa diperoleh fuzzy logical relationship, dimana fuzzy logical relationship Aj → Ak berarti jika nilai enrollment pada tahun i adalah Aj maka pada tahun i+1 adalah Ak. Aj sebagai sisi kiri relationship disebut sebagai current state dan Ak sebagai sisi kanan relationship disebut sebagai next state. Dan jika terjadi perulangan hubungan maka tetap dihitung sekali. Adapun contoh fuzzy logical relationship ditampilkan pada gambar berikut :</p>
                                            <img src="<?php echo base_url(); ?>assets/img/Tutorial/flrg.png" alt="">
                                            <p></p>
                                          <li id="dflrg" class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Defuzzifikasi FLRG.</li>
                                            <p>Proses yang terakhir adalah proses peramalan dan defuzzifikasi berdasarkan FLRG yang telah dibentuk. Semua nilai yang mungkin dari hasil fuzzifikasi untuk masingmasing kelompok dapat dihitung terlebih dahulu untuk mempermudah proses peramalan. Besarnya nilai bandwidth pada kelompok himpunan semesta dicari dengan cara menjumlahkan nilai tengah dari interval next state dari current state FLRG dan dibagi sebanyak jumlah dari next state.</p>
                                            <p></p>
                                          <li id="hramal" class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Hasil Ramal.</li>
                                          <p>Setelah semua proses dijalankan, maka akan didapatkan hasil peramalan data projek yang anda inginkan.</p>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                   <div class="container">
                      <div class="row align-items-center">
                          <div class="col-lg-8 col-md-6">
                              <div id="mape" class="about_info pl-68" align="justify">
                                  <h3>Mean Absolute Percentage Error (MAPE)</h3>
                                  <p style="color: #444">Mean Absolute Percentage Error (MAPE) dihitung dengan menggunakan kesalahan absolut pada tiap periode dibagi dengan nilai observasi yang nyata untuk periode itu. Kemudian, merata-rata kesalahan persentase absolut tersebut. Pendekatan ini berguna ketika ukuran atau besar variabel ramalan itu penting dalam mengevaluasi ketepatan ramalan. MAPE mengindikasi seberapa besar kesalahan dalam meramal yang dibandingkan dengan nilai nyata. Berikut merupakan rumus pencarian MAPE :</p>
                                  <img src="<?php echo base_url(); ?>assets/img/Tutorial/mape.png" alt="">
                                  <p style="color: #444; margin-top: 10px">Kriteria keakuratan MAPE menurut Lewis (1997) dapat dilihat pada gambar dibawah ini.</p>
                                  <img src="<?php echo base_url(); ?>assets/img/Tutorial/kmape.png" alt="">
                              </div>
                          </div>
                      </div>
                      <hr>
                  </div>

              </div>
              <!-- about_area_end  -->
          </div>
        </div>
        <!-- /.container-fluid -->

</body>