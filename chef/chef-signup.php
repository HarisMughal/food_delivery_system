<?php

include('header.php');
require_once('../model/conn.php');
include('chef-controller.php');
?>

    <div class="container-fluid">
        <div class="row">
            <div class="d-none d-md-block col-md-6 col-lg-7 a">
              
                <div>
                  <h1 class="text-center animated bounceInDown left-heading">Chef Sign Up</h1>
                </div>

                <div class="text-light px-5 mt-3 text-center">
                  <p class="left-para type-animation">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur maxime sint molestiae sapiente est perspiciatis?</p>
                </div>

                <div class="text-light px-5 mt-3 text-center">
                  <h4 class="left-para type-animation"><a href="../customer/customer-signup.php">Sign Up As Customer??</a></h4>
                </div>
              
            </div>
            
            <div class="col-sm-12 col-md-6 col-lg-5 b">
              <form action="#" method="post" class="ml-2 form-class">
                <ul class="text-center">
                  <div>
                    <i class="signup-icon ml-4 mb-1 animated heartBeat display-4 fas fa-user-plus"></i>
                  </div>
                </ul>

                <div class="my-4 d-flex justify-content-around icons">
                  <div class="row">
                      <a href="#">
                        <div class="mx-3 animated bounceInDown border">
                          <i class="px-1 fb-icon fab fa-facebook-f"></i> 
                        </div>
                      </a>
                      
                      <a href="#">
                        <div class="border animated bounceInDown">
                          <i class="google-icon fab fa-google"></i> 
                        </div> 
                      </a>
                      
                      <a href="#">
                        <div class="mx-3 animated bounceInDown border">
                          <i class=" in-icon fab fa-linkedin-in"></i> 
                        </div> 
                      </a>
                  </div>
                </div>

                <div class="text-center mt-2 signup-with">
                    <p>...or signup with</p>
                  </div>

                  <div class="form-group">
                  <label class="label-color labell" for="username">Name</label>
                  <div class=" d-flex">
                    <i class="fas fa-user"></i>
                    <input type="text" class="email-input form-control" name="name" placeholder="Enter name" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-color labell" for="username">Email</label>
                  <div class=" d-flex">
                    <i class="fas fa-user"></i>
                    <input type="email" class="email-input form-control" name="email" placeholder="Enter email" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-color labell" for="phone">Phone No</label>
    
                  <div class="d-flex">
                    <i class="fas fa-mobile"></i>
                    <input type="text" class="phone-input form-control" name="phone" data-inputmask="'mask': '+\\92\\ 399-99999999'" placeholder="+92 3XX-XXXXXXX" required=""  type = "number" maxlength = "15" required />
                    
                  </div>
                </div>



                <div class="form-group">
                  <label class="label-color labell" for="address">Address</label>
    
                  <div class="d-flex">
                    <i class="fa fa-lock"></i>
                    <input type="text" class="password-input form-control" name="address" placeholder="Enter Address" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-color labell" for="password">Password</label>
    
                  <div class="d-flex">
                    <i class="fa fa-lock"></i>
                    <input type="password" class="password-input form-control" name="password" placeholder="Enter password" required/>
                  </div>
                </div>

                <div class="form-group">
                            <!-- <label for="category-name">Categories </label> -->
                            <select class="form-control" name="cat_id" required>
                                <option selected value="default">Select Category*</option>  
                                <?php
                                    $control = new Controller();
                                    $control->get_cat();
                                ?>
                            </select>
                        </div>
<!--                 
                <div class="d-flex mt-4">
                  <div class="form-check-inline mb-3">
                  <label class="form-check-label radioContainer"><span class="male font-weight-bold">Male</span> 
                    <input type="radio" class="form-check-input" name="optradio" value="male" required>
                    <span class="circle"></span>
                  </label>
                  </div>
                <div class="form-check-inline mb-3">
                  <label class="form-check-label radioContainer" ><span class="female font-weight-bold">Female</span>
                    <input type="radio" class="form-check-input" name="optradio" value="female">
                    <span class="mx-3 circle"></span>
                  </label>
                </div>
               
              </div> -->

              <div class="form-group">
                      <div class="d-flex">
                      Select image to upload:
                        <input type="file" name="fileupload" id="fileToUpload">
                        
                    </div>
                </div>  
                
              <div class="d-flex justify-content-center mt-4 signup-button">
                <button type="submit" name="signup" class="px-4 change-button btn btn-block">Sign Up</button>  
              </div>
              <div class="mt-4 text-center already-account">
               <p class="d-inline signup ">Already have an account?</p> <a href="chef-signin.php" class="font-weight-bold login">SignIn</a> 
              </div>
            </form>
          </div>

        </div>

        <div class="modal fade" id="popUpWindow">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>

              
<?php

  if(isset($_POST['signup']))
  {
    if($_POST['cat_id'] == "default")
    {
        ?>
        <script>
            alert("Select Category");
            window.open("chef-signup.php","_self")
        </script>
    <?php
    }
    else
    {
      $control = new Controller();
      $control->chef_signup();
    }
    
  }

    
?>
  
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
      integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
      crossorigin="anonymous"
    ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

    <script>
      $(":input").inputmask();
  
     </script>
</body>
</html>