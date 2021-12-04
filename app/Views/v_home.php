<?= $this->extend('/layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="site-section">
    <div class="container">
        <div class="section-title mb-5">
            <h2>Selamat Datang di BlogSe</h2>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mr-4">
                        <?php
                        $blog_id = 0;
                        foreach ($tampilblog as $row) :
                            $blog_id++;
                        ?>
                            <div class="col-md-5 mb-3">
                                <div class="post-entry-2 d-flex bg-light">
                                    <div class="contents">
                                        <h2> <a href="/blogs/artikel/<?= $row['slug']; ?>"><?= $row['judul']; ?></h2></a>

                                        <div class="post-meta">
                                            <span class="date-read">Created at: <?= $row['created_at']; ?> <span class="mx-1">&bullet;
                                        </div>


                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>