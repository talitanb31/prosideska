<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($this->uri->segment(1)) ?></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?= site_url("welcome/index") ?>">Dashboard</a></li>
                </ol>
            </nav>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-5">
                    <form action="<?= site_url('syaratsurat/update/') ?><?= $data['id'] ?>" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Jenis</label>
                                    <select id="jenis_surat" name="jenis_surat" class="form-control <?= form_error('jenis_surat') != null ? 'is-invalid' : ''; ?>" required>
                                        <option value="-">Pilih Jenis Surat</option>
                                        <?php foreach ($jenis as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $item['id'] == $data['id_jenis_surat'] ? 'selected' : '' ?>><?= $item['jenis'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('jenis_surat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Syarat</label>
                                    <textarea id="summernote" name="syarat_surat" class="form-control <?= form_error('syarat_surat') != null ? 'is-invalid' : ''; ?>" rows="10" placeholder="Deskripsi Berita....." cols="50" rows="10" style="white-space: pre-wrap"><?= $data['syarat'] ?></textarea>
                                    <?php echo form_error('syarat_surat', '<small class="text-danger">', '</small>'); ?>
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