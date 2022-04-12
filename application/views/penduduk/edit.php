<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("welcome/index")?>">Dashboard</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("penduduk/index")?>"><?=ucwords($this->uri->segment(1))?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=ucwords($this->uri->segment(2))?></li>
                </ol>
            </nav>
         
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-5">
                    <form action="<?=base_url('penduduk/update/')?><?=$data['nik']?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="number" name="" class="form-control" placeholder="Masukkan NIK" id="" value="<?= $data['nik'] ?>" disabled required>
                                    <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control <?=form_error('nama') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan nama lengkap" id="" value="<?= $data['nama'] ?>" required>
                                    <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label for="">Agama</label>
                                        <select name="agama" id="agama" class="form-control <?=form_error('agama') != null ? 'is-invalid' : ''; ?>" required>
                                            <option value="0">Pilih Agama</option>
                                            <option value="Islam" <?= $data['agama'] == 'Islam' ? 'selected' : '' ?> >Islam</option>
                                            <option value="Kristen" <?= $data['agama'] == 'Kristen' ? 'selected' : '' ?> >Kristen</option>
                                            <option value="Katolik" <?= $data['agama'] == 'Katolik' ? 'selected' : '' ?> >Katolik</option>
                                            <option value="Budha" <?= $data['agama'] == 'Budha' ? 'selected' : '' ?> >Budha</option>
                                            <option value="Hindu" <?= $data['agama'] == 'Hindu' ? 'selected' : '' ?> >Hindu</option>
                                            <option value="Konghuchu" <?= $data['agama'] == 'Konghuchu' ? 'selected' : '' ?> >Konghuchu</option>
                                        </select>
                                        <?php echo form_error('agama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control <?=form_error('tempat_lahir') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan tempat lahir lengkap" id="" value="<?= $data['nama'] ?>" required>
                                    <?php echo form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control <?=form_error('tanggal_lahir') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan tanggal lahir" id="tgl_lahir" value="<?= $data['nama'] ?>">
                                    <?php echo form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label><br>
                                    <input type="radio" name="jenis_kelamin" class="<?=form_error('nama') != null ? 'is-invalid' : ''; ?>" id="l" value="Laki-laki"  <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?> > <label for="l">Laki-laki</label>&nbsp;
                                    <input type="radio" name="jenis_kelamin" class="<?=form_error('nama') != null ? 'is-invalid' : ''; ?>" id="p" value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>> <label for="p">Perempuan</label>
                                    <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label for="">Gol. Darah</label>
                                        <select name="gol_darah" id="gol_darah" class="form-control <?=form_error('gol_darah') != null ? 'is-invalid' : ''; ?>" required>
                                            <option value="0" <?= $data['gol_darah'] == 'O' ? 'selected' : '' ?>>Pilih Gol. Darah</option>
                                            <option value="A" <?= $data['gol_darah'] == 'A' ? 'selected' : '' ?>>A</option>
                                            <option value="AB" <?= $data['gol_darah'] == 'AB' ? 'selected' : '' ?>>AB</option>
                                            <option value="O" <?= $data['gol_darah'] == 'O' ? 'selected' : '' ?>>O</option>
                                            <option value="-" <?= $data['gol_darah'] == '-' ? 'selected' : '' ?>>Tidak diketahui</option>
                                        </select>
                                        <?php echo form_error('gol_darah', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Warga Negara</label>
                                    <select id="warga_negara" name="warga_negara" class="form-control <?=form_error('warga_negara') != null ? 'is-invalid' : ''; ?>" required>
                                        <option value="-">Pilih Negara</option>
                                        <?php foreach($negara as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $data['id_negara'] == $item['id'] ? 'selected' : '' ?> ><?= $item['country_name'] ?></option>
                                        <?php } ?>
                                        </select>
                                    <?php echo form_error('warga_negara', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label for="">Pilih Pendidikan</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control <?=form_error('pendidikan') != null ? 'is-invalid' : ''; ?>" required>
                                            <option value="0">Pilih Pendidikan</option>
                                            <?php foreach($pendidikan as $item) { ?>
                                                <option value="<?= $item['id'] ?>" <?= $data['id_pendidikan'] == $item['id'] ? 'selected' : '' ?> ><?= $item['pendidikan'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php echo form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label for="">Pilih Pekerjaan</label>
                                        <select name="pekerjaan" id="pekerjaan" class="form-control <?=form_error('pekerjaan') != null ? 'is-invalid' : ''; ?>" required>
                                            <option value="0">Pilih Pekerjaan</option>
                                            <?php foreach($pekerjaan as $item) { ?>
                                                <option value="<?= $item['id'] ?>" <?= $data['id_pekerjaan'] == $item['id'] ? 'selected' : '' ?> ><?= $item['pekerjaan'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php echo form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label for="">Status Pernikahan</label>
                                        <select name="status_pernikahan" id="status_pernikahan" class="form-control <?=form_error('status_pernikahan') != null ? 'is-invalid' : ''; ?>" required>
                                            <option value="0">Pilih Status Pernikahan</option>
                                            <option value="BELUM KAWIN" <?= $data['status_pernikahan'] == 'BELUM KAWIN' ? 'selected' : '' ?> >BELUM KAWIN</option>
                                            <option value="KAWIN <?= $data['status_pernikahan'] == 'KAWIN' ? 'selected' : '' ?> ">KAWIN</option>
                                            <option value="CERAI HIDUP" <?= $data['status_pernikahan'] == 'CERAI HIDUP' ? 'selected' : '' ?> >CERAI HIDUP</option>
                                            <option value="CERAI MATI" <?= $data['status_pernikahan'] == 'CERAI MATI' ? 'selected' : '' ?> >CERAI MATI</option>
                                        </select>
                                        <?php echo form_error('status_pernikahan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control <?=form_error('alamat') != null ? 'is-invalid' : ''; ?>" required><?= $data['alamat'] ?></textarea>
                                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="reset" class="btn btn-danger">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>