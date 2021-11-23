<?= $this->extend('/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 single-content">
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

<div class="site-section subscribe bg-light">
    <div class="container">
        <form action="#" class="row align-items-center">
            <div class="col-md-5 mr-auto">
                <h2>Newsletter Subcribe</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
            </div>
            <div class="col-md-6 ml-auto">
                <div class="d-flex">
                    <input type="email" class="form-control" placeholder="Enter your email">
                    <button type="submit" class="btn btn-secondary"><span class="icon-paper-plane"></span></button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>