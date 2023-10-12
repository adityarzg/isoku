<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
        <h1>Landing Page</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Landing Page</a></div>
            <div class="breadcrumb-item">Forms</div>
        </div>
    </div>

    <div class="section-body">

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
            <?php if($type ==  'title') { ?>
                <div class="card-body">
                    <form action="<?= base_url('processTitle') ?>" method="post">
                        <?php foreach($edit_profil as $e) : ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $e['title']; ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" name="content"><?= $e['content']; ?></textarea>
                                <?= form_error('content', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                                <input hidden type="text" name="id" value="<?= $this->secure->encrypt_url( $e['id'] ); ?>">
                        <?php endforeach; ?>
                            <div class="card-footer text-right">
                                <a href="<?= base_url('Admin/landing'); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } elseif($type == 'galeri') { ?>
                <div class="card-body">
                    <form action="<?= base_url('processGaleri') ?>" method="post" enctype="multipart/form-data">
                        <?php foreach($edit_profil as $e) : ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $e['title']; ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Current</label>
                                <label>Image</label>
                                <img alt="image" src="<?= base_url(); ?>assets/img/gallery/<?= $e['image'] ?>" class="img-fluid mb-4">
                                <input type="file" class="form-control-file" id="image" name="image">
                                <small class="text-danger">*Maksimal ukuran gambar 2MB!</small>
                            </div>
                                <input hidden type="text" name="id" value="<?= $this->secure->encrypt_url( $e['id'] ); ?>">
                        <?php endforeach; ?>
                            <div class="card-footer text-right">
                                <a href="<?= base_url('Admin/landing'); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } elseif($type == 'pelatihan') { ?> 
                <div class="card-body">
                    <form action="<?= base_url('processPelatihan') ?>" method="post" enctype="multipart/form-data">
                        <?php foreach($edit_profil as $e) : ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $e['title']; ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Current</label>
                                <label>Image</label>
                                <img alt="image" src="<?= base_url(); ?>assets/img/gallery/<?= $e['image'] ?>" class="img-fluid mb-4">
                                <input type="file" class="form-control-file" id="image" name="image">
                                <!-- <input type="text" name="image" id="image" value="<?= $e['image'] ?>"> -->
                                <small class="text-danger">*Maksimal ukuran gambar 2MB!</small>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" name="content"><?= $e['content']; ?></textarea>
                                <?= form_error('content', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                                <input hidden type="text" name="id" value="<?= $this->secure->encrypt_url( $e['id'] ); ?>">
                        <?php endforeach; ?>
                            <div class="card-footer text-right">
                                <a href="<?= base_url('Admin/landing'); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } elseif($type == 'kursus') { ?>
                <div class="card-body">
                    <form action="<?= base_url('processKursus') ?>" method="post" enctype="multipart/form-data">
                        <?php foreach($edit_profil as $e) : ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $e['title']; ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Current</label>
                                <label>Image</label>
                                <img alt="image" src="<?= base_url(); ?>assets/img/gallery/<?= $e['image'] ?>" class="img-fluid mb-4">
                                <input type="file" class="form-control-file" id="image" name="image">
                                <!-- <input type="text" name="image" id="image" value="<?= $e['image'] ?>"> -->
                                <small class="text-danger">*Maksimal ukuran gambar 2MB!</small>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" name="content"><?= $e['content']; ?></textarea>
                                <?= form_error('content', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                                <input hidden type="text" name="id" value="<?= $this->secure->encrypt_url( $e['id'] ); ?>">
                        <?php endforeach; ?>
                            <div class="card-footer text-right">
                                <a href="<?= base_url('Admin/landing'); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } elseif($type == 'urlVideo') { ?>
                <div class="card-body">
                    <form action="<?= base_url('processUrlVideo') ?>" method="post" enctype="multipart/form-data">
                        <?php foreach($edit_profil as $e) : ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $e['title']; ?>">
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Current</label>
                                <label>Thumbail Image</label>
                                <img alt="image" src="<?= base_url(); ?>assets/img/gallery/<?= $e['image'] ?>" class="img-fluid mb-4">
                                <input type="file" class="form-control-file" id="image" name="image">
                                <!-- <input type="text" name="image" id="image" value="<?= $e['image'] ?>"> -->
                                <small class="text-danger">*Maksimal ukuran gambar 2MB!</small>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" value="<?= $e['link']; ?>">
                                <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                                <input hidden type="text" name="id" value="<?= $this->secure->encrypt_url( $e['id'] ); ?>">
                        <?php endforeach; ?>
                            <div class="card-footer text-right">
                                <a href="<?= base_url('Admin/landing'); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-times"></i> Batal</a>
                                <button type="submit" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>
</section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>