<?= $this->extend('/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-left">
                <div class="section-title mb-5">
                    <h2>About Us</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <p>
                    <img src="https://th.bing.com/th/id/OIP.gImdIdyHSHfVpB92JOC3twHaE7?pid=ImgDet&rs=1" alt="Image" class="img-fluid">
                </p>
            </div>
            <div class="col-lg-6 pl-md-5">
                <p>studi kasus: blog sederhana</p>
                <p>blog yang memungkinkan pengguna menulis,melihat,mengedit, dan menghapus blog (tulisan/postingan)</p>
                <ul class="ul-check list-unstyled success mt-5">
                    <li>Anggota:</li>
                    <li>1917051039 - Nur Ayu Octarina</li>
                    <li>1917051050 - Fanirizki Sofiyana</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>