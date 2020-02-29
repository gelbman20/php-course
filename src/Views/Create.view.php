<?php $this->layout('template', ['title' => 'Create new post']) ?>

<div class="section p-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-10">
        <h2 class="mb-4">New Post</h2>
        <form action="create.php" method="POST">
          <div class="row">
            <div class="col-12 col-md-4 mb-2">
              <div class="form-group">
                <input type="text" class="form-control <?= $_SESSION['name'] ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= $data['name']['value'] ?>" placeholder="Name">
                <div class="invalid-feedback"><?= $_SESSION['name'] ?></div>
              </div>
            </div>
            <div class="col-12 col-md-4 mb-2">
              <div class="form-group">
                <input type="text" class="form-control <?= $_SESSION['email'] ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= $data['email']['value'] ?>" placeholder="Enter email">
                <div class="invalid-feedback"><?= $_SESSION['email'] ?></div>
              </div>
            </div>
            <div class="col-12 col-md-4 mb-2">
              <div class="form-group">
                <input type="text" class="form-control <?= $_SESSION['title'] ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= $data['title']['value'] ?>" placeholder="Post Title">
                <div class="invalid-feedback"><?= $_SESSION['title'] ?></div>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="form-group">
                <textarea class="form-control <?= $_SESSION['text'] ? 'is-invalid' : '' ?>" id="textarea" name="text" rows="3" placeholder="Your text"><?= $data['text']['value'] ?></textarea>
                <div class="invalid-feedback"><?= $_SESSION['text'] ?></div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>