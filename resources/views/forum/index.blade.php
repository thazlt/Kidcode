<?php
include APPROOT . '/resources/views/inc/header.blade.php';
//$curPage = NULL!=$_GET('page') ? $_GET('page'): 1;
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
                          <?php foreach ($data['Post'] as $post) {?>
                            <div class="single">
                                <div class="single-info">
                                    <a href="<?php echo URLROOT; ?>forum/post?PostID=<?php echo $post['PostID'] ?>" class="info-title"><?php echo $post['PostTitle']; ?></a>
                                    <div class="info-detail">
                                        <a href="" class="poster_avatar">
                                            <img src="<?php echo URLROOT; ?>resources/img/ava.png" alt="User Avatar">User
                                        </a>
                                        <span id="day"><?php echo substr($post['PostDate'],0,10); ?></span>
                                        <a class="tag" href=""><?php echo $post['Categories']; ?></a>
                                    </div>
                                </div>
                                <div class="single-box">
                                    <ul>
                                        <li>
                                            <p class="number"><?php echo $post['ViewCount']; ?></p>
                                            <span>View</span>
                                        </li>
                                        <li>
                                            <p class="number"><?php echo $post['CommentCount']; ?></p>
                                            <span>Replied</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                    </div>

                    <div class="pagination-area" style="margin-top: 50px; margin-bottom: 50px;">
                        <nav class="navigation pagination" role="navigation">
                            <div class="nav-links">
                              <!-- left arrow -->
                              <?php //if ($curPage > 1): ?>
                                <a href="" class="page-number"><i class="fas fa-angle-left"></i></a>
                                <a href="" class="page-number"><i class="fas fa-angle-double-left"></i></a>
                              <?php// endif; ?>
                                <!-- numbers -->
                                <a href="" class="page-number current">1</a>
                                <a href="" class="page-number">2</a>
                                <a href="" class="page-number">3</a>
                                <a href="" class="page-number">4</a>
                              <!-- right arrow -->
                                <a href="" class="page-number"><i class="fas fa-angle-right"></i></a>
                                <a href="" class="page-number"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside id="sidebar" class="sidebar">
                        <a href="<?php echo URLROOT; ?>forum/create_post" class="new_post" style="text-align: center;">
                            <span class="icon_edit"><i class="fas fa-edit"></i>New Post</span>
                        </a>
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
