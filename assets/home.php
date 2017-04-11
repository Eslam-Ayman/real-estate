<?php 

   $nav = false;
  session_start();
  if(isset($_SESSION['username']))
  {
    $nav = true;
  }

 ?>


<!--   *******************     third section    ************************  -->
<div class="container-fluid">
  
  <section class="row home-two">
    <div class="col-md-6 home-form">
			<h1>Post proj</h1>
			<h4>~~~~~~ :: ~~~~~~</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br>
					tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
			<div id="contactme" class="home-contact ">
          <form action="#" method="get">
          
            <input type="text" name="NAME" placeholder="NAME">
            <input type="text" name="EMAIL ADDRESS" placeholder="EMAIL ADDRESS">
            <label>MESSAGE</label>
            <textarea wrap='off'></textarea>
            <input type="submit" value="Submit">
    
        </form>
      </div>
    <!-- *******   posts    ********* -->
    <aside class="col-md-6">
         <fieldset>
          <legend>&nbsp; All Projects &nbsp;</legend>
         </fieldset>
         <div class="container-fluid">
           <div class="row news-row">
             <div class="col-xs-4 " style="background-image: url('assets/img/man-1.jpg');background-size:100% 100%;height: 75px;"></div>
             <div class="col-xs-8 ">
              <b>Project Name :</b> mosque <br/>
              <b>discription :</b> need to contruct to bulding mosque...
              <h6>13,2016 march</h6>
             </div>
           </div>
           <div class="row news-row">
             <div class="col-xs-4 " style="background-image: url('assets/img/man-2.jpg');background-size:100% 100%;height: 75px;"></div>
             <div class="col-xs-8 ">
              <b>Project Name :</b> mosque <br/>
              <b>discription :</b> need to contruct to bulding mosque...
              <h6>13,2016 march</h6>
             </div>
           </div>
           <div class="row news-row">
             <div class="col-xs-4 " style="background-image: url('assets/img/man-3.jpg');background-size:100% 100%;height: 75px;"></div>
             <div class="col-xs-8 ">
              <b>Project Name :</b> mosque <br/>
              <b>discription :</b> need to contruct to bulding mosque...
              <h6>13,2016 march</h6>
             </div>
           </div>
           <div class="row news-row">
             <div class="col-xs-4 " style="background-image: url('assets/img/man-4.jpg');background-size:100% 100%;height: 75px;"></div>
             <div class="col-xs-8 ">
              <b>Project Name :</b> mosque <br/>
              <b>discription :</b> need to contruct to bulding mosque...
              <h6>13,2016 march</h6>
             </div>
           </div>
           <div class="row news-row">
             <div class="col-xs-4 " style="background-image: url('assets/img/man-5.jpg');background-size:100% 100%;height: 75px;"></div>
             <div class="col-xs-8 ">
              <b>Project Name :</b> mosque <br/>
              <b>discription :</b> need to contruct to bulding mosque...
              <h6>13,2016 march</h6>
             </div>
           </div>
           <div class="row news-row">
             <a href="#" class="col-xs-6 col-xs-push-3" align="center">Read More</a>
           </div>
         </div>
      </aside>
  </section>
  
