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
        <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Judul dan Konten Beranda</h4>
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
                                                <a href="<?= base_url('edit/title/') . urlencode($this->secure->encrypt_url($hero['id'])); ?>" class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <a href="<?= base_url('edit/galeri/') . urlencode($this->secure->encrypt_url($g['id'])); ?>" class="btn btn-primary mb-4 mt-4 mx-auto">Edit Galeri</a>
                                    </div>
                                    <div class="text-job text-muted">Judul : <?= $g['title']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card card-success col-12">
                    <div class="card-header">
                        <h4>Produk Ecoprint</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($ecoprint as $e) : ?>
                                <div class="col-4 mb-4 mb-md-0">
                                    <div class="row px-5">
                                        <img alt="image" src="<?php echo base_url(); ?>assets/img/gallery/<?= $e['image'] ?>" class="img-fluid" data-toggle="tooltip" title="<?= $e['title'] ?>">
                                        <a href="<?= base_url('admin/editNewArrivalSection/') . $e['id']; ?>" class="btn btn-primary mb-4 mt-4 mx-auto">Edit Produk</a>
                                    </div>
                                    <div class="text-job text-muted">Harga : <?= $e['price']; ?></div>
                                    <div class="text-job text-muted mb-4">Link : <?= $e['link']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card card-danger col-4">
                    <div class="card-header">
                        <h4>Video Isoku</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($video as $v) : ?>
                                <div class="col-12 mb-12 mb-md-0">
                                    <div class="row px-5">
                                        <img alt="image" src="<?php echo base_url(); ?>assets/img/gallery/<?= $v['image'] ?>" class="img-fluid" data-toggle="tooltip" title="<?= $v['title'] ?>">
                                        <a href="<?= base_url('edit/urlVideo/') . urlencode($this->secure->encrypt_url($v['id'])); ?>" class="btn btn-primary mb-4 mt-4 mx-auto">Edit Video</a>
                                    </div>
                                    <div class="text-job text-muted">Link : <a target="_blank" href="<?= $v['link']; ?>">Liat Video</a></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="card card-warning col-4">
                    <div class="card-header">
                        <h4>Pelatihan Ecoprint</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($pelatihan as $p) : ?>
                                <div class="col-12 mb-12 mb-md-0">
                                    <div class="row px-5">
                                        <img alt="image" src="<?php echo base_url(); ?>assets/img/gallery/<?= $p['image'] ?>" class="img-fluid" data-toggle="tooltip" title="<?= $p['title'] ?>">
                                        <a href="<?= base_url('edit/pelatihan/') . urlencode($this->secure->encrypt_url($p['id'])); ?>" class="btn btn-primary mb-4 mt-4 mx-auto">Edit</a>
                                    </div>
                                    <div class="text-job text-dark"><?= $p['content']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="card card-warning col-4">
                    <div class="card-header">
                        <h4>Kursus Menjahit</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($kursus as $k) : ?>
                                <div class="col-12 mb-12 mb-md-0">
                                    <div class="row px-5">
                                        <img alt="image" src="<?php echo base_url(); ?>assets/img/gallery/<?= $k['image'] ?>" class="img-fluid" data-toggle="tooltip" title="<?= $k['title'] ?>">
                                        <a href="<?= base_url('edit/kursus/') . urlencode($this->secure->encrypt_url($k['id'])); ?>" class="btn btn-primary mb-4 mt-4 mx-auto">Edit</a>
                                    </div>
                                    <div class="text-job text-dark"><?= $k['content']; ?></div>
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