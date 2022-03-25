<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("welcome/index")?>">Dashboard</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("kartukeluarga/index")?>"><?=ucwords($this->uri->segment(1))?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=ucwords($this->uri->segment(2))?></li>
                </ol>
            </nav>
         
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-5">
                    <form action="<?=base_url('kartukeluarga/update/')?><?=$data['id']?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control <?=form_error('nik') != null ? 'is-invalid' : ''; ?>" required><?=$data['alamat']?></textarea>
                                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Dusun</label>
                                    <textarea name="dusun" id="dusun" cols="30" rows="5" class="form-control <?=form_error('nik') != null ? 'is-invalid' : ''; ?>" required><?=$data['dusun']?></textarea>
                                    <?php echo form_error('dusun', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">RT</label>
                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" name="rt" class="form-control <?=form_error('rt') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan no RT" id="" value="<?=$data['rt']?>" required>
                                    <?php echo form_error('rt', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">RW</label>
                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" name="rw" class="form-control <?=form_error('rw') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan no RW" id="" value="<?=$data['rw']?>" required>
                                    <?php echo form_error('rw', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Ekonomi</label>
                                    <input type="text" name="ekonomi" class="form-control <?=form_error('ekonomi') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan ekonomi" id="" value="<?=$data['ekonomi']?>" required>
                                    <?php echo form_error('ekonomi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="">File Kartu Keluarga</label><br>
                                <img src="<?=base_url().'assets/scan_kk/'.$data['file_kk']?>" width="150" height="150">
                                <input type="file" name="file_kk" class="form-control <?=form_error('file_kk') != null ? 'is-invalid' : ''; ?>">
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