<?= $this->extend('/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container my-5">
    <h1>Add Article</h1>
    <form action="/blogs/postingblog" method="post">
        <!-- fungsi csrf biar kalo mau isi form cmn bisa disini -->
        <?= csrf_field(); ?>
        <div class="row my-auto">
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; //if-else dlm satu baris 
                                                            ?>" name="judul" placeholder="Judul" id="judul" value="<?= old('judul'); ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; //if-else dlm satu baris 
                                                    ?>" rows="8" cols="160" type="text" name="isi" autocomplete="off" placeholder="Isi" maxlength="3000"> <?= old('isi'); ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('isi'); ?>
                    </div>
                </div>
            </div>
        </div>
        <br><input type="submit" class="btn" value="Submit">
    </form>
</div>


<?= $this->endSection(); ?>