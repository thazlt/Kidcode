<ul class="navbar-nav">
  <li>
    <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        LOG IN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" data-toggle="modal" data-target="#modal-signup" style="cursor: pointer;">Sign Up</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#modal-login" style="cursor: pointer;">Login</a>
        </div>

        <!-- Modal Sign Up-->
        <div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="modal-signup" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-signup">Create New Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="<?php echo URLROOT; ?>page/register" method="post">
                          <?php echo Form::token();?>
                            <div class="form-group">
                                <label for="uname">User Name</label>
                                <input type="text" class="form-control uname" name="username"  placeholder="Enter your Username">
                            </div>
                            <div class="form-group">
                                <label for="pw1">Password</label>
                                <input type="password" class="form-control pw1" name="password"  placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <label for="uname">Re-Enter Password</label>
                                <input type="password" class="form-control pw2" name="confirm_password"  placeholder="Renter your Password">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control email" name="email"  placeholder="Enter your Email">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" name="submit" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!--Modal Login-->
    <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-login">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="<?php echo URLROOT; ?>page/login" method="post">
                          <?php echo Form::token();?>
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" name="submit" type="submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </li>

</ul>
