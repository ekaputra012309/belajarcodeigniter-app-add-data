<main>
    <div class="container-fluid">
        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data User with Avatar</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><button class="btn btn-outline-success" data-toggle="modal" data-target="#modalform"><i class="fas fa-plus-circle"></i> Add Data</button> <span class="float-right"><i class="fas fa-table mr-1"></i>Tabel User</span></div>

            <!-- modal  -->
            <div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulmodal">Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="<?=site_url('dashboard/simpan/user2') ?>" enctype="multipart/form-data">
                            <div class="modal-body" id="isimodal">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_m" name="id_m" value="0" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Pilih avatar : </label>
                                    <div class="row">
                                        <?php for ($i=1; $i <= 16 ; $i++) { 
                                            echo '<div class="col-md-2 text-center"><input type="radio" name="fileimg" value="256_'.$i.'.png" required><img src="'. site_url('ass/avatar/256_'.$i).'.png" width="50px"></div>';
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required minlength="5" maxlength="15">
                                </div>
                                <div class="form-group">
                                    <select id="level" name="level" class="form-control" required>
                                        <option value="">Pilih Level</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
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
                                <th>Foto</th>
                                <th>Nama User</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $baris) { ?>
                                <tr>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-link" onclick="edit(<?=$baris['id']?>)"><i class="fa fa-edit text-dark"></i></button>
                                            <button type="button" class="btn btn-link" onclick="hapus(<?=$baris['id']?>)" <?php if($baris['username']==$this->session->userdata('username')) {echo 'disabled';} ?>><i class="fa fa-trash text-danger"></i></button>
                                        </div>
                                    </td>
                                    <td><img src="<?=site_url('ass/img/').$baris['img']?>" width="60px"></td>
                                    <td><?=$baris['nama']?></td>
                                    <td><?=$baris['level']?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function resetform() {
        $('input[name=id_m]').val('0');
        $('input[name=nama]').val('');
        $('input[name=username]').val('');
        $('input[name=password]').val('');
        $('[name=level]').val('');
        $('input[name=fileimg]').prop('checked',false);
    }

    function tutupmodal() {
        $('#modalform').modal('hide');
        resetform();
    }

    function edit(idform) {
        $('#modalform').modal('show');
        $('#password').prop('required', false);
        tabel = 'user';
        $.post('<?=site_url('dashboard/edit/')?>'+tabel, {id: idform}, function(data) {
            dt = JSON.parse(data);
            $('#id_m').val(dt[0].id);
            $('#nama').val(dt[0].nama);
            $('#username').val(dt[0].username);
            // $('#password').val(dt[0].password);
            $("input[name=fileimg][value='"+dt[0].img+"']").prop("checked",true);
            $('#level').val(dt[0].level);
        });
    }

    function hapus(idform) {
        if (confirm('Yakin hapus data ini !!')==true) {
            tabel = 'user';
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
</script>