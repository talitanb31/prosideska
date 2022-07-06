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
                        <a href="<?= site_url('penduduk/create') ?>" class="btn btn-primary p-3">Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <!-- <th>Agama</th>
                                    <th>Tmp. Lahir</th>
                                    <th>Tgl. Lahir</th> -->
                                    <th>Jenis Kelamin</th>
                                    <!-- <th>Gol. Darah</th>
                                    <th>Warga Negara</th>
                                    <th>Pendidikan</th> -->
                                    <th>Pekerjaan</th>
                                    <th>Status Pernikahan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data as $item) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item['nik'] ?></td>
                                        <td><?= $item['nama'] ?></td>
                                        <!-- <td><?= $item['agama'] ?></td>
                                    <td><?= $item['tempat_lahir'] ?></td>
                                    <td><?= $item['tanggal_lahir'] ?></td> -->
                                        <td><?= $item['jenis_kelamin'] ?></td>
                                        <!-- <td><?= $item['gol_darah'] ?></td>
                                    <td><?= $item['country_name'] ?></td>
                                    <td><?= $item['pendidikan'] ?></td> -->
                                        <td><?= $item['pekerjaan'] ?></td>
                                        <td><?= $item['status_pernikahan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('penduduk/detail/') ?><?= $item['nik'] ?>" class="btn btn-info m-1"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('penduduk/edit/') ?><?= $item['nik'] ?>" class="btn btn-warning m-1"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('penduduk/delete/') ?><?= $item['nik'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class="btn btn-danger m-1"><i class="fa fa-trash"></i></a>
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