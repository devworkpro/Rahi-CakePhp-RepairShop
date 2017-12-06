        <?php //echo $this->Flash->render('positive'); ?>
        <div class="home" id="home">
        <?php echo $this->Flash->render('positive'); ?>
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="home-text col-md-8">
                        <h1 class="wow fadeInDown" data-wow-delay="1.5s" data-wow-duration="1.5s" data-wow-offset="10">All-in-one platform for Repair Shoppe!!
                        </h1>
                        <p class="lead wow fadeInDown" data-wow-delay="2s" data-wow-duration="1.5s" data-wow-offset="10"> Build Customer Relationships with Integrated Communication Tools Create Repeat Business and Attract New Customers with Leads and Marketing Tools .</p>
                        <!-- <a href="http://themeforest.net/item/modern-responsive-admin-dashboard-template/11004840" target="_blank" class="btn btn-default btn-rounded btn-lg wow fadeInUp" data-wow-delay="2.5s" data-wow-duration="1.5s" data-wow-offset="10">Download</a> -->

                        <?php echo $this->Html->link('SignUp',array('controller'=>'users','action'=>'register'),array('escape'=>false ,'class'=>'btn btn-default btn-rounded btn-lg wow fadeInUp','target'=>"_blank",'data-wow-delay'=>"2.5s", 'data-wow-duration'=>"1.5s", "data-wow-offset"=>"10"));?>

                        <?php echo $this->Html->link('SignIn',array('controller'=>'users','action'=>'login'),array('escape'=>false ,'class'=>'btn btn-success btn-rounded btn-lg wow fadeInUp','target'=>"_blank",'data-wow-delay'=>"2.5s", 'data-wow-duration'=>"1.5s", "data-wow-offset"=>"10"));?>

                        <!-- <a href="http://lambdathemes.in/" target="_blank" class="btn btn-success btn-rounded btn-lg wow fadeInUp" data-wow-delay="2.5s" data-wow-duration="1.5s" data-wow-offset="10">Live Preview</a> -->
                    </div>
                    <div class="scroller">
                        <div class="mouse"><div class="wheel"></div></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container" id="features">
            <div class="row features-list">
                <div class="col-sm-4 wow fadeInLeft" data-wow-duration="1.5s" data-wow-offset="10" data-wow-delay="0.5s">
                    <div class="feature-icon">
                        <i class="fa fa-desktop"></i>
                    </div>
                    <h2>Computer Repair</h2>
                    <p>CRM, ticketing, invoicing, automated marketing, 3-way email, MSP features, inventory, scheduling </p>
                    <!-- <p><a class="btn btn-link" href="#" role="button">View details &raquo;</a></p> -->
                </div>
                <div class="col-sm-4 wow fadeInLeft" data-wow-duration="1.5s" data-wow-offset="10" data-wow-delay="0.7s">
                    <div class="feature-icon">
                        <!-- <i class="fa fa-lightbulb-o"></i> -->
                        <i class="fa fa-mobile"></i>
                    </div>
                    <h2>Cell Phone Repair</h2>
                    <p>Mobile phone repair, inventory management, automated ordering, refurbs, accessories POS, time clock </p>
                    <!-- <p><a class="btn btn-link" href="#" role="button">View details &raquo;</a></p> -->
                </div>
                <div class="col-sm-4 wow fadeInLeft" data-wow-duration="1.5s" data-wow-offset="10" data-wow-delay="0.9s">
                    <div class="feature-icon">
                        <!-- <i class="fa fa-support"></i> -->
                        <i class="fa fa-wrench"></i>
                    </div>
                    <h2>Every Kind of Repair</h2>
                    <p>Bike, Jewelry, Watch, Scuba, Auto, Camera, Small Engine, ATV, Drone,Shoe Repair, IT Pros / MSP You name it, it's covered!</p>
                    <!-- <p><a class="btn btn-link" href="#" role="button">View details &raquo;</a></p> -->
                </div>
            </div>
        </div>
        <!-- <section id="section-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <img src="assets/images/iphone.png" class="iphone-img" alt="">
                    </div>
                    <div class="col-sm-8 wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <h1>The Power You Need</h1>
                        <p>Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero.</p>
                        <ul class="list-unstyled features-list-2">
                            <li><i class="fa fa-diamond icon-state-success m-r-xs icon-md"></i>Unique design</li>
                            <li><i class="fa fa-check icon-state-success m-r-xs icon-md"></i>Everything you need</li>
                            <li><i class="fa fa-cogs icon-state-success m-r-xs icon-md"></i>Tons of features</li>
                            <li><i class="fa fa-cloud icon-state-success m-r-xs icon-md"></i>Easy to use &amp; customize</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- <section id="section-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <section>
                            <div class="tabs tabs-style-linebox">
                                <nav>
                                    <ul>
                                        <li class="tab-current"><a href=""><span>Responsive</span></a></li>
                                        <li class=""><a href=""><span>Browsers</span></a></li>
                                        <li class=""><a href=""><span>Bootstrap</span></a></li>
                                        <li class=""><a href=""><span>Icons</span></a></li>
                                        <li class=""><a href=""><span>Documentation</span></a></li>
                                    </ul>
                                </nav>
                                <div class="content-wrap">
                                    <section class="content-current">
                                        <h1>Responsive Design</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.<br>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</p></section>
                                    <section><p>
                                        <h1>Cross-browser Compatible</h1>
                                        <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.<br>Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p></section>
                                    <section><p>
                                        <h1>Built With Bootstrap 3.3.4</h1>
                                        <p>Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc.</p></section>
                                    <section><p>
                                        <h1>+1100 Icons Included</h1>
                                        <p>Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis.<br>Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam.</p></section>
                                    <section><p>
                                        <h1>Well Documented</h1>
                                        <p>Morbi nec metus. Phasellus blandit leo ut odio. Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem. Sed magna purus, fermentum eu, tincidunt eu, varius ut, felis. In auctor lobortis lacus. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Vestibulum ullamcorper mauris at ligula. Fusce fermentum. Nullam cursus lacinia erat. Praesent blandit laoreet nibh.</p></section>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-sm-4 wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <img src="assets/images/iphone2.png" class="iphone-img" alt="">
                    </div>
                </div>    
            </div>
        </section> -->

        <section id="section-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <!-- <img src="assets/images/iphone.png" class="iphone-img" alt=""> -->
                        <img src="images/feature/customers and crm.png" alt="" class="square">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <h1><strong>Customers</strong> and CRM </h1>
                        <p>With powerful customer management and search you have your entire database instantly available from anywhere. We added the important parts of a CRM and left out all the confusing stuff so your team will ramp up quickly and get to work.</p>  
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>CRM with multiple contacts, notes fields, and more</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Estimates, Invoices, and Tickets all in the same place</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Email and SMS integrated for easy communication</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Referral source tracking and reporting</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Summary billing statements</li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Barcode labels auto-print on creation</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Manage and track customer credits</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Contact history for emailed invoices and marketing</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Stored credit cards for easy billing</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>PBX/Phone system integration for call tracking</li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="section-2">
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <h1><strong>Customers</strong> Web Portal </h1>
                        <p>Your customers will feel safer and more confident with the ability to check status, see invoice history, and preview and approve/decline estimates all from a portal they can access with just a click from all the emails you send them. The portal can be translated to any language for you international users.</p>  
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Web access customer portal via login or email link</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Give customers access to complete account history</li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Easy invoice and payment tracking for business clients</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Download Invoice and Ticket PDFs</li>
                          </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <!-- <img src="assets/images/iphone.png" class="iphone-img" alt=""> -->
                        <img src="images/feature/web portal.png" alt="" class="square">
                    </div>
                    
                </div>
            </div>
        </section>

        <section id="section-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <!-- <img src="assets/images/iphone.png" class="iphone-img" alt=""> -->
                        <img src="images/feature/map.png" alt="" class="square">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <h1><strong>Customers</strong> Map </h1>
                        <p>Another example of our powerful data analytics tools is the customer map - quickly visualize your data to gain insights that may have been impossible to determine without using a full integrated back office tool like RepairShopr.</p>   
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Google maps automatically maps customers</li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Quickly analyze your geographic distribution</li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="section-2">
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <h1><strong>Ticket List</strong> for Easy Job Management </h1>
                        <p>The heart and soul of a repair shop is the ticketing system - and we know it. Your tickets will show you exactly what you need, when you need it, from any device including cell phones on the go. The super light weight workflows will gently prompt you to the next task without getting in your way or slowing you down.</p>  
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Organize by status, problem type, customer</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Filter by assigned tech and current ticket status</li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Track by created date or due date</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Color coding for quick view of last updates</li>
                          </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <!-- <img src="assets/images/iphone.png" class="iphone-img" alt=""> -->
                        <img src="images/feature/tickets.png" alt="" class="square">
                    </div>
                    
                </div>
            </div>
        </section>

        <section id="section-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <!-- <img src="assets/images/iphone.png" class="iphone-img" alt=""> -->
                        <img src="images/feature/ticket dashboard.png" alt="" class="square">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <h1><strong>Heads-up In-Shop</strong>Ticket Display </h1>
                        <p>The all new Ticket Dashboard will help you avoid those frustrated customer calls because someone hasn't heard from you, and you'll never have to worry about your team working on the wrong thing because of convenient (and customizable) color coding keeps the urgent stuff on the top of the list and standing out!</p>   
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Designed for large screen TV or monitor</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Automatically refreshes to keep job statuses current</li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>At-a-glance view lets techs easily prioritize jobs</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Quickly see ticket quantity and status breakdown</li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-2">
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-6 wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <h1><strong>Track Progress</strong> on Tickets </h1>
                         <p>Powerful ticket tracker that is designed for your business keeps you on track and customers updated.</p>   
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Ticket Progress Bar provides simple workflow</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Update ticket status with log notes in a single step</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Inbound and outbound email / SMS integration</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Send updates automatically or keep notes private</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Canned messages save retyping common notes</li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <ul class="list-unstyled features-list-2">
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Create your own custom ticket fields</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Track time on tickets with built-in timer</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Parts orders automatically link to tickets for tracking</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Add other charges to tickets as you go</li>
                            <li><em class="fa fa-check icon-state-success m-r-xs icon-md"></em>Ticket charges convert to invoices with a single click</li>
                          </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <!-- <img src="assets/images/iphone.png" class="iphone-img" alt=""> -->
                        <img src="images/feature/tickets details.png" alt="" class="square">
                    </div>
                    
                </div>
            </div>
        </section>

        <section id="section-3">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.5s" data-wow-offset="10">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <p class="text-white">"I’ve not found anything that is such a complete all-in-one solution. Inventory management, invoicing, CRM, parts and order tracking, reporting...Repair Shopee does all of that. It’s pretty huge!" </p>
                                            <span>- Yochai Gal - Owner, Boston TechCollective</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <p class="text-white">"I can't tell you how much I appreciate it and how much Repair Shopee is making my life easier, stress free, & helping my business grow. I'm spreading the word, not only best product, but best customer service I've ever encountered!" </p>
                                            <span>- Matt Jones - The Affordable Geek</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <p>"I spent many years trying to find a replacement product for our environment and I have spent thousands trying different products ... This product is better than what I would have done myself and even more and it does the many things well. I like the Issues / CRM / billing / POS / customer intranet, billing / integration features." </p>
                                            <span>- Shawn Mortensen</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </section>
        <br><br>
        <div class="container" id="pricing">
            <div class="row">
                <div class="cd-pricing-container">
                    <div class="cd-pricing-switcher">
                        <p class="fieldset">
                            <input type="radio" class="no-uniform" name="duration-1" value="yearly" id="yearly-1" checked>
                            <label for="yearly-1">Yearly</label>
                            <input type="radio" class="no-uniform" name="duration-1" value="monthly" id="monthly-1" >
                            <label for="monthly-1">Monthly</label>
                            <span class="cd-switch"></span>
                        </p>
                    </div>
                    <ul class="cd-pricing-list cd-bounce-invert">
                        <li>
                            <ul class="cd-pricing-wrapper">
                                <li data-type="monthly" class="is-hidden">
                                    <header class="cd-pricing-header">
                                        <h2>One Man Army</h2>
                                        <div class="cd-price">
                                            <span class="cd-currency">$</span>
                                            <span class="cd-value">50</span>
                                            <span class="cd-duration">mo</span>
                                        </div>
                                    </header>
                                    <div class="cd-pricing-body">
                                        <ul class="cd-pricing-features">
                                            <li><em>75</em> Tickets & Invoices per Month</li>
                                            <li><em>One</em> Location</li>
                                            <li><em></em> Marketr Automated Marketing</li>
                                            <li><em>10</em> User Account</li>
                                            <li><em></em> ----</li>
                                            <li><em></em> SMS and Outbound Email </li>
                                        </ul>
                                    </div>
                                    <footer class="cd-pricing-footer">
                                        <!-- <a class="cd-select" href="#">Select</a> -->
                                        <?php echo $this->Html->link('Select',array('controller'=>'users','action'=>'register'),array('escape'=>false ,'class'=>'cd-select','target'=>"_blank"));?>
                                    </footer>
                                </li>
                                <li data-type="yearly" class="is-visible">
                                    <header class="cd-pricing-header">
                                        <h2>One Man Army Annual</h2>
                                        <div class="cd-price">
                                            <span class="cd-currency">$</span>
                                            <span class="cd-value">549</span>
                                            <span class="cd-duration">yr</span>
                                        </div>
                                    </header>
                                    <div class="cd-pricing-body">
                                        <ul class="cd-pricing-features">
                                            <li><em>75</em>  Tickets & Invoices per Month</li>
                                            <li><em>One</em> Location</li>
                                            <li><em></em> Marketr Automated Marketing</li>
                                            <li><em>1</em> User Account</li>
                                            <li><em></em> ----</li>
                                            <li><em></em> SMS and Outbound Email </li>
                                        </ul>
                                    </div>
                                    <footer class="cd-pricing-footer">
                                        <!-- <a class="cd-select" href="#">Select</a> -->
                                        <?php echo $this->Html->link('Select',array('controller'=>'users','action'=>'register'),array('escape'=>false ,'class'=>'cd-select','target'=>"_blank"));?>
                                    </footer>
                                </li>
                            </ul>
                        </li>
                        <li class="cd-popular">
                            <ul class="cd-pricing-wrapper">
                                <li data-type="monthly" class="is-hidden">
                                    <header class="cd-pricing-header">
                                        <h2>Repair Shop</h2>
                                        <div class="cd-price">
                                            <span class="cd-currency">$</span>
                                            <span class="cd-value">100</span>
                                            <span class="cd-duration">mo</span>
                                        </div>
                                    </header>
                                    <div class="cd-pricing-body">
                                        <ul class="cd-pricing-features">
                                            <li><em>Unlimited</em> Tickets & Invoices per Month</li>
                                            <li><em>One</em> Location</li>
                                            <li><em></em> Marketr Automated Marketing</li>
                                            <li><em>10</em> User Accounts</li>
                                            <li><em>$10</em> per Additional User</li>
                                            <li><em></em> SMS and Outbound Email </li>
                                        </ul>
                                    </div>
                                    <footer class="cd-pricing-footer">
                                        <!-- <a class="cd-select" href="#">Select</a> -->
                                        <?php echo $this->Html->link('Select',array('controller'=>'users','action'=>'register'),array('escape'=>false ,'class'=>'cd-select','target'=>"_blank"));?>
                                    </footer>
                                </li>
                                <li data-type="yearly" class="is-visible">
                                    <header class="cd-pricing-header">
                                        <h2>Repair Shop Annual</h2>
                                        <div class="cd-price">
                                            <span class="cd-currency">$</span>
                                            <span class="cd-value">1080</span>
                                            <span class="cd-duration">yr</span>
                                        </div>
                                    </header>
                                    <div class="cd-pricing-body">
                                        <ul class="cd-pricing-features">
                                            <li><em>Unlimited</em> Tickets & Invoices per Month</li>
                                            <li><em>One</em> Location</li>
                                            <li><em></em> Marketr Automated Marketing</li>
                                            <li><em>10</em> User Accounts</li>
                                            <li><em>$110</em> per Additional User/year</li>
                                            <li><em></em> SMS and Outbound Email </li>
                                        </ul>
                                    </div>
                                    <footer class="cd-pricing-footer">
                                        <!-- <a class="cd-select" href="#">Select</a> -->
                                        <?php echo $this->Html->link('Select',array('controller'=>'users','action'=>'register'),array('escape'=>false ,'class'=>'cd-select','target'=>"_blank"));?>
                                    </footer>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul class="cd-pricing-wrapper">
                                <li data-type="monthly" class="is-hidden">
                                    <header class="cd-pricing-header">
                                        <h2>Big Chain</h2>
                                        <div class="cd-price">
                                            <span class="cd-currency">$</span>
                                            <span class="cd-value">100</span>
                                            <span class="cd-duration">mo</span>
                                        </div>
                                    </header>
                                    <div class="cd-pricing-body">
                                        <ul class="cd-pricing-features">
                                            <li><em>Unlimited</em> Tickets & Invoices per Month</li>
                                            <li><em>$99.99</em>  Per Location</li>
                                            <li><em></em> Marketr Automated Marketing</li>
                                            <li><em>10</em> User Accounts per location</li>
                                            <li><em>$10</em> per Additional User</li>
                                            <li><em></em> SMS and Outbound Email </li>
                                        </ul>
                                    </div>
                                    <footer class="cd-pricing-footer">
                                        <!-- <a class="cd-select" href="#">Select</a> -->
                                        <?php echo $this->Html->link('Select',array('controller'=>'users','action'=>'register'),array('escape'=>false ,'class'=>'cd-select','target'=>"_blank"));?>
                                    </footer>
                                </li>
                                <li data-type="yearly" class="is-visible">
                                    <header class="cd-pricing-header">
                                        <h2>Big Chain Annual</h2>
                                        <div class="cd-price">
                                            <span class="cd-currency">$</span>
                                            <span class="cd-value">1080</span>
                                            <span class="cd-duration">yr</span>
                                        </div>
                                    </header>
                                    <div class="cd-pricing-body">
                                        <ul class="cd-pricing-features">
                                            <li><em>Unlimited</em> Tickets & Invoices per Month</li>
                                            <li><em>$1079.99</em>  Per Location</li>
                                            <li><em></em> Marketr Automated Marketing</li>
                                            <li><em>10</em> User Accounts per location</li>
                                            <li><em>$110</em>  per Additional User</li>
                                            <li><em></em> SMS and Outbound Email </li>
                                        </ul>
                                    </div>
                                    <footer class="cd-pricing-footer">
                                        <!-- <a class="cd-select" href="#">Select</a> -->
                                        <?php echo $this->Html->link('Select',array('controller'=>'users','action'=>'register'),array('escape'=>false ,'class'=>'cd-select','target'=>"_blank"));?>
                                    </footer>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 wow rotateInUpLeft" data-wow-duration="1.5s" data-wow-offset="10" data-wow-delay="0.5s">
                        <a href="#contact" class="btn btn-success btn-lg btn-rounded contact-button"><i class="fa fa-envelope-o"></i></a>
                        <h2 style="color: white;">Let's keep in touch</h2>
                        <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'addcontactus','class'=>"validator-form",'id'=>"wizardForm")); ?>
                        <form class="m-t-md">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- <input type="text" class="form-control input-lg contact-name" placeholder="Name"> -->
                                        <?php echo $this->Form->input('Contactus.name', array('div'=>false,'class'=>'form-control input-lg contact-name','required'=>'required','label'=>false,'placeholder'=>"Name*")); ?>
                                    </div>
                                    <div class="col-sm-6">      
                                        <!-- <input type="email" class="form-control input-lg" placeholder="Email"> -->
                                        <?php echo $this->Form->input('Contactus.email', array('div'=>false,'class'=>'form-control input-lg','required'=>'required','placeholder'=>'Email*','label'=>false)); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <input type="text" class="form-control input-lg" placeholder="Subject"> -->
                                <?php echo $this->Form->input('Contactus.subject', array('div'=>false,'class'=>'form-control input-lg','required'=>'required','placeholder'=>'Subject*','label'=>false)); ?>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="4=6" placeholder="Message*" name="data[Contactus][message]" required></textarea>
                            </div><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-lg">Send Message</button>
                            </div>
                        </form>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>