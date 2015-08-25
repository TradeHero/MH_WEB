<?php 
/*
Template Name: Home Page Test2
*/
get_header(); ?>
  <div class="jum-maincontainer">
    <div class="container jcontainer">

      <div class="jumbotron">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <h2><?php the_title(); ?></h2>

          <p class="lead"><?php remove_all_filters('the_content');
               the_content(); ?> </p>
          <div class="jum-img"><img src="http://blog.tradehero.mobi/wp-content/uploads/super_hero.png" border="0" ></div>
 
          <div class="panel-group" id="accordion">
            <div class="panel panel-default">
              <div class="panel-heading myButton">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <div class="jp-icon"><img src="http://blog.tradehero.mobi/wp-content/uploads/lb_exchange.png"></div>
                    <div class="jp-date">27-31 Jan</div>
                    <div class="jp-title"><h4>Go global!</h4></div>
                    <div class="jp-active jp-complete">COMPLETED</div>
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                  Go Global! It is time to expand your portfolio worldwide.<br />
                  Make a trade in 5 different exchanges.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading myButton">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    <div class="jp-icon"><img src="http://blog.tradehero.mobi/wp-content/uploads/lb_sector.png"></div>
                    <div class="jp-date">3-7 Feb</div>
                    <div class="jp-title"><h4>Try new sectors!</h4></div>
                    <div class="jp-active jp-complete">COMPLETED</div>
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">                 
                  Expand your sight! Try different industries to expand your portfolio.<br />
                  Make a trade in 5 different sectors.
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading myButton">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    <div class="jp-icon"><img src="http://blog.tradehero.mobi/wp-content/uploads/lb_most_skilled.png"></div>
                    <div class="jp-date">10-14 Feb</div>
                    <div class="jp-title"><h4>Show off your hero ranking!</h4></div>
                    <div class="jp-active jp-complete">COMPLETED</div>
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                  Show off your ranking to your friends.
                  Share the timeline status of your current ranking to your Facebook and Twitter.
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading myButton">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                    <div class="jp-icon"><img src="http://blog.tradehero.mobi/wp-content/uploads/icn_watchlist.png"></div>
                    <div class="jp-date">17-21 Feb</div>
                    <div class="jp-title"><h4>Closer watch on stocks!</h4></div>
                    <div class="jp-active jp-complete">COMPLETED</div>
                  </a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                  Keeping an eye on your shortlisted stocks just got easier.
                  Add 5 stocks to your Watchlist this week. 
                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading myButton">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                    <div class="jp-icon"><img src="http://blog.tradehero.mobi/wp-content/uploads/icn_5days.png"></div>
                    <div class="jp-date">24-28 Feb</div>
                    <div class="jp-title"><h4> Make more than 10 trades!</h4></div>
                    <div class="jp-active jp-complete">COMPLETED</div>
                  </a>
                </h4>
              </div>
              <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                  Become a regular trader.
                  Make more than 10 trades this week.
                </div>
              </div>
            </div>


          </div>


          <?php /*<p><a class="btn btn-lg btn-success" href="#">Join Now</a></p> */ ?>

        <?php endwhile; else: ?>

        <?php endif; ?>

      </div>

      <div class="panel-group" id="accordion2">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTc">
                    <div class="jp-title"><h4>Terms and Conditions</h4></div>
                  </a>
                </h4>
              </div>
              <div id="collapseTc" class="panel-collapse collapse">
                <div class="panel-body">
                        <div class="row marketing">
                          <div>
                            <ul>
                              <li>"Weekly Quests" ("Contest") for each week starts from Monday 0800 hours to Saturday 0500 hours, Singapore time, for each week of the "Contest Period" (27 Jan 2014 to 1 March 2014).</li>
                              <li>1 winner will be selected to win USD $200 each week.</li>
                              <li>All TradeHero users automatically qualifies for the Contest.</li>
                              <li>Winners will be selected at the end of Contest Period. Only one winner will be randomly selected from all eligible entries each week.</li>
                              <li>All of TradeHero’s decisions are final and binding. Winner(s) will be notified by email at TradeHero’s discretion within fourteen (14) days of the drawing. Winner(s) will strictly have seven (7) days from the date of notification to accept the prize by email (“Date of Notification of Prize Acceptance")</li>
                              <li>Winner(s) will be paid via Paypal. You are fully responsible for ensuring the accuracy and veracity of your email and Paypal email, or any material and/or information that you provide.</li>
                              <li>By acknowledging their win and thereafter accepting and/or using prize, Successfully Qualified Winner(s) agree(s) to the use of the full name(s), voice(s), and/or likeness of such winner(s) for the purpose of advertising, publicity, trade or promotion of TradeHero and/or products, worldwide and without further compensation, unless prohibited by law. TradeHero reserves the right to post the name(s) and country(s) of the Successfully Qualified Winner(s) on the Internet</li>
                              <li>By entering, each entrant agrees to abide by and be bound by these Terms and Conditions and the decisions of TradeHero, which shall be final in all respects relating to the Contest, including without limitation the interpretation of these rules.</li>
                            </ul>

                          </div>
                        </div>
                </div>
              </div>
            </div>
      </div>

      <div class="row marketing">
        <div>
        </div>
      </div>

    </div> <!-- /container -->
  </div>

<?php get_footer(); ?>
