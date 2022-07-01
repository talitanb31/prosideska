<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page"><a href="<?= site_url("welcome/index") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($this->uri->segment(1)) ?></li>
                </ol>
            </nav>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="d-flex justify-content-start mb-4">
                    <a href="" class="btn btn-primary p-3">Tambah Data</a>
                </div> -->
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <?php $no = 1; ?>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subjek</th>
                                    <th>Pesan</th>
                                    <th>Waktu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kritikSaran as $item) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $item['nama'] ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td><?= $item['subjek'] ?></td>
                                        <td><?= $item['pesan'] ?></td>
                                        <td><?= $item['waktu'] ?></td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a> -->
                                            <a href="<?= base_url('kritiksaran/delete/') ?><?= $item['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>