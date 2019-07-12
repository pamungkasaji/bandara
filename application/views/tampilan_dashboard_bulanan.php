
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
          $hari=date("M",$time);
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
              $bulan=date("M",$time);
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
              $bulan=date("M",$time);
              $tangla[] = $bulan;
              $skorla[] = ($data->skor1)/($data->tangnew);
            }
          }
          
          $id_k = $this->uri->segment('3');
    ?>

</head>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->



            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Presentase Kebersihan Harian</h6>
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
                      <h6 class="m-0 font-weight-bold text-primary">Presentase Kebersihan Harian per Area</h6>
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
                  <h6 class="m-0 font-weight-bold text-primary">Presentase Kebersihan Harian Sub Area <?php if (isset($subarea)){echo $subarea;} ?></h6>
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
                  <h6 class="m-0 font-weight-bold text-primary">Presentase Kebersihan Harian Area <?php if (isset($area)){echo $area;} ?></h6>
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


          <form class="user" method="POST" action="<?php echo base_url(); ?>DashboardBulanan">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Masukkan jumlah hari</span>
              </div>
              <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
          <div class="input-group input-group-sm mb-3">

          <select class="form-control" name="getarea" id="getarea">
            <option value="">Select Area</option>;
          <?php
          foreach($are as $row)
          {
            echo '<option value="'.$row->id_area.'">'.$row->nama_area.'</option>';
          } ?>
          </select>

          <select class="form-control" name="getsubarea" id="getsubarea">
            <option value="">Select Subarea</option>;
          </select>

          <input type="submit" class="btn-primary" value="ok" >
        </div>
          </form>

          <hr>


          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->


</html>