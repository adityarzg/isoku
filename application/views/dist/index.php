<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard - Landing Homepage</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Header Beranda</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Title</th>
                                        <th width="50%">Content</th>
                                        <th>Section</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($heroSection as $hero) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td><?= $hero['title']; ?></td>
                                            <td><?= $hero['content']; ?></td>
                                            <td><?= $hero['pageSection']; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/editHeroSection/') . $hero['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Header Beranda</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Section</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Create a mobile app</td>
                                            <td>
                                                <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                            </td>
                                            <td>2018-01-20</td>
                                            <td>
                                                <div class="badge badge-success">Completed</div>
                                            </td>
                                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="card card-danger col-12">
                    <div class="card-header">
                        <h4>Produk Terbaru</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($newArrival as $nw) : ?>
                                <div class="col-4 mb-4 mb-md-0">
                                    <div class="row px-5">
                                        <img alt="image" src="<?php echo base_url(); ?>assets/img/gallery/<?= $nw['image'] ?>" class="img-fluid" data-toggle="tooltip" title="<?= $nw['title'] ?>">
                                        <a href="<?= base_url('admin/editNewArrivalSection/') . $nw['id']; ?>" class="btn btn-primary mb-4 mt-4 mx-auto">Edit Produk</a>
                                    </div>
                                    <div class="text-job text-muted">Harga : <?= $nw['price']; ?></div>
                                    <div class="text-job text-muted">Link : <?= $nw['link']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card card-primary col-12">
                    <div class="card-header">
                        <h4>Galeri Isoku</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($gallerySection as $g) : ?>
                                <div class="col-3 mb-4 mb-md-0">
                                    <div class="row px-5">
                                        <img alt="image" src="<?php echo base_url(); ?>assets/img/gallery/<?= $g['image'] ?>" class="img-fluid" data-toggle="tooltip" title="<?= $g['title'] ?>">
                                        <a href="<?= base_url('admin/editGallerySection/') . $g['id']; ?>" class="btn btn-primary mb-4 mt-4 mx-auto">Edit Galeri</a>
                                    </div>
                                    <div class="text-job text-muted">Judul : <?= $g['title']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>