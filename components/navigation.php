<?php session_start(); ?>
<nav>
  <div id="nav_start">
    <a href="/mms.csie.nuk.edu.tw/homepage.php">
      <img src="/mms.csie.nuk.edu.tw/src/images/logo-icon.png">
      <h1>高大資工會議管理系統</h1>
    </a>
  </div>
  <div id="nav_end">
    <img id="user_photo" src="/mms.csie.nuk.edu.tw/<?php echo $_SESSION["loginMember"]["頭貼"] ?>">
    <h2 id="user_name"><?php echo $_SESSION['loginMember']['姓名'] ?></h2>
    <div class="menuToggle"></div>
  </div>
</nav>
<ul id="nav_menu">
  <li><a href="/mms.csie.nuk.edu.tw/profile.php">
      <span class="material-icons">person_outline</span>
      <span>My Profile</span>
    </a></li>
  <li><a href="#">
      <span class="material-icons">notifications_active</span>
      <span>Notification</span>
    </a></li>
  <li><a href="/mms.csie.nuk.edu.tw/login.php">
      <span class="material-icons">logout</span>
      <span>Log out</span>
    </a></li>
</ul>
<?php
