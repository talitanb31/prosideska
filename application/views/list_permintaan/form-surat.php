<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page"><a href="<?= site_url("welcome/index") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?= site_url("listpermintaan/index") ?>"><?= ucwords($this->uri->segment(1)) ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($this->uri->segment(2)) ?></li>
                </ol>
            </nav>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-5">
                    <h5>Surat Keterangan Perjalanan</h5>
                    <form action="<?= site_url('listpermintaan/submitSuratBepergian/') ?><?= $id ?>" method="post">
                        <input type="hidden" name="nik" value="<?= $nik ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Berlaku hingga</label>
                                    <input type="date" name="berlaku_hingga" value="" class="form-control <?= form_error('berlaku_hingga') != null ? 'is-invalid' : ''; ?>" id="">
                                    <?php echo form_error('berlaku_hingga', '<small class="text-danger">', '</small>'); ?>
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