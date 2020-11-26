<?php
include APPROOT . '/resources/views/inc/header.blade.php';
$i=1;
 ?>
    <div class="banner-faq">
        <div class="container-fluid">
            <h1 class="forum-title">Manage your Exercise</h1>
            <p>Teachers can be able to edit their own lessons</p>
        </div>
    </div>
    <div class="container">
        <div class="row team-info">
            <div class="col-lg-3">
                <ul class="nav nav-pills flex-column" id="myTab">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" href="#home">Back to My lessons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" href="#home" style="margin-top:20px;">Back to My Exercise List</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9" >
            <div class="container-fluid" id="exercise">
            <form action="<?php echo URLROOT . "teacher/commiteditexercise";?>" method="post">
            <?php echo Form::token(); ?>
              <input type="hidden" name="LessonID" value="<?php echo $data['Exercise']['LessonID']?>">
              <input type="hidden" name="ExerciseID" value="<?php echo $data['Exercise']['ExerciseID']?>">
                <article>
                  <div class="single-post-content">
                    <div class="form-group">
                      <label for="Title">Your NEW Exercise Title: </label>
                        <input type="text" id="title" class="text-field" placeholder="Your exercise title ..." name="ExerciseName" autocomplete="off" maxlength="200" value="<?php echo $data['Exercise']['ExerciseName']?>">
                    </div>
                        <label for="Title">Your NEW Exercise details: </label>
                        <div class="single-post-content" style="padding: 0px 15px; margin-bottom: 0;">
                            <br>
                            <textarea name="ExerciseDescription" id="editor1" cols="60" rows="9" class="post-content" placeholder="Enter text here ..."><?php echo $data['Exercise']['ExerciseDescription']?></textarea>
                              <script>
                                CKEDITOR.replace('editor1');
                              </script>
                        </div>
                        <label for="Title">Your NEW Code: </label>
                        <div class="single-post-content" style="padding: 0px 15px; margin-bottom: 0;">
                            <br>
                            <textarea name="Code" id="editor2" cols="60" rows="13" class="post-content" placeholder="Enter text here ..."><?php echo $data['Exercise']['Code']?></textarea>
                        </div>
                        <button class="btn btn-primary button new_post" style="text-align: center; width:100%" type="" name="button"><span class="icon_edit"><i class="fa fa-edit"></i>Update Exercise</span></button>
                 </div>
                </article>
            </form>
            </div>
            </div>
        </div>
    </div>


<?php
    include APPROOT . "/resources/views/inc/footer.blade.php";
?>
