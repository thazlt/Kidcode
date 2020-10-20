<?php include APPROOT.'/views/inc/header.php';?>
<div class="profile" style="background-color:#a8ce50cc;">
  <div class="profile-container">
    <div class="row">
      <div class="col-lg-4">
        <div class="profile-info">
          <div class="profile-info-content">
            <h3><?php echo $data['user']['USERNAME'] ?></h3>
            <img class="avatar" src="<?php echo URLROOT ?>img/defaultava.png" alt="avatar">
            <h3><?php echo $data['user']['EMAIL'] ?></h3>
          </div>
        </div>
        <div class="learning-content">
          <div class="lessons">
            <h5>Lessons <br> Completed</h5>
            <p><?php echo $data['lessoncom']; ?></p>
          </div>
          <div class="projects">
            <h5>Exercises <br> Completed</h5>
            <p><?php echo $data['exercisecom']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="my-progress">
          <?php if ($data['exercisecom'] == 0): ?>
            <p>NO LESSONS STARTED :(</p>
          <?php endif; ?>
          <?php if ($data['exercisecom'] > 0): ?>
            <p>History</p>
            <table class="table">
              <tr>
                <th>Lesson</th>
                <th>Exercise</th>
                <th>Score</th>
                <th>Time</th>
                <th>Date</th>
              </tr>
              <?php foreach ($data['progress'] as $key): ?>
                <tr>
                  <td><?php echo $key['LessonName'] ?></td>
                  <td><?php echo $key['ExerciseName'] ?></td>
                  <td><?php echo $key['points'] ?></td>
                  <td><?php echo $key['TimeFinish'] ?></td>
                  <td><?php echo substr($key['date'], 0, 10) ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include APPROOT.'/views/inc/footer.php'; ?>
