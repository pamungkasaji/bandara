
  <script>
  $(document).ready(function(){
    $('#getarea').change(function(){
      var getarea=$('#getarea').val();
      if(getarea !='')
      {
        $.ajax({
          url : "<?php echo base_url(); ?>Dashboard/get_subselect",
          method : "POST",
          data : {getarea: getarea},
          success:function(data){
            $('#getsubarea').html(data);
          }
        })
      }
    });
  });
  </script>

  <?php
  if (is_array($skortanggal) || is_object($skortanggal))
      {
        foreach($skortanggal as $data){
          $time=strtotime($data->tanggal);
          $hari=date("M y",$time);
          $tanggal[] = $hari;
          $skor[] = ($data->skor1)/($data->tottang);
        }
      }

      if (is_array($subsub) || is_object($subsub))
    {
            foreach($subsub as $data){
              //$time=strtotime($data->tanggal);
              //$hari=date("D",$time);
                $subar[] = $data->nama_subarea;
                $skorp[] = ($data->skor1)/($data->suba);
                //$skorup[] = ($data->skor1)/($data->tangnew);
                $tangsub[] = $data->tanggal;
            }
          }

          if (is_array($subnew) || is_object($subnew))
          {
                foreach($subnew as $data){
                  //$time=strtotime($data->tanggal);
                  //$hari=date("D",$time);
                    //$subup[] = $data->nama_subarea;
                    $skornew[] = ($data->skor1)/($data->subb);
                    //$skorup[] = ($data->skor1)/($data->tangnew);
                    $namasub[] = $data->nama_subarea;
                }
              }

          if (is_array($data_area) || is_object($data_area))
          {
            foreach($data_area as $data){
              //$time=strtotime($data->tanggal);
              //$hari=date("D",$time);
              $areas[] = $data->nama_area;
              $skora[] = ($data->skor1)/($data->are);
            }
          }

          if (is_array($line_sub) || is_object($line_sub))
          {
            foreach($line_sub as $data){
              //$time=strtotime($data->tanggal);
              //$hari=date("D",$time);
              $time=strtotime($data->tanggal);
              $bulan=date("M y",$time);
              $tangls[] = $bulan;
              $skorls[] = ($data->skor1)/($data->tangnew);
            }
          }

          if (is_array($line_area) || is_object($line_area))
          {
            foreach($line_area as $data){
              //$time=strtotime($data->tanggal);
              //$hari=date("D",$time);
              $time=strtotime($data->tanggal);
              $bulan=date("M y",$time);
              $tangla[] = $bulan;
              $skorla[] = ($data->skor1)/($data->tangnew);
            }
          }

    ?>

