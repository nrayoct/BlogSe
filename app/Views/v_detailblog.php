<?= $this->extend('/layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 single-content">
                <h1 class="mb-4">
                    <?= $tampilblog['judul']; ?>
                </h1>
                <div class="post-meta d-flex mb-5">
                    <!-- <div class="bio-pic mr-3">
                        <img src="images/person_1.jpg" alt="Image" class="img-fluidid">
                    </div> -->
                    <div class="vcard">
                        <span class="date-read">Created at: <?= $tampilblog['created_at']; ?> <span class="mx-1">&bullet;
                            </span>
                    </div>
                </div>

                <?= $tampilblog['isi']; ?>
            </div>

        </div>

    </div>
</div>

<?= $this->endSection(); ?>