<?php
include APPROOT . "/resources/views/inc/header.blade.php";
$colors =['#51c5d6','rgb(238, 108, 75)','rgba(250, 207, 15)'];
$curPage = $data['curPage'];
$maxPage = $data['maxPage'];
 ?>
   <!-- Info -->
    <div class="container-fluid">
      <?php if (!session()->get('loggedin')): ?>
        <div class="course-box">
            <h3><a data-toggle="modal" data-target="#modal-login" style="cursor: pointer; color: #01c5c4cf;">Login</a> or <a data-toggle="modal" data-target="#modal-signup" style="cursor: pointer; color: #01c5c4cf;">Sign up</a> to view lessons</h3>
        </div>
      <?php endif; ?>

      <?php foreach ($data['lessons'] as $lesson): ?>
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
                <?php if (session()->get('loggedin')): ?>
                  <h3>Progress: </h3>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $lesson['Progress'] ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="pagination-area" style="margin-top: 50px; margin-bottom: 50px;">
          <nav class="navigation pagination" role="navigation">
              <div class="nav-links">
                <!-- left arrow -->
                <?php if ($curPage > 1): ?>
                  <a href="<?php echo URLROOT; ?>page/lessons?page=1" class="page-number"><i class="fa fa-angle-double-left"></i></a>
                  <a href="<?php echo URLROOT; ?>page/lessons?page=<?php echo $curPage-1; ?>" class="page-number"><i class="fa fa-angle-left"></i></a>
                <?php endif; ?>
                  <!-- numbers -->
                  <?php for ($i=1; $i<=$maxPage; $i++): ?>
                    <a href="<?php echo URLROOT; ?>page/lessons?page=<?php echo $i; ?>" class="page-number <?php echo $i==$curPage?"current":""; ?>"><?php echo $i; ?></a>
                  <?php endfor; ?>
                <!-- right arrow -->
                <?php if ($curPage!=$maxPage): ?>
                  <a href="<?php echo URLROOT; ?>page/lessons?page=<?php echo $curPage+1; ?>" class="page-number"><i class="fa fa-angle-right"></i></a>
                  <a href="<?php echo URLROOT; ?>page/lessons?page=<?php echo $maxPage; ?>" class="page-number"><i class="fa fa-angle-double-right"></i></a>
                <?php endif; ?>
              </div>
          </nav>
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
