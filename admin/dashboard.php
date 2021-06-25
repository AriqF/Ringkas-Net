<?php
    require_once '../Authentication/controllers/authController.php'; 
    $adminCurrentPage = 'admin_dashboard';

    $query =mysqli_query($conn, "SELECT * FROM blog");
    $admin =mysqli_query($conn, "SELECT * FROM user where usertype = 0");
    $user =mysqli_query($conn, "SELECT * FROM user where usertype = 1");
    $rating =mysqli_query($conn, "SELECT * FROM rating");

    $rating1 = mysqli_query($conn, "SELECT rating FROM rating WHERE rating = 1");
    $totalR1 = mysqli_num_rows($rating1);

    $rating2 = mysqli_query($conn, "SELECT rating FROM rating WHERE rating = 2");
    $totalR2 = mysqli_num_rows($rating2);

    $rating3 = mysqli_query($conn, "SELECT rating FROM rating WHERE rating = 3");
    $totalR3 = mysqli_num_rows($rating3);

    $rating4 = mysqli_query($conn, "SELECT rating FROM rating WHERE rating = 4");
    $totalR4 = mysqli_num_rows($rating4);

    $rating5 = mysqli_query($conn, "SELECT rating FROM rating WHERE rating = 5");
    $totalR5 = mysqli_num_rows($rating5);

    $queryUV = mysqli_query($conn, "SELECT username FROM user WHERE verified = 1  AND usertype = '1'");
    $totalVerUs = mysqli_num_rows($queryUV);

    $queryUNV = mysqli_query($conn, "SELECT username FROM user WHERE verified <> 1 AND usertype = '1'");
    $totalNVerUs = mysqli_num_rows($queryUNV);

    //menghitung total views
    while ($data =mysqli_fetch_array($query)){
    // looping atribut jumlah 
      $jumlah[]=$data['views'];
    }
    //total
    $total = array_sum($jumlah); 

    //jumlah blog
    $jumlah_blog = mysqli_num_rows($query);
    $jumlah_admin = mysqli_num_rows($admin);
    $jumlah_user = mysqli_num_rows($user);
    $jumlah_review = mysqli_num_rows($rating);
    
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

        <div class="shadow p-3 mb-5 bg-white rounded">
          <div class="fade-in">
              <div class="row d-flex">                        
                <div class="col-6 d-flex">
                    <div id="reviewSumChart" style="height: 280px"></div>              
                </div>
                <div class="col-6 d-flex">
                    <div id="verifiedUserChart" style="height: 280px"></div>           
                </div>
              </div>
            <div id="chart" style="height: max-content;"></div>     
          </div>
        </div>
    </div>
             
                         
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
    { entity: 'User', value:  <?php echo "$jumlah_user";?> },
    { entity: 'Admin', value: <?php echo "$jumlah_admin";?>},
    { entity: 'Blog', value:  <?php echo "$jumlah_blog";?> },
    { entity: 'Review', value: <?php echo "$jumlah_review";?> }
  ],
  xkey: 'entity',
  ykeys: ['value'],
  labels: ['Value'],

  hidehover:false,

  resize: true,
  barColors: ['#2F5AE2']
});

new Morris.Donut({
  element: 'reviewSumChart',
  data: [
    { label: '1 Star Review', value: <?php echo $totalR1; ?>},
    { label: '2 Star Review', value:  <?php echo $totalR2; ?>}, 
    { label: '3 Star Review', value: <?php echo $totalR3; ?>},
    { label: '4 Star Review', value:  <?php echo $totalR4; ?>}, 
    { label: '5 Star Review', value: <?php echo $totalR5; ?>}
  ],
  backgroundColor: '#ccc',
  labelColor: '#393B38',
  colors: [
    '#FD3200',
    '#DA7109',
    '#EF6608',
    '#FD8D07',
    '#F5A922',
  ],
  resize: true
});

new Morris.Donut({
  element: 'verifiedUserChart',
  data: [
    { label: 'Verified-User', value: <?php echo $totalVerUs; ?>},
    { label: 'Unverified-User', value:  <?php echo $totalNVerUs; ?>}, // ubah <.?php echo $totalNVerUs; ?> ke angka jika ingin melihat demo chart dlm keadaan label ini berisi nilai
  ],
  labelColor: '#393B38',
  resize: true
});
</script>
</body>
</html>