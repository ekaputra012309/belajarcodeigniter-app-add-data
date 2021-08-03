<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<?=site_url('dashboard') ?>"><h4 style="color: #0BD70B;"><i class="fa fa-leaf"></i> GO GREEN</h4></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
        >
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a href="#" class="btn btn-link" data-container="body" data-html="true" data-toggle="popover" title="Change log" data-placement="bottom" data-content="<small>
                            <i class='fa fa-leaf'></i> GO GREEN v1.3
                            <ul>
                                <li>Add upload image.</li>
                                <li>Add avatar image.</li>
                            </ul>
                            <div class='dropdown-divider'></div>
                            <i class='fa fa-leaf'></i> GO GREEN v1.2
                            <ul>
                                <li>New template for admin.</li>
                                <li>Add report pdf.</li>
                                <li>Add report excel.</li>
                            </ul>
                            <div class='dropdown-divider'></div>
                            <i class='fa fa-leaf'></i> GO GREEN v1.0
                            <ul>
                                <li>Add CRUD for member and user.</li>
                            </ul>
                        </small>"><i class="fas fa-exclamation-circle"></i> </a>                
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if ($this->session->userdata('img')=='') {
                        echo '<i class="fas fa-user fa-fw"></i>';
                    } else {
                        echo '<img src="./ass/img/'.$this->session->userdata('img').'" style="width: 30px;" class="rounded-circle">';
                    }
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#"><?=$this->session->userdata('nama'); ?></a>
                    <a class="dropdown-item" href="#">sebagai <?=$this->session->userdata('level'); ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=site_url('keluar') ?>">Logout</a>
                </div>                
            </li>            
        </ul>
    </nav>