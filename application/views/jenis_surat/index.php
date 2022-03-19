<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><?=ucwords($this->uri->segment(1))?></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("welcome/index")?>">Dashboard</a></li>
                </ol>
            </nav>
            <?php if ($this->session->flashdata() ) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('pesan') ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-start mb-4">
                    <a href="<?=site_url('jenissurat/create')?>" class="btn btn-primary p-3"> <i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data</a>
                    <!-- <?php echo anchor(site_url('user/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?> -->

                </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                            <?php $no = 1; ?>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataJenis as $item) : ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$item['jenis']?></td>
                                        <td>
                                            <a href="<?=base_url('jenissurat/edit/')?><?=$item['id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="<?=base_url('jenissurat/delete/')?><?=$item['id']?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       