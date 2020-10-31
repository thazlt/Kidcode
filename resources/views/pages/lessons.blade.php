<?php
include APPROOT . "/resources/views/inc/header.blade.php";

 ?>
   <!-- Info -->
    <div class="container-fluid">
      <div class="course-box" style="background-color: #51c5d6;">
        <div class="course-head">
          <h2><?php echo $data[0]['LessonName'] ?></h2>
        </div>
        <div class="course-content">
          <div>
            <img src="<?php echo URLROOT ?>/resources/img/beginner.png" class="img-fluid course-img">
          </div>
          <div class="course-info">
            <div>
              <p><?php echo $data[0]['LessonDescription'] ?>
              </p>
            </div>
            <div>
              <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/index/?lessonID=0"; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Start</button></a>
              <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/quiz/?lessonID=0"; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Take Quiz</button></a>
            </div>
          </div>

        </div>
      </div>

      <div class="course-box" style="background-color: rgb(238, 108, 75);">
        <div class="course-head">
          <h2><?php echo $data[1]['LessonName'] ?></h2>
        </div>
        <div class="course-content">
          <div>
            <img src="<?php echo URLROOT ?>/resources/img/inter.png" class="img-fluid course-img">
          </div>
          <div class="course-info">
            <div>
              <p class="lead"><?php echo $data[1]['LessonDescription'] ?>
              </p>
            </div>
            <div>
              <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/index/?lessonID=1"; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Start</button></a>
                <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/quiz/?lessonID=1"; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Take Quiz</button></a>
            </div>
          </div>
        </div>
      </div>

      <div class="course-box" style="background-color: rgba(250, 207, 15);">
        <div class="course-head">
          <h2><?php echo $data[2]['LessonName'] ?></h2>
        </div>
        <div class="course-content">
          <div>
            <img src="<?php echo URLROOT ?>/resources/img/advanced.png" class="img-fluid course-img">
          </div>
          <div class="course-info">
            <div>
              <p class="lead"><?php echo $data[2]['LessonDescription'] ?>
              </p>
            </div>
            <div>
              <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/index/?lessonID=2"; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Start</button></a>
                <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/quiz/?lessonID=2"; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Take Quiz</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $(".course-box").addClass('animated slideInLeft');
    })
    </script>
    <!-- Footer -->
<?php
    include APPROOT . "/resources/views/inc/footer.blade.php";
    ?>