<!--   *******************     sign in model    ************************  -->
  <div class="modal fade bs-example-modal-lg" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="signin">sign in</h4>
      </div>
      <div class="modal-body">
        <div class="wrapper" style="background-color: rgb(0, 111, 113); width: 100%; height: 80vh;">
          <div class="container-fluid">
              <div class="row sign">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
                      <img src="assets/img/ribbon.png" alt="logo" style="height: 140px;width: 250px;margin: auto;margin-bottom: -14px;"
                       class="col-sm-offset-2 img-responsive ribbon">
                       <fieldset>
                          <legend></legend>
                          <img src="assets/img/tasktracker-logo.png" alt="logo" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 img-responsive">

                        <form class="container-fluid" method="post" action="">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input name="email" type="text" class="form-control" 
                                         id="exampleInputEmail1" placeholder="example@example.com" autofocus>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input  name="password" type="password" class="form-control"
                                          id="exampleInputPassword1" placeholder="Password">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2">Checkbox</label>
                            <div class="col-sm-10">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox"> let me signin
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                              <button  name="submit" type="submit" value="login" class="btn btn-primary col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">Sign IN</button>
                          </div>
                        </form>
                      </fieldset>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--   *******************     sign up model    ************************  -->
  <div class="modal fade bs-example-modal-lg" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="signup">sign Up</h4>
      </div>
      <div class="modal-body">
        <div class="wrapper" style="background-color: rgb(0, 111, 113); width: 100%; height: 130vh;">
          <div class="container-fluid">
              <div class="row sign">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
                      <img src="assets/img/ribbon.png" alt="logo" style="height: 140px;width: 250px;margin: auto;margin-bottom: -14px;"
                       class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 img-responsive ribbon">
                       <fieldset>
                          <legend></legend>
                          <img src="assets/img/tasktracker-logo.png" alt="logo" class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 img-responsive">

                        <form class="container-fluid" method="post" action="">
                          <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input  type="text" class="form-control" id="username1"
                            name="username" placeholder="spiderman">
                </div>
              </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input  type="text" class="form-control" id="email1" 
                                        name="email" placeholder="example@example.com"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                      <input  type="password" class="form-control" id="password1"
                                            name="password" placeholder="Password">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Confirm password</label>
                  <div class="col-sm-9">
                    <input  type="password" class="form-control" id="confirm_password"
                                     name="confirm_password" placeholder="Confirm_password"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Birth Date</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="Birth" 
                                       name="birthdate" placeholder="Birth_Date"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Phone Number</label>
                  <div class="col-sm-9">
                    <input  type="number" class="form-control" id="Phone"
                                        name="phone" placeholder="0123456789"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Country</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="Country" 
                                       name="country" placeholder="England"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2">Checkbox</label>
                  <div class="col-sm-8 col-sm-offset-1">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> police
                      </label>
                    </div>
                  </div>
                </div>
                <img src="assets/img/captcha.jpg" style="width: 200; height: 50; border: 0;">
                <input type="text" name="captcha" placeholder="type"/>
                <div class="form-group row">
                    <button  name="submit" type="submit" value="login" class="btn btn-primary col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">Sign IN</button>
                </div>
                        </form>
                      </fieldset>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!--   *******************     Contact us section    ************************  -->
		<!-- <section id="contactme" class="home-contact row">
			<h1 id="ID">CONTACT ME</h1>
			<h4>~~~~~~ :: ~~~~~~</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
					<br>ut labore et dolore magna aliqua.</p>
			<form action="#" method="get">
				
					<input type="text" name="NAME" placeholder="NAME">
					<input type="text" name="EMAIL ADDRESS" placeholder="EMAIL ADDRESS">
					<label>MESSAGE</label>
					<textarea></textarea>
					<input type="submit" value="Submit">
	
			</form>
			  <div class="col-xs-12">
			    <div id="T-a">
          <a href="#"><i class="fa fa-facebook fa-2x" id="T-i1"></i></a>
          <a href="#"><i class="fa fa-twitter fa-2x" id="T-i2"></i></a>
          <a href="#"><i class="fa fa-google-plus fa-2x" id="T-i3"></i></a>
          <a href="#"><i class="fa fa-instagram fa-2x" id="T-i4"></i></a>
        </div>
        <span>&copy; All rights are resieved for TASKS 2016</span>
      </div>
		</section> -->

  


  <!--<div class="row T-FOOTER text-center">
    <div id="T-a">
      <a href="#"><i class="fa fa-facebook fa-2x" id="T-i1"></i></a>
      <a href="#"><i class="fa fa-twitter fa-2x" id="T-i2"></i></a>
      <a href="#"><i class="fa fa-google-plus fa-2x" id="T-i3"></i></a>
      <a href="#"><i class="fa fa-instagram fa-2x" id="T-i4"></i></a>
    </div>
    <span>&copy; All rights are resieved for TASKS 2016</span>
  </div>-->

</div><!--  end of the container  -->


  <!--    details   section    -->
    <section class="jumbotron touch text-center" id="touch">
      <div class="container">
        <h2>Git in touch</h2>
        <div class="row">
          <div class="col-xs-12">
            <a href="#" class="col-xs-btn-lg"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
            <a href="#" class="col-xs-btn-lg"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></i></a>
            <a href="#" class="col-xs-btn-lg"><i class=" fa fa-google-plus fa-2x" aria-hidden="true"></i></a>
            <a href="#" class="col-xs-btn-lg"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></i></a>
          </div>
          
          <small class="col-xs-12 lead">Subscribe to our newsletter to stay update with what is new</small>
          
          <form class="col-xs-8 col-xs-offset-2 ">
                <div class="form-group">
                  <input type="email" class="form-control input-lg" id="exampleInputEmail1" placeholder="Email Address">
                </div>
                <button type="submit" class="btn btn-default btn-lg">Subscribe</button>
          </form>
        </div>
      </div>
    </section>
    <!--    Footer   section    -->
    <footer class="jumbotron text-center footer">
        <small class="lead">Cssauther.com &copy; 2014 All Rights Reserved</small>
    </footer>
