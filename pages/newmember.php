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
                <h1 class="h4 text-gray-900 mb-4">Enter new member:</h1>
              </div>
              <form class="user" method="POST" action="app/controller/MemberController.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="firstname" id="exampleFirstName" placeholder="First Name" autocomplete="off"  pattern="[A-Za-z\s\.\-]{3,50}$" title="Input only letters" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastname" id="exampleLastName" placeholder="Last Name" autocomplete="off"  pattern="[A-Za-z\s\.\-]{3,50}$" title="Input only letters" required>
                  </div>
                </div>
                  <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="middlename" id="examplemName" placeholder="Middle name" autocomplete="off"  pattern="[A-Za-z\s\.]{1,50}$" title="Input only letters" required>
                  </div>
                  <div class="col-sm-6">
                     
                        <select name="gender" class="form-control " required>
                          <option value="MALE">Male</option>
                            <option value="FEMALE">Female</option>
                          </select>
                  </div>
                </div>
                <div class="form-group">
                    <select name="civil" class="form-control ">
                          <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                          </select>
                </div>
                <div class="form-group">
                  <select name="barrio" class="form-control ">
                          <option value="Sta. Rita">Sta. Rita Barangay 188</option>
                            <option value="Runez">Runez Barangay 188</option>
                       <option value="Sta. Rita Bukid">Sta. Rita Bukid Barangay 188</option>
                       <option value="Phase 12">Phase 12 Barangay 188</option>
                       <option value="Pabahay">Pabahay Barangay 188</option>
                          </select>
                    <hr>
                  </div>
                <button type="submit" name="newmember" class="btn btn-primary btn-user btn-block">
                  Register Account
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