<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="<?=site_url('ass/') ?>img/leaf_256.ico">
        <title>GOGREEN Login</title>
        <link href="<?=site_url('')?>ass/css/styles.css" rel="stylesheet" />
        <script src="<?=site_url('')?>ass/js/fontawesome.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4" style="color: #0BD70B;"><i class="fa fa-leaf"></i> GO GREEN</h3></div>
                                    <div class="card-body">
                                        <?php if ($this->session->flashdata('msg')) {?>
                                          <div class="pesan alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><?=$this->session->flashdata('msg') ?></div>
                                      <?php } ?>
                                        <form method="post" action="<?=site_url('depan/login') ?>">
                                            <div class="form-group"><label class="small mb-1" for="username">Username</label><input class="form-control py-4" name="username" type="text" placeholder="Enter username" required autofocus /></div>
                                            <div class="form-group"><label class="small mb-1" for="password">Password</label><input class="form-control py-4" name="password" type="password" placeholder="Enter password" required /></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button class="btn btn-success" type="submit">Login</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; GOGREEN <?php $t = date('Y'); if($t>'2019') {echo '2019-'.$t;} else {echo $t;} ?></div>
                            <div>
                                <span class="text-muted"><i class="fa fa-leaf"></i> GO GREEN v1.2</span>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?=site_url('')?>ass/js/jquery.js" crossorigin="anonymous"></script>
        <script src="<?=site_url('')?>ass/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?=site_url('')?>ass/js/scripts.js"></script>
    </body>
</html>