</head>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Bulanan</h1>
          </div>

          <!-- Content Row -->


          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Best Area Score</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo round($max_area->score).'<br>' .$max_area->nama_area; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Best Sub Area Score</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo round($min_area->score).'<br>' .$min_area->nama_subarea; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Terpenuhi</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo round($total_satisfied->score); ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo round($total_satisfied->score); ?>%" aria-valuenow="<?php echo round($total_satisfied->score); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Best Karyawan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $karmax->nama; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Input Parameter</h6>
            </div>
            <div class="card-body">
              <form class="user" method="POST" action="<?php echo base_url(); ?>DashboardBulanan">
                <div class="form-row">
                  <div class="col">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Dari</span>
                  </div>
                  <input type="month" class="form-control" name="dari" id="dari" placeholder="" aria-label="Username" aria-describedby="basic-addon1"
                  value="<?php if(isset($dari)){
                    echo $dari;
                  } ?>" required>
                </div>
              </div>
              <div class="col">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Sampai</span>
                  </div>
                  <input type="month" class="form-control" name="sampai" id="sampai" placeholder="" aria-label="Username" aria-describedby="basic-addon1"
                  value="<?php if(isset($sampai)){
                    echo $sampai;
                  } ?>" required>
                </div>
              </div>
            </div>
                <div class="form-row">
                  <div class="col">
              <select class="form-control" name="getarea" id="getarea" required>
                <option value="">Select Area</option>;
              <?php
              foreach($are as $row)
              {
                echo '<option value="'.$row->id_area.'">'.$row->nama_area.'</option>';
              } ?>
              </select>
            </div>

            <div class="col">
              <select class="form-control" name="getsubarea" id="getsubarea" required>
                <option value="">Select Subarea</option>;
              </select>
            </div>
            </div>
            <br>
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
              Submit
            </button>


          </div>
        </div>
        </form>

        </div>

          <hr>


          <!-- Content Row -->



            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Presentase Kebersihan Bulanan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myChart"></canvas>
                    <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'line',



                        // The data for our dataset
                        data: {
                            labels: <?php echo json_encode($tanggal);?>,
                            datasets: [{
                                label: 'Skor Kebersihan (%)',
                                backgroundColor: 'rgb(150, 99, 132)',
                                fill:false,
                                borderColor: 'rgb(255, 99, 132)',
                                data: <?php echo json_encode($skor);?>
                            }]
                        },

                        // Configuration options go here
                        options: {

                          responsive:true,
                          maintainAspectRatio: false,
                          scales: {
                            yAxes: [{
                              ticks: {
                                max: 100,
                                min: 0,
                                stepSize: 10
                              }
                            }]
                          }
                        }
                    });
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <hr>



            <div class="row">
            <!-- Pie Chart Sub Area -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Skor Kebersihan Total Sub Area</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Pilih Area</div>
                      <a class="dropdown-item">
                        </a>
                    </ul>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="PieChart">
                      <script>
                      var ctx = document.getElementById('PieChart').getContext('2d');
                      var chart = new Chart(ctx, {
                          // The type of chart we want to create
                          type: 'pie',

                          // The data for our dataset
                          data: {
                              labels: <?php echo json_encode($subar);?>,
                              datasets: [{
                                  label: 'Skor Kebersihan (%)',
                                  backgroundColor: ["#DEB887",
                                  "#A9A9A9",
                                  "#DC143C",
                                  "#F4A460",
                                  "#2E8B57",
                                  "#1D7A46",
                                  "#CDA776",],
                                  borderColor: [
                                    "#CDA776",
                                    "#989898",
                                    "#CB252B",
                                    "#E39371",
                                    "#1D7A46",
                                    "#F4A460",
                                    "#CDA776",
                                  ],
                                  data: <?php echo json_encode($skorp);?>
                              }]
                          },

                          // Configuration options go here
                          options: {maintainAspectRatio: false,
                            tooltips: {
                              enabled: true,
                              backgroundColor: "rgb(255,255,255)",
                              bodyFontColor: "#858796",
                              borderColor: '#dddfeb',
                              borderWidth: 1,
                              xPadding: 15,
                              yPadding: 15,
                              displayColors: false,
                              caretPadding: 10,
                            },
                          legend: {
                            display: false
                          },
                          cutoutPercentage: 80,
                        }
                      });
                      </script>
                    </canvas>
                  </div>

                  </div>
                </div>
                </div>

                <!--AreaChart Area-->
                <div class="col-xl-4 col-lg-5">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Presentase Kebersihan Bulanan per Area</h6>
                      <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Dropdown Header:</div>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="chart-area">
                        <canvas id="AreaAreaChart"></canvas>
                        <script>
                        var ctx = document.getElementById('AreaAreaChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            // The type of chart we want to create
                            type: 'bar',



                            // The data for our dataset
                            data: {
                                labels: <?php echo json_encode($namasub);?>,
                                datasets: [{
                                    label: 'Skor Kebersihan (%)',
                                    backgroundColor: ["#DEB887",
                                    "#A9A9A9",
                                    "#DC143C",
                                    "#F4A460",
                                    "#2E8B57",
                                    "#1D7A46",
                                    "#CDA776",],
                                    borderColor: [
                                      "#CDA776",
                                      "#989898",
                                      "#CB252B",
                                      "#E39371",
                                      "#1D7A46",
                                      "#F4A460",
                                      "#CDA776",
                                    ],
                                    data: <?php echo json_encode($skornew);?>
                                }]
                            },

                            // Configuration options go here
                            options: {

                              responsive:true,
                              maintainAspectRatio: false,
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    max: 100,
                                    min: 0,
                                    stepSize: 10
                                  }
                                }]
                              }
                            }
                        });
                        </script>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pie Chart Area -->
                <div class="col-xl-4 col-lg-5">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Skor Kebersihan Area</h6>
                      <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Dropdown Header:</div>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="chart-pie pt-4 pb-2">
                        <canvas id="PieChartArea">
                          <script>
                          var ctx = document.getElementById('PieChartArea').getContext('2d');
                          var chart = new Chart(ctx, {
                              // The type of chart we want to create
                              type: 'pie',

                              // The data for our dataset
                              data: {
                                  labels: <?php echo json_encode($areas);?>,
                                  datasets: [{
                                      label: 'Skor Kebersihan (%)',
                                      backgroundColor: ["#DEB887",
                                      "#A9A9A9",
                                      "#DC143C",
                                      "#F4A460",
                                      "#2E8B57",
                                      "#1D7A46",
                                      "#CDA776",],
                                      borderColor: [
                                        "#CDA776",
                                        "#989898",
                                        "#CB252B",
                                        "#E39371",
                                        "#1D7A46",
                                        "#F4A460",
                                        "#CDA776",
                                      ],
                                      data: <?php echo json_encode($skora);?>
                                  }]
                              },

                              // Configuration options go here
                              options: {maintainAspectRatio: false,
                              tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                              },
                              legend: {
                                display: false
                              },
                              cutoutPercentage: 80,
                            }
                          });
                          </script>
                        </canvas>
                      </div>
                    </div>
                  </div>
                </div>



              <!--row div-->
              </div>


          <div class="row">
            <!--AreaChart Sub Area-->
            <div class="col-xl-6 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Presentase Kebersihan Bulanan Sub Area <?php if (isset($subarea)){echo $subarea;} ?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="SubAreaLine"></canvas>
                    <script>
                    var ctx = document.getElementById('SubAreaLine').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'line',



                        // The data for our dataset
                        data: {
                            labels: <?php echo json_encode($tangls);?>,
                            datasets: [{
                                label: 'Skor Kebersihan (%)',
                                backgroundColor: 'rgb(150, 99, 132)',
                                fill:false,
                                borderColor: 'rgb(255, 99, 132)',
                                data: <?php echo json_encode($skorls);?>
                            }]
                        },

                        // Configuration options go here
                        options: {

                          responsive:true,
                          maintainAspectRatio: false,
                          scales: {
                            yAxes: [{
                              ticks: {
                                max: 100,
                                min: 0,
                                stepSize: 10
                              }
                            }]
                          }
                        }
                    });
                    </script>
                  </div>
                </div>
              </div>
            </div>

            <!--AreaChart Sub Area-->
            <div class="col-xl-6 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Presentase Kebersihan Bulanan Area <?php if (isset($area)){echo $area;} ?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="SubAreaChart"></canvas>
                    <script>
                    var ctx = document.getElementById('SubAreaChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'line',



                        // The data for our dataset
                        data: {
                            labels: <?php echo json_encode($tangla);?>,
                            datasets: [{
                                label: 'Skor Kebersihan (%)',
                                backgroundColor: 'rgb(150, 99, 132)',
                                fill:false,
                                borderColor: 'rgb(255, 99, 132)',
                                data: <?php echo json_encode($skorla);?>
                            }]
                        },

                        // Configuration options go here
                        options: {

                          responsive:true,
                          maintainAspectRatio: false,
                          scales: {
                            yAxes: [{
                              ticks: {
                                max: 100,
                                min: 0,
                                stepSize: 10
                              }
                            }]
                          }
                        }
                    });
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <hr>

          <div class="row">
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Peringkat Attendant</div><br>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach ($karyawan as $key=>$value){
                      echo ($key+1).'. '.$value->nama.'

                      <div class="progress" style="height: 20px;">
    <div class="progress-bar" role="progressbar" style="width: '.round($value->skor1/$value->kar).'%" aria-valuenow="'.round($value->skor1/$value->kar).'" aria-valuemin="0" aria-valuemax="100">'.round($value->skor1/$value->kar).'%</div>
                      </div><br>';
                    } ?></div>
                    <div class="col">

                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->


</html>
