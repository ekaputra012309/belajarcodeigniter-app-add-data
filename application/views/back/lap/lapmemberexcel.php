<h4>Data Member : <?=date('d M Y')?></h4>
<table border="1" cellpadding="8">
<tr>
  <th>No</th>
  <th>Nama Lengkap</th>
  <th>Tanggal Lahir</th>
  <th>Jenis Kelamin</th>
  <th>Agama</th>
  <th>Bio</th>  
</tr>
<?php $no=1;
if( ! empty($member)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($member as $row){ // Lakukan looping pada variabel siswa dari controller
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$row['nama']."</td>";
    echo "<td>".$row['tgl_lahir']."</td>";
    echo "<td>".$row['jk']."</td>";
    echo "<td>".$row['agama']."</td>";
    echo "<td>".$row['bio']."</td>";
    echo "</tr>";
  $no++; }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>