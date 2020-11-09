<?php
include APPROOT . "/resources/views/inc/header.blade.php";
$colors =['#51c5d6','rgb(238, 108, 75)','rgba(250, 207, 15)'];
 ?>
   <!-- Info -->
    <div class="container-fluid">
      <?php if (!session()->get('loggedin')): ?>
        <div class="course-box">
            <h3><a data-toggle="modal" data-target="#modal-login" style="cursor: pointer; color: #01c5c4cf;">Login</a> or <a data-toggle="modal" data-target="#modal-signup" style="cursor: pointer; color: #01c5c4cf;">Sign up</a> to view lessons</h3>
        </div>
      <?php endif; ?>

      <?php foreach ($data as $lesson): ?>
        <div class="course-box" style="background-color: <?php $colorNum = (int)($lesson['LessonID']%3); echo $colors[$colorNum]; ?>;">
          <div class="course-head">
            <h2><?php echo $lesson['LessonName'] ?></h2>
          </div>
          <div class="course-content">
            <div>
              <img src="<?php echo URLROOT ?>/resources/img/<?php echo $lesson['logo'] ?>" class="img-fluid course-img">
            </div>
            <div class="course-info">
              <div>
                <p><?php echo $lesson['LessonDescription'] ?>
                </p>
              </div>
              <div>
                <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/index/?lessonID=". $lesson['LessonID']; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Start</button></a>
                <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/quiz/?lessonID=" . $lesson['LessonID']; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Take Quiz</button></a>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
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
