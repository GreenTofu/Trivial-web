<?php
include "inc/head.php";
include "func/quizHandller.php";
if (isset($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);
    $body = htmlspecialchars($_POST['body']);
    $file = $_FILES['image'];
    validateQuiz($title, $body, $file, $_POST);
    // var_dump($_POST);
}
?>
<?php if (!$_SESSION['logged_in']) : ?>
    <div class="my-5 py-4">
        <div class="row justify-content-around align-items-center">
            <div class="col-md-3" style="margin: 0px 40px;">
                <h2 class="pt-5 text-dark font-weight-bold">Login to create a quiz!</h2>
                <a href="login.php" class="btn btn-outline-secondary rounded btn-lg">Go to Login</a>
            </div>
            <div class="col-md-8">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/ready.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/makeOwnQuiz.jpg" class="d-block w-100" alt="...">
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
            </div>
        </div>
        <br>
    </div>
<?php else : ?>
    <div class="container my-5 py-4">
        <?php
        // to set use the setMsg() fn
        if (!empty($message['msg']) && !empty($message['class'])) {
            echo "<div class='alert alert-{$message['class']} mb-3 mt-4'>
              {$message['msg']}
            </div>";
        }
        ?>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3><i class="fas fa-pencil mr-2"></i> Create a Quiz</h3>
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="card mt-3 text-dark">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Quiz Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Add quiz title...">
                            </div>
                            <div class="form-group">
                                <label for="body">Quiz Body</label>
                                <textarea name="body" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="customFile">Quiz Image</label>
                                <div class="mb-2 d-flex justify-content-center">
                                    <img class="img-upload" src="#" alt="" width="300px" height="200px" style="block-size: 100%">
                                </div>
                                <input type="file" accept="image/*" name="image" class="form-control img-input" id="customFile">
                            </div>
                        </div>
                    </div>

                    <h2 class="mt-4"><i class="fa fa-pencil mr-2" style="font-size: smaller;"></i> Create some Question</h2>
                    <div class="create-question-space card mt-3 text-dark">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="text_question1">Question Text</label>
                                <input type="text" name="text_question1" class="form-control" placeholder="Add question text...">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="text_answer1">Answer 1 Text</label>
                                    <input type="text" name="text_answer1_1" class="form-control" placeholder="Add answer 1 text...">
                                </div>
                                <div class="col">
                                    <label for="text_answer2">Answer 2 Text</label>
                                    <input type="text" name="text_answer2_1" class="form-control" placeholder="Add answer 2 text...">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col">
                                    <label for="text_answer3">Answer 3 Text</label>
                                    <input type="text" name="text_answer3_1" class="form-control" placeholder="Add answer 3 text...">
                                </div>
                                <div class="col">
                                    <label for="text_answer4">Answer 4 Text</label>
                                    <input type="text" name="text_answer4_1" class="form-control" placeholder="Add answer 4 text...">
                                </div>
                            </div>

                            <div class="row">
                                <legend class="col-form-label col-sm-10 pt-0 mt-2">Correct Answer:</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Ans1" id="AnsKey1" value="1" checked>
                                        <label class="form-check-label" for="AnsKey1">
                                            Answer 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Ans1" id="AnsKey2" value="2">
                                        <label class="form-check-label" for="AnsKey2">
                                            Answer 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Ans1" id="AnsKey3" value="3">
                                        <label class="form-check-label" for="AnsKey3">
                                            Answer 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Ans1" id="AnsKey4" value="4">
                                        <label class="form-check-label" for="AnsKey4">
                                            Answer 4
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="add-btn btn btn-outline-success mt-3 rounded btn-md"> <i class="fa-solid fa-plus" aria-hidden="true"></i></button>
                        <button type="button" class="delete-btn btn btn-outline-danger mt-3 rounded btn-md"> <i class="fa-solid fa-minus" aria-hidden="true"></i></button>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-block mt-4"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Quiz</button>
                </form>
            </div>
        </div>
        <div class="test mt-5 pt-5">

        </div>
    </div>
<?php endif; ?>

<?php
include "inc/footer.php"
?>