<?php 
    function set_token() {
    $_SESSION['token'] = md5(microtime(true));
  }
    if(!isset($_SESSION['token']) || $_SESSION['token']=='') {
      set_token();
    }
    if(isset($_POST["search"]) ){
      unset($_SESSION['token']);
      
      $Name=$_POST["search"];
      $select_user = $sql_qry->query("SELECT * from `使用者` where `姓名` like '%{$Name}%'");
      $count_user = $sql_qry->query("SELECT count(*) from `使用者` where `姓名` like '%{$Name}%'");
    
      $select_meeting = $sql_qry->query("SELECT * from `會議` where `會議名稱` like '%{$Name}%'");
      $count_meeting = $sql_qry->query("SELECT count(*) from `會議` where `會議名稱` like '%{$Name}%'");
      
		}else{ 
  ?>
    
		
	<?php } ?>
