<?php
include APPROOT . '/resources/views/inc/header.blade.php';
 ?>
    <div class="banner-forum">
        <div class="container-fluid">
            <h1 class="forum-title">Discussion - Questions and Answers</h1>
        </div>
    </div>
    <div class="cover-forum">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left">
                        <div class="left-list">
                            <div class="single-post">
                              <form class="" action="<?php echo URLROOT; ?>forum/add_post" method="post">
                                <?php echo Form::token(); ?>
                                <input type="hidden" name="PostAuthor" value="<?php echo session()->get('username');?>">
                                <article>
                                    <div class="single-post-content">
                                        <div class="form-group">
                                            <label for="Title">Title</label>
                                            <input type="text" id="title" class="text-field" placeholder="Your title ..." name="PostTitle" autocomplete="off" maxlength="200">
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
                                                    <label>Type: </label>
                                                    <select name="Type" id="sort" class="form-control">
                                                        <option value="Question">Question</option>
                                                        <option value="Relax">Relax</option>
                                                        <option value="Sharing">Sharing</option>
                                                        <option value="Discus">Discus</option>
                                                        <option value="News">News</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg">
                                                <div class="form-group">
                                                    <label>ViewOption</label>
                                                    <select name="Public" id="public" class="form-control">
                                                        <option value="1">Public</option>
                                                        <option value="0">Private</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-post-content" style="padding: 0px 15px; margin-bottom: 0;">
                                        <br>
                                        <textarea name="Content" id="editor1" cols="60" rows="13" class="post-content" placeholder="Enter text here ..."></textarea>
                                        <script>
                                          CKEDITOR.replace('editor1');
                                        </script>
                                    </div>
                                    <button class="btn btn-primary button new_post" style="text-align: center; width:100%" type="" name="button"><span class="icon_edit"><i class="fas fa-edit"></i>Create Post</span></button>
                                </article>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside id="sidebar" class="sidebar">
                        <div class="content-card">
                            <div class="card-title forum">
                                <h4>Search</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="get">
                                    <div class="search">
                                        <input type="text" name="search" placeholder="Search post here...">
                                        <button type="submit" class="search_btn">
                                            <span class="icon_search">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="forum-categories content-card">
                            <div class="card-title forum">
                                <h4>Categories</h4>
                            </div>
                            <div class="collapsible-content">
                                <ul class="card-content">
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>HTML
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>CSS
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>PYTHON
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>JAVASCRIPT
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=""><span class="icon_chevron"><i class="fas fa-chevron-right"></i></span>C++
                                        <span class="item-count">10</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <?php
    include APPROOT . '/resources/views/inc/footer.blade.php';
    ?>
