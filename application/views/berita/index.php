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
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-4">
                        <a href="<?=site_url('berita/create')?>" class="btn btn-primary p-3">Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Waktu dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($data as $item) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <img src="<?=base_url().'assets/berita/'.$item['cover']?>" class="user-image" alt="Cover Image" width="100" height="100">
                                        <?= $item['title'] ?>
                                    </td>
                                    <td><?= $item['deskripsi'] ?></td>
                                    <td><?= $item['created_at'] ?></td>
                                    <td>
                                        <a href="<?=base_url('berita/edit/')?><?=$item['id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="<?=base_url('berita/delete/')?><?=$item['id']?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>