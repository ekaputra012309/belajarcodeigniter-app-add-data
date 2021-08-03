<main>
    <div class="container-fluid">
        <h1 class="mt-4">Laporan Member</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Laporan Member</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <form class="form-inline" action="<?=site_url('dashboard/lappdf')?>" method="post" target="_blank">
                    <input type="date" class="form-control col-md-4" id="tglin" name="tglin" required>
                    <button class="btn form-control" disabled>s/d</button>
                    <input type="date" class="form-control col-md-4" id="tglout" name="tglout" required>
                    <button class="btn form-control" disabled></button>
                    <input type="submit" class="form-control btn btn-outline-success col-md-2" value="Cari">
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Tanggal</th>
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
                                    <td><a class="btn btn-link" target="_blank" href="<?=site_url('dashboard/lappdf/').$baris['id_m'] ?>"><i class="fas fa-file-pdf text-danger"></i></a></td>
                                    <td width="90px"><?=$baris['tgl']?></td>
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