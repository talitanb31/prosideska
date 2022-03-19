<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("welcome/index")?>">Dashboard</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("akun/index")?>"><?=ucwords($this->uri->segment(1))?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=ucwords($this->uri->segment(2))?></li>
                </ol>
            </nav>
         
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-5">
                    <form action="<?=site_url('akun/update/')?><?=$dataAkun['id']?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="name" value="<?=$dataAkun['nama']?>" class="form-control <?=form_error('name') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan Nama Lengkap" id="">
                                    <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" value="<?=$dataAkun['username']?>" class="form-control <?=form_error('username') != null ? 'is-invalid' : ''; ?>" placeholder="Masukkan Username" id="">
                                    <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
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
       
