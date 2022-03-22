<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="page-error">
                    <div class="page-inner">
                        <h1>500</h1>
                        <div class="page-description">
                            Whoopps, something went wrong.
                        </div>
                        <div class="page-search">
                            <div class="mt-3">
                                <a href="<?php echo base_url(); ?>auth">Back to Login</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-footer mt-5">
                    Copyright &copy; Isoku <?= date('Y'); ?>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('dist/_partials/js'); ?>