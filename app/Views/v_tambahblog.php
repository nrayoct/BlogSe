<div class="container">
    <div class="mt-5">
        <div class="card">
            <div class="card-header">
                Form Tambah Blog
            </div>
            <div class="card-body">
                <form action="/blogs/postingblog" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="judul" placeholder="Judul" id="judul" value="<?= old('judul'); ?>"><br>
                            <input type="text" class="form-control" name="slug" placeholder="Slug" id="slug" value="<?= old('slug'); ?>"><br>
                        </div>
                        <div class="col-md-8">
                            <textarea rows="10" cols="109" type="text" name="isi" id="isi" autocomplete="off" placeholder="Isi" maxlength="3000" <?= old('isi'); ?>></textarea>

                        </div>
                    </div>

                    <br><input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>