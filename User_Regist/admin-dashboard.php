<?php
    require_once 'controllers/authController.php'; 
    $adminCurrentPage = 'admin_dashboard';
    /* $akun = query("SELECT * FROM user"); */
?>
<!doctype html>
<html lang="id">
<head>
  	<title>Admin - Dashboard</title>
    <?php
      include 'header-admin.php';
    ?>
    <!--Page Content-->
    <div id="content" class="p-4 p-md-5 pt-5">
      <main class="c-main">
        <div class="container-fluid">
          <div class="fade-in">
            <div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                  <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                      <div class="text-value-lg">1233</div>
                      <div>Isi apa</div>
                    </div>
                    <div class="btn-group">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="c-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                      </svg>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                  </div>
                  <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart1" height="140" style="display: block; height: 70px; width: 184px;" width="368"></canvas>
                  <div id="card-chart1-tooltip" class="c-chartjs-tooltip top" style="opacity: 0; left: 143.26px; top: 123.709px;"><div class="c-tooltip-header"><div class="c-tooltip-header-item">June</div></div><div class="c-tooltip-body"><div class="c-tooltip-body-item"><span class="c-tooltip-body-item-color" style="background-color: rgb(50, 31, 219);"></span><span class="c-tooltip-body-item-label">My First dataset</span><span class="c-tooltip-body-item-value">55</span></div></div></div></div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-info">
                  <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                      <div class="text-value-lg">1234</div>
                      <div>Isi apa</div>
                    </div>
                    <div class="btn-group">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="c-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                      </svg>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                  </div>
                  <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas class="chart chartjs-render-monitor" id="card-chart1" height="140" style="display: block; height: 70px; width: 184px;" width="368"></canvas>
                  <div id="card-chart1-tooltip" class="c-chartjs-tooltip top" style="opacity: 0; left: 143.26px; top: 123.709px;"><div class="c-tooltip-header"><div class="c-tooltip-header-item">June</div></div><div class="c-tooltip-body"><div class="c-tooltip-body-item"><span class="c-tooltip-body-item-color" style="background-color: rgb(50, 31, 219);"></span><span class="c-tooltip-body-item-label">My First dataset</span><span class="c-tooltip-body-item-value">55</span></div></div></div></div>
                </div>
              </div>

              



            </div>
            <div id="chart" style="height: max-content;"></div>     
          </div>
        </div>
        </div>
             
                         
      </main>
  </div> 
  <!--end of page content-->

<script src="../src/js/adminScript.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
  new Morris.Bar({
  element: 'chart',
  data: [
    { entity: 'User', value:  5 },
    { entity: 'Admin', value:  2 },
    { entity: 'Karya', value:  12 },
    { entity: 'Review', value:  8 }
  ],
  xkey: 'entity',
  ykeys: ['value'],
  labels: ['Value'],

  hidehover:false,

  resize: true,
  barColors: ['#2F5AE2']
});
</script>
</body>
</html>