<?php
include APPROOT . "/resources/views/inc/header.php";
 ?>

    <!-- Info -->
    <div class="container-fluid">
      <div class="course-box" style="background-color: #51c5d6;">
        <div class="course-head">
          <h2><?php echo $data[0]['LessonName'] ?></h2>
        </div>
        <div class="course-content">
          <div>
            <img src="<?php echo URLROOT ?>/img/beginner.png" class="img-fluid course-img">
          </div>
          <div class="course-info">
            <div>
              <p><?php echo $data[0]['LessonDescription'] ?>
              </p>
            </div>
            <div>
              <a href="<?php if($_SESSION['loggedin'])echo URLROOT . "lessons/index/0"; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Start</button></a>
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
            <img src="<?php echo URLROOT ?>/img/inter.png" class="img-fluid course-img">
          </div>
          <div class="course-info">
            <div>
              <p class="lead"><?php echo $data[1]['LessonDescription'] ?>
              </p>
            </div>
            <div>
              <a href="<?php if($_SESSION['loggedin'])echo URLROOT . "lessons/index/1"; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Start</button></a>
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
            <img src="<?php echo URLROOT ?>/img/advanced.png" class="img-fluid course-img">
          </div>
          <div class="course-info">
            <div>
              <p class="lead"><?php echo $data[2]['LessonDescription'] ?>
              </p>
            </div>
            <div>
              <a href="<?php if($_SESSION['loggedin'])echo URLROOT . "lessons/index/2"; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Start</button></a>
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
    include APPROOT . "/resources/views/inc/footer.php";
     ?>
