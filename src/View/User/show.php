<link rel="stylesheet" type="text/css" href="/PiePHP/webroot/css/userShow.css">

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h4><?= $_SESSION['username'] ?>'s profile</h4>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <form method="POST">
                <div class="form-group row">
                  <label class="col-4 col-form-label">Username</label> 
                  <div class="col-8">
                    <input name="profileUname" placeholder=<?= $_SESSION['username'] ?> class="form-control here" type="text">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-4 col-form-label">First Name</label> 
                  <div class="col-8">
                    <input name="profileFname" placeholder=<?= $_SESSION['first_name'] ?> class="form-control here" type="text">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-4 col-form-label">Last Name</label> 
                  <div class="col-8">
                    <input name="profileLname" placeholder=<?= $_SESSION['last_name'] ?> class="form-control here" type="text">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-4 col-form-label">Email</label> 
                  <div class="col-8">
                    <input name="profileMail" placeholder=<?= $_SESSION['email'] ?> class="form-control here" type="text">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-4 col-form-label">New Password</label> 
                  <div class="col-8">
                    <input name="profilePass" placeholder="Change your Password" class="form-control here" type="password">
                  </div>
                </div> 

                <div class="form-group row">
                  <div class="offset-4 col-8">
                    <button name="profileSubmit" type="submit" class="btn btn-primary">Update My Profile</button>
                  </div>
                </div>
              </form>

              <form method="POST">
                <div class="form-group row">
                  <div class="offset-4 col-8">
                    <button onclick='alert("Account deleted successfully")' name="deleteSubmit" type="submit" class="btn btn-danger">Delete My Account</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>