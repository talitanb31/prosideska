<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?=site_url("welcome/index")?>">Dashboard</a></li>
                    <li class="breadcrumb-item " aria-current="page"><?=ucwords($this->uri->segment(1))?></li>
                </ol>
            </nav>
         
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-5">
                    <form action="<?=site_url('jenissurat/update/')?><?=$dataJenis['id']?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Jenis Surat</label>
                                    <input type="text" name="jenis_surat" value="<?=$dataJenis['jenis']?>" class="form-control" placeholder="Masukkan Surat" id="">
                                    <?php echo form_error('jenis_surat', '<small class="text-danger">', '</small>'); ?>
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
       
