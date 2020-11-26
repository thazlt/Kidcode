<?php
include APPROOT . '/resources/views/inc/header.blade.php';
$i=1;
 ?>
    <div class="banner-faq">
        <div class="container-fluid">
            <h1 class="forum-title">Manage your lessons</h1>
            <p>Teachers can be able to edit their own lessons</p>
        </div>
    </div>
    <div class="container">
      <div class="row team-info">
        <div class="col-lg-3">

            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab">My lessons</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="student-tab" data-toggle="tab" href="#student" role="tab">My students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab">Upload lesson</a>
              </li>
            </ul>

        </div>
        <!-- /.col-md-4 -->
        <script>
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
        </script>
        <div class="col-lg-9">
          <div class="tab-content container-fluid" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel">
              <?php foreach ($data['Lessons'] as $key):?>
                <div class="card-lesson" style="--background:<?php echo $key['color'];?>; --color:white;">
                <div class="multi-button">
                  <button class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Add Exercise!"></button>
                  <button class="fa fa-cog" data-toggle="tooltip" data-placement="top" title="Edit Exercise!" onclick="window.location.href='<?php echo URLROOT . "lessons\index\?lessonID=". $key['LessonID'];?>'"></button>
                  <button class="fa fa-edit" data-toggle="tooltip" data-placement="right" title="Edit Lesson!"></button>
                  <button class="fa fa-trash" data-toggle="tooltip" data-placement="right" title="Delete Lesson!" onclick="window.location.href='<?php echo URLROOT ?>teacher/deletelesson?lessonID=<?php echo $key['LessonID'];?>'"></button>
                </div>
                <div class="container-teacher">
                  <div class="course-head">
                    <h2 style="color: white !important;"><?php echo $key['LessonName'];?></h2>
                  </div>
                  <div class="course-content">
                    <div>
                    <img src="<?php echo URLROOT ?>/resources/img/<?php echo $key['logo'] ?>" class="img-fluid course-img">
                   </div>
                   <div class="course-info">
                     <div>
                       <p><?php echo $key['LessonDescription'];?></p>
                     </div>
                     <div>
                     <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/index/?lessonID=". $key['LessonID']; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Start</button></a>
                     <a href="<?php if(session()->get('loggedin'))echo URLROOT . "lessons/quiz/?lessonID=" . $key['LessonID']; else echo '#'; ?>"><button type="button" class="btn btn-secondary btn-lg" name="button">Take Quiz</button></a>
                     </div>
                   </div>
                  </div>
                 </div>
              </div>
              <?php endforeach;?>
            </div>

          <div class="tab-pane fade" id="student" role="tabpanel">
            <h1>My list of students:</h1>
            <form class="form-inline adding-form">
              <div class="form-group mb-2">
                <label for="add" class="sr-only"></label>
                <input type="text" readonly class="form-control-plaintext" id="add" value="Add your student here :">
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <label for="inputStudentID" class="sr-only">StudentID</label>
                <input type="StudentID" class="form-control" id="inputStudentID" placeholder="Student ID">
              </div>
              <button type="submit" class="btn-add-students btn btn-secondary btn-lg">Add</button>
            </form>
            <div class="table-responsive-sm">
            <table class="content-table table table-bordered">
            <thead>
              <tr>
             <th>No.</th>
             <th>ID</th>
             <th>Name</th>
             <th>Email</th>
             <th>Lessons</th>
             </tr>
             </thead>
            <tbody>
              <?php foreach($data['Students'] as $key):?>
                <tr <?php if ($i%2==0) echo "class='active-row'"?>>
                <td><?php echo $i?></td>
                <td><?php echo $key['UserID']?></td>
                <td><?php echo $key['USERNAME']?></td>
                <td><?php echo $key['EMAIL']?></td>
                <td><?php echo str_replace(",", ", ", $key['Lessons'])?></td>
              </tr>
              <?php $i++; endforeach;?>
            </tbody>
          </table>
          </div>
          </div>
          
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <form action="<?php echo URLROOT . "teacher/uploadLesson";?>">
            </form>
          </div>

            </div>


        </div>
      </div>
        <!-- /.col-md-8 -->
    </div>

    <!---->



<?php
    include APPROOT . "/resources/views/inc/footer.blade.php";
?>

