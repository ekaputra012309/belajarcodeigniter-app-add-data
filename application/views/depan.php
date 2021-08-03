<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?=site_url('ass/') ?>img/leaf_256.ico">
  
  <title>GO GREEN</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=site_url('ass/')?>css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=site_url('ass/')?>css/scrolling-nav.css" rel="stylesheet">

  <link href="<?=site_url('ass/')?>css/font-awesome.min.css" rel="stylesheet">

  <style>
    #headertop {
      background: url("ass/img/green.jpg") no-repeat;
      background-size: cover;
      background-clip: border-box;
      /*opacity: 0.90;*/
      /*filter: alpha(opacity=90);*/
    }

    #gotop {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      cursor: pointer;
    }
  </style>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="<?=site_url('') ?>"><h4 style="color: #0BD70B;"><i class="fa fa-leaf"></i> GO GREEN</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=site_url('depan/log2') ?>">Sigh in</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="text-white" id="headertop">
    <div class="container text-center">
      <h1>Selamat Datang di GO GREEN</h1>
      <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
      <div class="row justify-content-center align-items-center">
        <div class="mx-lg-auto">

          <div class="pesan alert alert-danger container" style="display: none; width: 90%;"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="msg"></span></div>
          <!-- <form class="form-inline container" method="post" id="formlogin">            
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text" style="color: #0BD70B;"><i class="fa fa-user"></i></div>
              </div>
              <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text" style="color: #0BD70B;"><i class="fa fa-key"></i></div>
              </div>
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn mb-2" style="background-color: #0BD70B; color: #fff"><b>Login</b></button>
          </form> -->

        </div>
      </div>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Tentang Perusahaan</h2>
          <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
          <ul>
            <li>Clickable nav links that smooth scroll to page sections</li>
            <li>Responsive behavior when clicking nav links perfect for a one page website</li>
            <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
            <li>Minimal custom CSS so you are free to explore your own unique design options</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Layanan Kami</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Kontak Kami</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; GO GREEN <?=date('Y')?> <span id="gotop" class="float-right"><a class="js-scroll-trigger btn btn-success" href="#page-top"><i class="fa fa-angle-double-up"></i></a></span></p>

    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=site_url('ass/')?>js/jquery.min.js"></script>
  <script src="<?=site_url('ass/')?>js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?=site_url('ass/')?>js/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="<?=site_url('ass/')?>js/scrolling-nav.js"></script>

  <script>
    $(document).ready(function() {

      /*ketika form login di submit*/
      $('#formlogin').submit(function(event) {
        a = $('input[name="username"]').val();
        b = $('input[name="password"]').val();

        $.ajax({
          type: "POST",
          url:  "<?=base_url(); ?>" + "depan/login",
          data: {username: a, password: b},
          cache: false,
          success: function(result){
            if(result!=0){
              window.location.replace(result);
            }
            else
              jQuery("div.pesan").show();
              jQuery("span.msg").html("Username atau password salah !");
              $('div.pesan').delay(1500).fadeOut(500);
              // alert('Username atau password salah !');
              $('#formlogin')[0].reset();
              $('input[name="username"]').trigger('focus');
          }
        });
        return false;
      });

      /*membuat tombol kembali ke atas*/
      mybutton = document.getElementById("gotop");

      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
      }

    });
  </script>

</body>

</html>
