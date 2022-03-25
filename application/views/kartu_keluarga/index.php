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
                        <a href="<?=site_url('kartukeluarga/create')?>" class="btn btn-primary p-3">Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Alamat</th>
                                    <th>Dusun</th>
                                    <th>RT/RW</th>
                                    <th>Ekonomi</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                                <?php foreach($data as $item) { ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?= $item['alamat'] ?></td>
                                    <td><?= $item['dusun'] ?></td>
                                    <td><?= $item['rt'].'/'.$item['rw'] ?></td>
                                    <td><?= $item['ekonomi'] ?></td>
                                    <td>
                                        <a href="<?=base_url().'assets/scan_kk/'.$item['file_kk']?>" target="_blank">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="<?=base_url('kartukeluarga/edit/')?><?=$item['id']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="<?=base_url('kartukeluarga/delete/')?><?=$item['id']?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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