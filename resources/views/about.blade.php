@extends('base.standard')

@section('title')
    About
@endsection

@section('page-header')
    <div id="headerwrap">
        <div class="container">
            <div class="row" >
                <h3>
                    About BoardSoc
                </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mtb">
        <div class="row">
            <div class="col-lg-3">
                <img class="img-responsive"
                     src="{{ asset('img/logo.jpg') }}"
                     alt="BoardSoc logo" />
            </div>
            <div class="col-lg-9">
                <p>
                    Sheffield University Board Gaming Society was set up in 2012 by
                    Patrick Rose because "he wasn't on a committee and that's just weird".
                </p>

                <p>
                    The society focus on playing board games in a social environment, using
                    various locations in the Sheffield city - ranging from the Union itself
                    to various pubs and shops in Sheffield.
                </p>

                <p>
                    Usually we meet in the Student's union every Saturday from 2pm until 6pm (though
                    people might stay for longer), and on a Wednesday from about 6pm - but always keep an eye on our Facebook
                    group or the {!! link_to_route('events.index', 'events page') !!}!
                </p>

                <p>
                    If you want to know more about the society, please feel free to send us an
                    email or join our Facebook group.
                </p>

                <dl class="dl-horizontal">
                    <dt>Facebook</dt>
                    <dd>
                        <a href="https://www.facebook.com/UoSBGS/">
                            University of Sheffield Board Gaming Society
                        </a>
                    </dd>
                    <dt>Email</dt>
                    <dd>
                        <a href="mailto:boardsoc@sheffield.ac.uk">boardsoc@sheffield.ac.uk</a>
                    </dd>
                </dl>


                <h2>Join The Mailing List</h2>

				<!-- Begin Mailchimp Signup Form -->
				<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
				<style type="text/css">
				#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
				/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
				   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
				</style>
				<div id="mc_embed_signup">
					<form action="https://boardsoc.us19.list-manage.com/subscribe/post?u=20267b6267fb30a2d85a2041c&amp;id=232778e41a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<div id="mc_embed_signup_scroll">
							<h2>Subscribe to our mailing list</h2>
							<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
							<div class="mc-field-group">
								<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
								</label>
								<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
							</div>
							<div class="mc-field-group">
								<label for="mce-FNAME">First Name </label>
								<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
							</div>
							<div class="mc-field-group">
								<label for="mce-LNAME">Last Name </label>
								<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
							</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_20267b6267fb30a2d85a2041c_232778e41a" tabindex="-1" value=""></div>
							<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						</div>
					</form>
				</div>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
				<!--End mc_embed_signup-->
            </div>
        </div>
    </div>

    <div class="container mtb committee">
        <div class="row centered">
            <div class="mobile-row">
                <div class="col-sm-3 col-xs-6">
                    <div class="he-wrap tpl6 committee-member">
                        <img src="{{ asset('img/committee-president.jpg') }}"
                             alt="Oliver Harris">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="https://www.facebook.com/oliver.harris.37"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Oliver Harris</h4>
                    <h5 class="ctitle">President</h5>
                    <p>
                        Leader of the Board gaming world. Well, the Sheffield
                        section.
                    </p>
                    <div class="hline"></div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="he-wrap tpl6 committee-member">
                        <img src="{{ asset('img/committee-secretary.jpg') }}"
                             alt="Role unfilled">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="#"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Role unfilled</h4>
                    <h5 class="ctitle">Secretary</h5>
                    <p>
                        The president's right hand person. Totally not plotting their
                        downfall. Honest.
                    </p>
                    <div class="hline"></div>
                </div>
            </div>
            <div class="mobile-row">
                <div class="col-sm-3 col-xs-6">
                    <div class="he-wrap tpl6 committee-member">
                        <img src="{{ asset('img/committee-treasurer.jpg') }}"
                             alt="Josh Wood">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="https://www.facebook.com/josh.wood.90410"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Josh Wood</h4>
                    <h5 class="ctitle">Treasurer</h5>
                    <p>
                        The bean counter. Spends their nights lying on a bed
                        of gold coins, like a dragon.
                    </p>
                    <div class="hline"></div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="he-wrap tpl6 committee-member">
                        <img src="{{ asset('img/committee-librarian.jpg') }}"
                             alt="Fred Gill">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="https://www.facebook.com/gillfr"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Fred Gill</h4>
                    <h5 class="ctitle">Librarian</h5>
                    <p>
                        Gate keeper of the cardboard joy that the society is dedicated
                        to enjoying.
                    </p>
                    <div class="hline"></div>
                </div>
            </div>
        </div>
        <div class="mobile-row">
            <div class="row centered">
                    <div class="col-sm-3 col-xs-6">
			    <div class="he-wrap tpl6 committee-member">
				    <img src="{{ asset('img/committee-cardgames.jpg') }}"
					    alt="Role unfilled">
				    <div class="he-view">
					    <div class="bg a0" data-animate="fadeIn">
						    <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
							<a href="https://www.facebook.com/nick.chapman.52035"
							    class="dmbutton a2" data-animate="fadeInUp">
							    <i class="fa fa-facebook"></i>
							</a>
					    </div><!-- he bg -->
				    </div><!-- he view -->
			    </div><!-- he wrap -->
			    <h4>Nick Chapman</h4>
			    <h5 class="ctitle">Card Games Officer</h5>
			    <p>
				    In charge of the other cardboard joy that we partake in, collectible card games.
			    </p>
			    <div class="hline"></div>
                    </div>
		    <div class="col-sm-3 col-xs-6">
			    <div class="he-wrap tpl6 committee-member">
				    <img src="{{ asset('img/committee-social.jpg') }}"
					    alt="Lucie Winship">
				    <div class="he-view">
					    <div class="bg a0" data-animate="fadeIn">
						    <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
						    <a href="https://www.facebook.com/lucie.winship"
							    class="dmbutton a2" data-animate="fadeInUp">
							    <i class="fa fa-facebook"></i>
						    </a>
					    </div><!-- he bg -->
				    </div><!-- he view -->
			    </div><!-- he wrap -->
			    <h4>Lucie Winship</h4>
			    <h5 class="ctitle">Social Secretary</h5>
			    <p>
				    In charge of times we decide to partake in non-cardboard based joy
			    </p>
			    <div class="hline"></div>
                    </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="he-wrap tpl6 committee-member">
                        <img src="{{ asset('img/committee-inclusions.jpg') }}"
                             alt="Peter Fletcher">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="https://www.facebook.com/peter.fletcher.7186"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Peter Fletcher</h4>
                    <h5 class="ctitle">Inclusions</h5>
                    <p>
                        Makes sure that all is smooth, and all are happy. Let them know
                        if there's any issues!
                    </p>
                    <div class="hline"></div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="he-wrap tpl6 committee-member">
                        <img src="{{ asset('img/committee-web.jpg') }}"
                             alt="Patrick Rose">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="https://www.facebook.com/DrugCrazed"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Patrick Rose</h4>
                    <h5 class="ctitle">Web Officer</h5>
                    <p>
                        Master of the web site. Lord of all the things you're currently
                        looking at.
                    </p>
                    <div class="hline"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
