<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page"><a href="<?= site_url("welcome/index") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($this->uri->segment(1)) ?></li>
                </ol>
            </nav>
            <?php if ($this->session->flashdata()) : ?>
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
                        <a href="<?= site_url('syaratsurat/create') ?>" class="btn btn-primary p-3"> <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <?php $no = 1; ?>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Syarat / Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= ucfirst($item['jenis']) ?></td>
                                        <td><?= $item['syarat'] ?></td>
                                        <td style="width: 200px;">
                                            <a href="<?= base_url('syaratsurat/edit/') ?><?= $item['id'] ?>" class="btn btn-sm btn-warning m-sm-1"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('syaratsurat/delete/') ?><?= $item['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class="btn btn-sm btn-danger m-sm-1"><i class="fa fa-trash"></i></a>
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