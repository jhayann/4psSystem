<?php
require 'app/autoload.php';
 $db = new Database();
        $db = $db->connect();
        $member = new Member($db);
        $id= (int) $_GET['id'];
        $members= $member->read($id);
        $members=json_decode($members);
      

?>

<div class="card shadow">
    
    <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
                 <?php
                    if(isset($_SESSION['error']))
                    {
                        echo '
                        <div class="card bg-danger text-white shadow">
                            <div class="card-body">
                               ERROR
                                <div class="text-white-50 small"> '.$_SESSION['error'].'</div>
                            </div>
                        </div>
                        ';
                    } else if(isset($_SESSION['success']))
                    {
                        echo '
                        <div class="card bg-success text-white shadow" id ="notice">
                            <div class="card-body">
                               SUCCESS
                                <div class="text-white-50 small"> '.$_SESSION['success'].'</div>
                            </div>
                        </div>
                        ';
                    }
                    
                    unset($_SESSION['error']);
                unset($_SESSION['success']);
                    ?>
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Update member account:</h1>
              </div>
              <form class="user" method="POST" action="app/controller/MemberController.php">
                  <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : ''?>">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="firstname" id="exampleFirstName" value="<?= $members[0]->firstname?>" autocomplete="off"  pattern="[A-Za-z\s\.\-]{3,50}$" title="Input only letters" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastname" id="exampleLastName" value="<?= $members[0]->lastname?>" autocomplete="off"  pattern="[A-Za-z\s\.\-]{3,50}$" title="Input only letters" required>
                  </div>
                </div>
                  <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="middlename" id="examplemName" value="<?= $members[0]->middlename?>" autocomplete="off"  pattern="[A-Za-z\s\.]{1,50}$" title="Input only letters" required>
                  </div>
                  <div class="col-sm-6">
                     
                        <select name="gender" class="form-control " required>
                          <option value="Male" <?= ($members[0]->gender == "Male") ? 'selected':'' ?>>Male</option>
                            <option value="Female" <?= ($members[0]->gender == "Female") ? 'selected':'' ?>>Female</option>
                          </select>
                  </div>
                </div>
                <div class="form-group">
                    <select name="civil" class="form-control ">
                          <option value="Single" <?= ($members[0]->civil_status == "Single") ? 'selected':'' ?>>Single</option>
                            <option value="Married" <?= ($members[0]->civil_status == "Married") ? 'selected':'' ?>>Married</option>
                        <option value="Widowed" <?= ($members[0]->civil_status == "Widowed  ") ? 'selected':'' ?>>Widowed</option>
                          </select>
                </div>
                <div class="form-group">
                  <select name="barrio" class="form-control ">
                          <option value="Sta. Rita" <?= ($members[0]->barrio == "Sta. Rita") ? 'selected':'' ?>>Sta. Rita Barangay 188</option>
                            <option value="Runez" <?= ($members[0]->barrio == "Runez") ? 'selected':'' ?>>Runez Barangay 188</option>
                       <option value="Sta. Rita Bukid" <?= ($members[0]->barrio == "Sta. Rita Bukid") ? 'selected':'' ?>>Sta. Rita Bukid Barangay 188</option>
                       <option value="Phase 12" <?= ($members[0]->barrio == "Phase 12") ? 'selected':'' ?>>Phase 12 Barangay 188</option>
                       <option value="Pabahay" <?= ($members[0]->barrio == "Pabahay") ? 'selected':'' ?>>Pabahay Barangay 188</option>
                          </select>
                    <hr>
                  </div>
                <button type="submit" name="updatemember" class="btn btn-success btn-user btn-block">
                  Update Account
                </button>            
              </form>
                <br>
                <form class="user" method="post" action="app/controller/MemberController.php">
                <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : ''?>">
                <button type="submit" name="updateMemberStatus" class="btn btn-danger btn-user btn-block">
                  Inactive Account
                </button>
                </form>
              <hr>
              
            </div>
          </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
   
  $('#notice').fadeIn('slow', function () {
    $(this).delay(5000).fadeOut('slow');

});
    
})
</script>