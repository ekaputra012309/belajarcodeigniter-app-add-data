<main>
    <div class="container-fluid">
        <h1 class="mt-4">Member</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Member</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><button class="btn btn-outline-success" data-toggle="modal" data-target="#modalform"><i class="fas fa-plus-circle"></i> Add Data</button> <span class="float-right"><i class="fas fa-table mr-1"></i>Tabel Member</span></div>

            <!-- modal  -->
            <div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="<?=site_url('dashboard/simpan/member') ?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_m" name="id_m" value="0" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Member" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label> <br>
                                    <input type="radio" id="jkl" name="jk" value="Laki-laki" required> Laki-laki
                                    <input type="radio" id="jkp" name="jk" value="Perempuan" required> Perempuan
                                </div>
                                <div class="form-group">
                                    <select id="agama" name="agama" class="form-control" required>
                                        <option value="">Pilih Agama</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea id="bio" name="bio" class="form-control" rows="3" placeholder="Biografi Member" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success simpan" ><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-secondary" onclick="tutupmodal()">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Opsi</th>
                                <th>Nama Member</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($member as $baris) { ?>
                                <tr>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-link" onclick="lihat(<?=$baris['id_m']?>)"><i class="fa fa-eye text-info"></i></button>
                                            <button type="button" class="btn btn-link" onclick="edit(<?=$baris['id_m']?>)"><i class="fa fa-edit text-dark"></i></button>
                                            <button type="button" class="btn btn-link" onclick="hapus(<?=$baris['id_m']?>)"><i class="fa fa-trash text-danger"></i></button>
                                        </div>
                                    </td>
                                    <td><?=$baris['nama']?></td>
                                    <td><?=$baris['jk']?></td>
                                    <td>
                                        <?php $lahir    =new DateTime($baris['tgl_lahir']);
                                        $today        =new DateTime();
                                        $umur = $today->diff($lahir);
                                        echo $umur->y; echo " Tahun";
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal lihat data -->
<div class="modal fade" id="modallihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body" id="isimodalbody">
    <div class="text-center"><i class="fas fa-sync fa-spin fa-2x"></i></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div>

<script>
    function resetform() {
        $('input[name=id_m]').val('0');
        $('input[name=nama]').val('');
        $('input[name=tgl_lahir]').val('');
        $("input[name=jk]").removeAttr("checked");
        $('[name=agama]').val('');
        $('textarea[name=bio]').html('');
    }

    function tutupmodal() {
        $('#modalform').modal('hide');
        resetform();
    }

    function edit(idform) {
        $('#modalform').modal('show');
        tabel = 'member';
        $.post('<?=site_url('dashboard/edit/')?>'+tabel, {id: idform}, function(data) {
            dt = JSON.parse(data);
            $('#id_m').val(dt[0].id_m);
            $('#nama').val(dt[0].nama);
            $('#tgl_lahir').val(dt[0].tgl_lahir);
            $("input[name=jk][value='"+dt[0].jk+"']").prop("checked",true);
            $('#agama').val(dt[0].agama);
            $('#bio').html(dt[0].bio);
        });
    }

    function hapus(idform) {
        if (confirm('Yakin hapus data ini !!')==true) {
            tabel = 'member';
            $.ajax({
                type : "POST",
                url  : "<?=site_url('dashboard/hapus/')?>"+tabel,
                dataType : "JSON",
                data : {
                    id: idform,
                },
                success: function(data){
                    alert('Berhasil hapus data.');
                    window.location.reload();
                }
            });
        } else { return false;}
    }

    function lihat(idform) {
        tabel = 'member';
        $.post('<?=site_url('dashboard/edit/')?>'+tabel, {id: idform}, function(data) {
            dt = JSON.parse(data);
            html = '';
            html += '<table class="table table-striped">'+
            '<tr><td>Nama</td><td>: </td><td>'+dt[0].nama+'</td></tr>'+
            '<tr><td>Jenis Kelamin</td><td>: </td><td>'+dt[0].jk+'</td></tr>'+
            '<tr><td>Tanggal Lahir</td><td>: </td><td>'+dt[0].tgl_lahir+'</td></tr>'+
            '<tr><td>Agama</td><td>: </td><td>'+dt[0].agama+'</td></tr>'+
            '<tr><td>Bio</td><td>: </td><td>'+dt[0].bio+'</td></tr>'+
            '</table>';

            $('#isimodalbody').html(html);
        });
        $('#modallihat').modal('show');
    }
</script>