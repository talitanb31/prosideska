<div class="content">
    <div class="row">
        <div class="col-lg-12 ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><?=ucwords($this->uri->segment(1))?></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="<?=site_url("welcome/index")?>">Dashboard</a></li>
                </ol>
            </nav>
         
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-start mb-4">
                    <a href="" class="btn btn-primary p-3">Tambah Data</a>
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
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="<?php echo base_url() ?>assets/img/mike.jpg" class="user-image" alt="User Image" width="100" height="100">
                                        Dummy Berita
                                    </td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit officia ducimus et sed molestiae modi tenetur cum consequatur, aliquam enim incidunt architecto aspernatur temporibus. Eligendi accusantium eveniet neque expedita quo?</td>
                                    <td>2022-03-22 20:10</td>
                                    <td>
                                        <a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="#" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>