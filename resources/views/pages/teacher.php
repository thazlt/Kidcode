<?php
include APPROOT . '/resources/views/inc/header.blade.php';
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
        <div class="col-lg-9">
          <div class="tab-content container-fluid" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel">
              <?php foreach ($data['Lessons'] as $key):?>
                <div class="card-lesson" style="--background:<?php echo $key['color'];?>; --color:white;">
                <div class="multi-button">
                  <button class="fa fa-heart"></button>
                  <button class="fa fa-comment"></button>
                  <button class="fa fa-share-alt"></button>
                  <button class="fa fa-trash" onclick="window.location.href='<?php echo URLROOT ?>teacher/deletelesson?lessonID=<?php echo $key['LessonID'];?>'"></button>
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
             <?php var_dump($data['Students']);?>
          </div>

          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum. Sed accusantium eligendi molestiae quo hic velit nobis et, tempora placeat ratione rem blanditiis voluptates vel ipsam? Facilis, earum!</p>
            <div class="contact-block">
                <div>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6307047611886!2d106.67998301526029!3d10.7629182623849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1c06f4e1dd%3A0x43900f1d4539a3d!2sHo%20Chi%20Minh%20City%20University%20of%20Science!5e0!3m2!1sen!2s!4v1579415840024!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div>
                  <form>
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" id="fullname" placeholder="Insert your full name here!">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="message">Message:</label>
                      <textarea class="form-control" rows="5" id="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
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
