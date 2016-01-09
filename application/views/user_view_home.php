<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- content -->


    <div>
    <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <div class="bs-example bs-example-tabs">
                <ul id="myTab" class="nav nav-tabs">
                  <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
                  <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
                  <li class=""><a href="#why" data-toggle="tab">Why?</a></li>
                </ul>
            </div>
          <div class="modal-body">
            <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in" id="why">
            <p>We need this information so that you can receive access to the site and its content. Rest assured your information will not be sold, traded, or given to anyone.</p>
            <p></p><br> Please contact <a mailto:href="JoeSixPack@Sixpacksrus.com"></a>kent.apawan@gmail.com</a> for any other inquiries.</p>
            </div>
            <div class="tab-pane fade active in" id="signin">
                <form class="form-horizontal" method = "POST" >
                <fieldset>
                <!-- Sign In Form -->
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="username"></label>
                  <div class="controls">
                    <input required="" id="username" name="username" type="text" class="form-control" placeholder="Username" class="input-medium" required="">
                  </div>
                </div>

                <!-- Password input-->
                <div class="control-group">
                  <label class="control-label" for="password"></label>
                  <div class="controls">
                    <input required="" id="password" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
                  </div>
                </div>

                <!-- Multiple Checkboxes (inline) -->
                <div class="control-group">
                  <label class="control-label" for="rememberme"></label>
                  <div class="controls">
                    <label class="checkbox inline" for="rememberme-0">
                      <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                      Remember me
                    </label>
                  </div>
                </div>

                <!-- Button -->
                <div class="control-group">
                  <label class="control-label" for="signin"></label>
                  <div class="controls">
                    <button id="signin" name="signin" class="btn btn-success">Sign In</button>
                  </div>
                </div>
                </fieldset>
                </form>
            </div>
            <div class="tab-pane fade" id="signup">
                <form class="form-horizontal" method="POST">
                <fieldset>
                <!-- Sign Up Form -->
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="lname"></label>
                  <div class="controls">
                    <input id="lastname" name="lname" class="form-control" type="text" placeholder="Last Name" class="input-large" required="">
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="fname"></label>
                  <div class="controls">
                    <input id="firstname" name="fname" class="form-control" type="text" placeholder="First Name" class="input-large" required="">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="mname"></label>
                  <div class="controls">
                    <input id="midname" name="mname" class="form-control" type="text" placeholder="Middle Name" class="input-large" required="">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="gender"></label>
                  <label>Gender</label>
                  <div class="controls">
                    <select class="form-sign" placeholder="" name="gender" required>
                    <option name="male">Male</option>
                    <option name="female">Female</option>
                </select>
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="birthdate"></label>
                  <div class="controls">
                  <label>Date of Birth</label>
                    <input id="birthdate" name="birthdate" class="form-control" type="date" placeholder="" class="input-large" required="">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="emailAdd"></label>
                  <div class="controls">
                    <input id="emailAdd" name="emailAdd" class="form-control" type="email" placeholder="Email Address" class="input-large" required="">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="contactno"></label>
                  <div class="controls">
                    <input id="contactno" name="contactno" class="form-control" type="text" placeholder="Contact No" class="input-large" required="">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="username"></label>
                  <div class="controls">
                    <input id="username" name="username" class="form-control" type="text" placeholder="Username" class="input-large" required="">
                  </div>
                </div>

                <!-- Password input-->
                <div class="control-group">
                  <label class="control-label" for="password"></label>
                  <div class="controls">
                    <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
                    <em>1-8 Characters</em>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="paypalAcctNo"></label>
                  <div class="controls">
                    <input id="paypalAcctNo" name="paypalAcctNo" class="form-control" type="text" placeholder="Paypal Account No" class="input-large" required="">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="locations"></label>
                  <div class="controls">
                    <label>Locations</label>
                    <select name="locations" class="form-control" required>
                        <option value="">--locations--</option>
                        <?php foreach($locations as $a) { ?>
                        <option value="<?php echo $a['locID']?>"><?php echo $a['cityName'];?></option>
                        <?php } ?>
                    </select>   
                  </div>
                </div>
  
                <!-- Multiple Radios (inline) -->
                <br>
                
                <!-- Button -->
                <div class="control-group">
                  <label class="control-label" for="signup"></label>
                  <div class="controls">
                    <button id="confirmsignup" name="signup" class="btn btn-success">Sign Up</button>
                  </div>
                </div>
                </fieldset>
                </form>
          </div>
        </div>
          </div>
          <div class="modal-footer">
          <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </center>
          </div>
        </div>
      </div>
    </div>
    </div>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h2>A WEB AND MOBILE BASED APPLICATION FOR HOME SWAPPING.</h2>
                <hr>
                <p>The main objective of the study is to design and develop a web and mobile-based home swapping application. The proposed system aims to help travelers, backpackers and individuals find a suitable house to swap in the desired destination for free.</p>
                <!--<img id="logo" src="img/portfolio/logo.jpg"><br/><br/>-->
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">BahayPalitan seeks to become one of the best to offer house swapping services with android mobile support in the market. The system operates with the same principle as with the competitors: someone visits the site and makes an account, provide information of own house along with uploaded pictures, make travel plans and choose from one of the desirable houses that matched the preferred criteria.</p>
                    <a href="#" class="btn btn-default btn-xl">Get Started!</a>
                </div>
            </div>
        </div>
    </section>

    <!--<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>Sturdy Templates</h3>
                        <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <?php foreach($god as $value) :?>
                <div class="col-lg-3 col-sm-6">
                    <div class="portfolio-box">
                        <img src="uploads/<?php echo $value->photos?> " class="img-responsive front_photo" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <?php echo $value->homePostType ?>
                                </div>
                                <div class="project-name">
                                    <?php echo $value->description ?><br/>
                                    <?php echo $value->cityName ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Find More</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">Sign Up Now!</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">bizarro@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>


</div>



</div>

<!-- end  content -->
