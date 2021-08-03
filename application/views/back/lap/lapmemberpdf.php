<link rel="icon" href="<?=site_url('ass/') ?>img/leaf_256.ico">
<title>Laporan <?=$tglin?> s/d <?=$tglout?></title>
<!-- head kop -->
<table border="0" width="100%" style="border-collapse: collapse; border-bottom: solid 2px ;">
  <tr>
    <td width="50px" style="text-align: center;"><img src="./ass/img/leaf.png" width="50px"></td>
    <td rowspan="2" style="text-align: center;">
      <h3 style="text-transform: uppercase;">pt gogreen</h3>
      <p style="text-align: center;">Jl. Dr. KRT Radjiman Widyodiningrat No.69, RT.11/RW.4, Rw. Terate, <br> Kec. Cakung, Kota Jakarta Timur, <br> Jakarta 13920</p>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

<!-- tabel data -->
<h4>Laporan dari tanggal <?=$tglin?> s/d <?=$tglout?>.</h4>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr align="center">
    <th width="30px">No</th>
    <th>Tanggal</th>
    <th>Nama Member</th>
    <th>Jenis Kelamin</th>
    <th>Agama</th>
    <th>Umur</th>
    <th>Bio</th>
  </tr>
  <?php $no=1; foreach ($member as $baris) { ?>
    <tr align="center">
      <td><?=$no++?></td>
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
</table>

<p align="right"><?=date('l, F Y') ?> <br> <br> <br><?=$this->session->userdata('nama'); ?></p>