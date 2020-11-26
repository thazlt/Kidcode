<?php
include APPROOT . '/resources/views/inc/header.blade.php';
 ?>

    <div class="container">
      <div class="row">
        <div class="col-12 header">
          <?php
          echo "<h1>" . $data['ExerciseID'] . "/" . $data['ExerciseName'] . "</h1>";
          echo "<h3>Description: " . $data['ExerciseDescription'] . "</h3>";
           ?>
        </div>
      </div>

      <div class="row">
        <div class="col-12 origin-text">
          <p class="text"><?php echo $data['Code'] ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-12">

          <div class="col-xs-12 text-wrapper">
            <textarea id="textArea" rows="6" name="text" placeholder="Start Typing the Text here to start the game"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6" id="clock">
                <div class="timer-wrapper">
                  <i class="fa fa-clock-o"></i>
                  <p class="timer">00:00:00</p>
                </div>
              </div>
              <div class="col-lg-6">
                <button id="reset" class="btn btn-primary button">Try Again</button>
                <form style="float: left;margin-right: 10px;" class="" action="<?php echo URLROOT ?>lessons/exercisesubmit" method="get">
                  <?php echo Form::token();?>
                  <button class="btn btn-primary button" type="" name="button">DONE!!!!!</button>
                  <input type="hidden" name="lessonID" value="<?php echo $data['LessonID']; ?>">
                  <input type="hidden" name="exerciseID" value="<?php echo $data['ExerciseID']; ?>">
                  <input type="hidden" name="time" value="" id="input-time">
                  <input type="hidden" name="error" value="" id="input-error">
                </form>
              </div>
            </div>
        </div>
      </div>
      <iframe src="https://trinket.io/embed/python/076df01df8" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
    </div>
  </div>
<?php
include APPROOT . '/resources/views/inc/footer.blade.php';
?>
