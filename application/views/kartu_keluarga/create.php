<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page"><a href="<?= site_url("welcome/index") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?= site_url("kartukeluarga/index") ?>"><?= ucwords($this->uri->segment(1)) ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($this->uri->segment(2)) ?></li>
                </ol>
            </nav>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-5">
                    <form action="<?= base_url('kartukeluarga/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control <?= form_error('nik') != null ? 'is-invalid' : ''; ?>" required></textarea>
                                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Dusun</label>
                                    <textarea name="dusun" id="dusun" cols="30" rows="5" class="form-control <?= form_error('nik') != null ? 'is-invalid' : ''; ?>" required></textarea>
                                    <?php echo form_error('dusun', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">RT</label>
                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" name="rt" class="form-control <?= form_error('rt') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan no RT" id="" required>
                                    <?php echo form_error('rt', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">RW</label>
                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" name="rw" class="form-control <?= form_error('rw') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan no RW" id="" required>
                                    <?php echo form_error('rw', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Penghasilan</label>
                                    <select class="form-control" name="ekonomi" id="ekonomi" required>
                                        <option selected disabled>Pilih penghasilan</option>
                                        <option value="< Rp. 500.000">
                                            < Rp. 500.000</option>
                                        <option value="Rp. 500.000 - Rp. 1.000.000">
                                            < Rp. 500.000 - Rp. 1.000.000</option>
                                        <option value="Rp. 1.000.000 - 1.500.000">
                                            < Rp. 1.000.000 - 1.500.000</option>
                                        <option value="Rp. 1.500.000 - 2.500.000">
                                            < Rp. 1.500.000 - 2.500.000</option>
                                        <option value="Rp. 2.500.000 - 5.000.000">
                                            < Rp. Rp. 2.500.000 - 5.000.000</option>
                                        <option value="> Rp. 5.000.000">
                                            <> Rp. 5.000.000
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="">File Kartu Keluarga</label>
                                <input type="file" name="file_kk" class="form-control <?= form_error('file_kk') != null ? 'is-invalid' : ''; ?>">
                                <?php echo form_error('file_kk', '<small class="text-danger">', '</small>'); ?>
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