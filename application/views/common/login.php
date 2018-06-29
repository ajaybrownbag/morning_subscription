<div id="signin-up" class="modal fade" role="dialog">
    <div class="modal-dialog login-upwidth">
        <div class="modal-content">
            <div class="modal-body padding0">
                <button type="button" class="close modaldismis" data-dismiss="modal">&times;</button>
                <div class="w-100">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pad-LR0 hidden-xs">
                        <img src="<?=base_url("assets/img/sign-up-image1.jpg");?>" class="img-responsive m-b-5-5">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-LR0 marginT20">
                        <div class="w-100">
                            <div class="col-xs-6">
                                <p class="text-center signinupact"><a href="#" class="active" id="login-form-link">Login</a></p>
                            </div>
                            <div class="col-xs-6">
                                <p class="text-center signinupact"><a href="#" id="register-form-link" class="text-center">Register</a></p>
                            </div>
                            <hr class="hr">
                        </div>
                        <div class="col-lg-12">
                            <form id="login-form" action="" method="post" role="form" style="display: block;">
                                <div class="card marginT20 cardhide">
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Mobile">Mobile</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit pass-icon"></i>
                                        <input type="password" required="required"/>
                                        <label for="Password">Password</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <button type="button" class="btn btn-blue btn-md text-center btn-block">Login Securely</button>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <div class="clearfix">
                                            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                                            <a href="#" class="pull-right forgetpass">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card marginT20 cardshow" style="display: none;">
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Mobile">Mobile</label>
                                        <div class="bar"></div>
                                    </div>
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <button type="button" class="btn btn-blue btn-md text-center btn-block">Forgot Password</button>
                                    </div>
                                    
                                </div>
                                
                            </form>
                            <form id="register-form" action="" method="post" role="form" style="display: none;">
                                <div class="card">
                                    <h5 class="text-center">Create Your Account</h5>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Mobile">Mobile</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit email-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="email">Email</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit pass-icon"></i>
                                        <input type="password" required="required" class="pwd" />
                                        <i class="fa fa-eye reveal passeyeicon"></i>
                                        <label for="Password">Password</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <button type="button" class="btn btn-blue btn-md text-center btn-block">Procced</button>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginT20">
                                        <div class="clearfix">
                                            <label class="pull-left checkbox-inline"><input type="checkbox"> I agree with terms & conditions</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- next step for register -->
                                <div class="card" style="display: none;">
                                    <h6 class="text-center">Enter One Time Password (OTP) Sent to Your Mobile Number</h6>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Mobile">Mobile</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit mobile-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Enter OTP">Enter OTP</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit user-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="First Name">First Name</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="input-container">
                                        <i class="inputicon comon-sprit user-icon"></i>
                                        <input type="text" required="required"/>
                                        <label for="Last Name">Last Name</label>
                                        <div class="bar"></div>
                                    </div>
                                    <div class="w-100">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                            <label class="form-check form-check-inline col-xs-6">
                                            <input class="form-check-input" type="radio" name="gender" value="option1">
                                            <span class="form-check-label"> Male </span>
                                            </label>
                                            <label class="form-check form-check-inline col-xs-6">
                                            <input class="form-check-input" type="radio" name="gender" value="option2">
                                            <span class="form-check-label"> Female</span>
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100 marginT10">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <button type="button" class="btn btn-default btn-xs text-center btn-block">CANCEL</button>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <button type="button" class="btn btn-blue btn-xs text-center btn-block">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- next step for register end -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>