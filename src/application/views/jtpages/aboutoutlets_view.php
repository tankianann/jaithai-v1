<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<div id="content" class="row">
    <div class="col-sm-12">


        <div class="row cateringmenus-header">
            <div class="col-sm-6 col-xs-12">
                <h1>About Jai Thai</h1>
                <p class="lead">Since 1999, Jai Thai has been offering the delicious Thai food at wallet friendly
                    prices. </p>
                <p>We serve authentic Thai cuisine to everyone through our restaurants and catering services.</p>
                <ul>
                    <li><a href="<?php _e(site_url('about-history.php')) ?>">Learn more about our history</a></li>
                    <li><a href="<?php _e(site_url('about-achievements.php')) ?>">Check out our achievements</a></li>
                </ul>
            </div>
            <div class="col-sm-6 hidden-xs">
                <img src="<?php _e(base_url("/assets/i/authentic-thai-restaurant.jpg")); ?>"
                     alt="Singapore Thai Restaurant" alt="Singapore Thai Restaurant" class="img-responsive pull-right"/>
            </div>
        </div><!-- /.row -->

        <h2>Singapore Outlets</h2>


        <div class="row outletinfo">

            <div class='col-md-4 col-sm-6'>
                <h3>Purvis Street</h3>
                <p>
                    <label>Address</label>
                    27 Purvis Street<br/>#01-01 An Chuan Building<br/>Singapore 188604<br/>
                    [<a href="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=27+Purvis+Street&amp;sll=1.307264,103.906636&amp;sspn=0.007422,0.010933&amp;ie=UTF8&amp;hq=&amp;hnear=27+Purvis+St,+Singapore+188604&amp;z=17">map</a>]
                </p>
                <p><label>Tel</label>
                    +65 6336 6908
                </p>
                <p>
                    <label>Opening Hours</label>
                    <strong>Mon - Sun</strong><br/>
                    11:30am - 3pm<br/>
                    6pm – 9pm<br/>
                </p>
            </div>

        </div><!-- /.row -->

        <div class='row contactemail'>
            <div class='col-sm-12'>
                <p><strong>Contact Email:</strong>
                    <script type="text/javascript">
                        //<![CDATA[
                        eval(unescape('%76%61%72%20%73%3D%27%61%6D%6C%69%6F%74%65%3A%71%6E%69%75%79%72%6A%40%69%61%74%2D%61%68%2E%69%6F%63%6D%27%3B%76%61%72%20%72%3D%27%27%3B%66%6F%72%28%76%61%72%20%69%3D%30%3B%69%3C%73%2E%6C%65%6E%67%74%68%3B%69%2B%2B%2C%69%2B%2B%29%7B%72%3D%72%2B%73%2E%73%75%62%73%74%72%69%6E%67%28%69%2B%31%2C%69%2B%32%29%2B%73%2E%73%75%62%73%74%72%69%6E%67%28%69%2C%69%2B%31%29%7D%64%6F%63%75%6D%65%6E%74%2E%77%72%69%74%65%28%27%3C%61%20%68%72%65%66%3D%22%27%2B%72%2B%27%22%3E%65%6E%71%75%69%72%79%40%6A%61%69%2D%74%68%61%69%2E%63%6F%6D%3C%2F%61%3E%27%29%3B'))
                        //]]>
                    </script>
                </p>
            </div>
        </div><!-- /.row -->


    </div><!-- /content -->
</div>