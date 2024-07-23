<?php
include "inc/head.php";
include "func/quizHandller.php";
$quizzes = getQuizzes();
?>
<div class="bg-white">
  <main role="main">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="height: 91vh;">
        <div class="carousel-item active" style="height: 90vh;">
          <img src="images/animal_quiz.jpg" class="d-block w-100" alt="..." style="height: 91vh;">
        </div>
        <div class="carousel-item" style="height: 91vh;">
          <img src="images/biology_quiz.png" class="d-block w-100" alt="..." style="height: 91vh;">
        </div>
        <div class="carousel-item" style="height: 91vh;">
          <img src="images/math_quiz.png" class="d-block w-100" alt="..." style="height: 91vh;">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev" style="background-color: transparent; border: 0;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next" style="background-color: transparent; border: 0;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
  </main>

  <hr>
  <div class="container py-4">
    <h3 class="font-weight-light">Recent Quizzes</h3>
    <hr>
    <div class="row">
      <?php foreach ($quizzes as $post) : ?>
        <div class="col-md-4 my-3 d-flex">
          <div class="card flex-fill border-0">
            <a href="quiz.php?id=<?= $post['quiz_id']; ?>"><img src="<?= $post['quiz_img'] ?>" class="card-img-top" alt="..." style="height: 35vh; border-radius:5px;" ;></a>
            <div class="card-body">
              <a href="quiz.php?id=<?= $post['quiz_id']; ?>">
                <h3 class="card-title border-0 my-title"><?= $post['quiz_title'] ?></h3>
              </a>
              <p class="card-text"><?= $post['quiz_description'] ?></p>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between border-0 bg-white">
              <p><?= date("d M Y", strtotime($post['date_created'])) ?></p>
              <p><?= $post['username'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php
include "inc/footer.php";
?>