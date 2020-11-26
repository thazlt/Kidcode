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
                <a class="nav-link" id="lesson-tab" data-toggle="tab" href="#lesson" role="tab">Create lesson</a>
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
                  <button class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Add Exercise!" onclick="window.location.href='<?php echo URLROOT . 'teacher/addexercise?lessonID='. $key['LessonID'];?>'"></button>
                  <button class="fa fa-cog" data-toggle="tooltip" data-placement="top" title="Edit Exercise!" onclick="window.location.href='<?php echo URLROOT . 'lessons/index?lessonID='. $key['LessonID'];?>'"></button>
                  <button class="fa fa-edit" data-toggle="tooltip" data-placement="right" title="Edit Lesson!"onclick="window.location.href='<?php echo URLROOT . 'teacher/editlesson?lessonID='. $key['LessonID'];?>'"></button>
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
          
          <div class="tab-pane fade" id="lesson" role="tabpanel" aria-labelledby="lesson-tab">
            <form action="<?php echo URLROOT . "teacher/addlesson";?>" method="post">
            <?php echo Form::token(); ?>
            <input type="hidden" name="Teacher" value="<?php echo session()->get('username');?>">
                <article>
                  <div class="single-post-content">
                    <div class="form-group">
                      <label for="Title">Title</label>
                        <input type="text" id="title" class="text-field" placeholder="Your title ..." name="LessonName" autocomplete="off" maxlength="200">
                        </div>
                        <div class="row">
                          <div class="col-lg">
                            <div class="form-group">
                              <label>Categories: </label>
                                <select name="Categories" id="categories" class="form-control">
                                  <option value="General">General</option>
                                  <option value="HTML">HTML</option>
                                  <option value="CSS">CSS</option>
                                  <option value="PYTHON">PYTHON</option>
                                  <option value="JAVASCRIPT">JAVASCRIPT</option>
                                  <option value="C++">C++</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg">
                              <div class="form-group">
                                <label>Background Color: </label>
                                <select name="Color" id="sort" class="form-control">
                                  <option value="#1fa67a" style="background-color:#1fa67a; color:white;">#1fa67a</option>
                                  <option value="#ee6c4b" style="background-color:#ee6c4b; color:white;">#ee6c4b</option>
                                  <option value="#facf0f"  style="background-color:#facf0f; color:white;">#facf0f</option>
                                  <option value="#24c6dc" style="background-color:#24c6dc; color:white;">#24c6dc</option>
                                  <option value="#03afe4" style="background-color:#03afe4; color:white;">#03afe4</option>
                                  <option value="#4f94df" style="background-color:#4f94df; color:white;">#4f94df</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="single-post-content" style="padding: 0px 15px; margin-bottom: 0;">
                            <br>
                            <textarea name="LessonDescription" id="editor1" cols="60" rows="13" class="post-content" placeholder="Enter text here ..."></textarea>
                          </div>
                          <div class="form-group">
                              <div class="checkbox">
                                <label data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                  <input type="checkbox"/>Quiz ?
                                </label>
                              </div>
                            </div>
                            <div id="collapseOne" aria-expanded="false" class="collapse">
                              <div class="well">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe ut molestias eius, nam neque esse eos modi corrupti harum fugit, hic recusandae praesentium, minima ipsa eligendi architecto at! Culpa, explicabo.</div>
                            </div>
                          <button class="btn btn-primary button new_post" style="text-align: center; width:100%" type="" name="button"><span class="icon_edit"><i class="fa fa-edit"></i>Create Lesson</span></button>
                          <div class="container"><br/>

                  </div>
                </article>
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

