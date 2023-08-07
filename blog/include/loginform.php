<form class="navbar-form navbar-left" action=<?php echo $login_url; ?> method="POST">
        <div class="form-group">
          	<input type="text" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="form-group">
          	<input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-default" name="submit">Sign In</button>

        <a href=<?php echo $register_url; ?> class="btn btn-default">Sign Up</a>
 </form>

