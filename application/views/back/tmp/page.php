<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="<?=site_url('ass/') ?>img/leaf_256.ico">
    <title>Dashboard</title>
    <link href="<?=site_url('')?>ass/css/styles.css" rel="stylesheet" />
    <link href="<?=site_url('')?>ass/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="<?=site_url('')?>ass/js/fontawesome.js" crossorigin="anonymous"></script>
    <script src="<?=site_url('')?>ass/js/jquery.js" crossorigin="anonymous"></script>
    <script src="<?=site_url('')?>ass/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    
    <!-- top navbar -->
    <?php include 'topnav.php'; ?>

    <div id="layoutSidenav">
        
        <!-- side nav -->
        <?php include 'sidenav.php'; ?>

        <div id="layoutSidenav_content">
            
            <!-- halaman isi -->
            <?php $this->load->view($home); ?>

            <!-- footer -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; <a target="_blank" href="//www.gogreen.com">GOGREEN</a> <?php $t = date('Y'); if($t>'2019') {echo '2019-'.$t;} else {echo $t;} ?></div>
                        <div>
                            <span class="text-muted"><i class="fa fa-leaf"></i> GO GREEN v1.3</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    
    <script src="<?=site_url('')?>ass/js/scripts.js"></script>
    <!-- <script src="<?=site_url('')?>ass/js/Chart.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="<?=site_url('')?>ass/assets/demo/chart-area-demo.js"></script> -->
    <!-- <script src="<?=site_url('')?>ass/assets/demo/chart-bar-demo.js"></script> -->
    <script src="<?=site_url('')?>ass/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<?=site_url('')?>ass/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="<?=site_url('')?>ass/assets/demo/datatables-demo.js"></script>

    <script>
        $(function () {
          $('[data-toggle="popover"]').popover()
      })
  </script>
</body>
</html>
