<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("welcome/index")?>">Dashboard</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("berita/index")?>"><?=ucwords($this->uri->segment(1))?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=ucwords($this->uri->segment(2))?></li>
                </ol>
            </nav>
         
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-5">
                    <form action="<?=base_url('berita/update/')?><?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <input type="text" name="title" class="form-control <?=form_error('title') != null ? 'is-invalid' : ''; ?>"  placeholder="Masukkan judul" value="<?= $data['title'] ?>" required>
                                    <?php echo form_error('title', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control <?=form_error('deskripsi') != null ? 'is-invalid' : ''; ?>" required><?= $data['deskripsi'] ?></textarea>
                                    <?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Cover</label><br>
                                <img src="<?=base_url().'assets/berita/'.$data['cover']?>" width="150" height=""150>
                                <input type="file" name="cover" class="form-control mt-2 <?=form_error('cover') != null ? 'is-invalid' : ''; ?>">
                                <?php echo form_error('cover', '<small class="text-danger">', '</small>'); ?>
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