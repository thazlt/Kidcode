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
                <ul class="nav nav-pills flex-column" id="myTab">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" href="#home">Back to My lessons</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9" >
            <div class="container-fluid" id="exercise">
            <form action="<?php echo URLROOT . "teacher/addlesson";?>" method="post">
            <?php echo Form::token(); ?>
            <input type="hidden" name="Teacher" value="<?php echo session()->get('username');?>">
                <article>
                  <div class="single-post-content">
                    <div class="form-group">
                      <label for="Title">Title</label>
                        <input type="text" id="title" class="text-field" placeholder="Your NEW title ..." name="LessonName" autocomplete="off" maxlength="200">
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
                          <button class="btn btn-primary button new_post" style="text-align: center; width:100%" type="" name="button"><span class="icon_edit"><i class="fa fa-edit"></i>Edit Lesson</span></button>
                    
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
