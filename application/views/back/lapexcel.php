<main>
    <div class="container-fluid">
        <h1 class="mt-4">Laporan Member</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Laporan Member</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><a href="<?=site_url('dashboard/Lapexcel')?>" class="btn btn-outline-success"><i class="fas fa-file-excel"></i> Export Excel</a> <span class="float-right"><i class="fas fa-table mr-1"></i>Data Member</span></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Member</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Umur</th>
                                <th>Bio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($member as $baris) { ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$baris['nama']?></td>
                                    <td><?=$baris['jk']?></td>
                                    <td><?=$baris['agama']?></td>
                                    <td>
                                        <?php $lahir    =new DateTime($baris['tgl_lahir']);
                                        $today        =new DateTime();
                                        $umur = $today->diff($lahir);
                                        echo $umur->y; echo " Tahun";
                                        ?>
                                    </td>
                                    <td><?=$baris['bio']?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>