<?= $this->extend('/layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
	<h1>Edit Blog</h1>
	<hr>
	<form action="/blogs/updateblog/<?= $tampilblog['blog_id']; ?>" method="post">
		<!-- fungsi csrf biar kalo mau isi form cmn bisa disini -->
		<?= csrf_field(); ?>
		<input type="hidden" name="slug" value="<?= $tampilblog['slug']; ?>">
		<div class="row my-auto">
			<div class="col">
				<div class="form-group">
					<input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; //if-else dlm satu baris 
															?>" name="judul" placeholder="Judul" id="judul" value="<?= $tampilblog['judul']; ?>" autofocus>
					<div class="invalid-feedback">
						<?= $validation->getError('judul'); ?>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; //if-else dlm satu baris 
													?>" rows="8" cols="160" type="text" name="isi" autocomplete="off" placeholder="Isi" maxlength="3000"> <?= $tampilblog['isi']; ?></textarea>
					<div class="invalid-feedback">
						<?= $validation->getError('isi'); ?>
					</div>
				</div>
				<a href="/blogs"><button type="button" class="btn btn-outline-danger" onclick="return confirm('Discard changes ?'); "> Back </button></a>
				<button type="submit" class="btn btn-primary"> Update </button>
			</div>
		</div>
	</form>
</div>

<?= $this->endSection(); ?>