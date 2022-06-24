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
                    <h5>Edit List Permintaan Surat</h5>
                    <form action="<?= site_url('listpermintaan/updatedata/') ?><?=$data[0]['id'] ?>" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <?php
                                        $data_pas = json_decode($data[0]['form_data']);
                                    ?>
                                    <?php foreach($data_pas as $key=>$value){ ?>
                                        <?php if ($key != 'id_jenis_surat' && $key != 'jenis_surat') { ?>
                                            <?php if (is_array($value)) { ?>
                                                <?php foreach($value as $data){ ?>
                                                    <div class="form-group col-md-6">
                                                        <label for=""><?=str_replace('_',' ',ucwords($key))?></label>
                                                        <input type="text" name='<?=$key?>' class='form-control' value="<?=$data?>">
                                                    </div>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <div class="form-group col-md-6">
                                                    <label for=""><?=str_replace('_',' ',ucwords($key))?></label>
                                                    <input type="text" name='<?=$key?>' class='form-control' value="<?=$value?>">
                                                </div>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <div class="col-lg-12">
                                                <h4 class="">--</h4>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
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