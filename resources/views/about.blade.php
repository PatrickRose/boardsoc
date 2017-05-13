@extends('base.standard')

@section('title')
    About
@endsection

@section('page-header')
    <div id="blue">
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
                     alt="Card/BoardSoc logo" />
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
                    Usually we meet in Interval every Saturday from 2pm until 6pm (though
                    people might stay for longer) - but always keep an eye on our Facebook
                    group or the {!! link_to_route('events.index', 'events page') !!}!
                </p>

                <p>
                    If you want to know more about the society, please feel free to send us an
                    email or join our Facebook group.
                </p>

                <dl class="dl-horizontal">
                    <dt>Facebook</dt>
                    <dd>
                        <a href="https://www.facebook.com/groups/419413234788703/">
                            Sheffield CardBoardSoc
                        </a>
                    </dd>
                    <dt>Email</dt>
                    <dd>
                        <a href="mailto:boardsoc@sheffield.ac.uk">boardsoc@sheffield.ac.uk</a>
                    </dd>
                </dl>


                <h2>Join The Mailing List</h2>

                <!-- Begin MailChimp Signup Form -->
                <link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
                <div id="mc_embed_signup">
                    <form action="http://boardsoc.us6.list-manage.com/subscribe/post?u=247323eb50891566c8745585e&amp;id=e21d3ae3e8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <label for="mce-EMAIL">Subscribe to our mailing list</label>
                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                    </form>
                </div>
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
                             alt="Ben Hawker">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="https://www.facebook.com/pipothy"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Ben Hawker</h4>
                    <h5 class="ctitle">President</h5>
                    <p>
                        Leader of the Card/Board gaming world. Well, the Sheffield
                        section.
                    </p>
                    <div class="hline"></div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="he-wrap tpl6 committee-member">
                        <img src="{{ asset('img/committee-secretary.jpg') }}"
                             alt="Jade Broomby">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="https://www.facebook.com/ade.broomby"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Jade Broomby </h4>
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
                             alt="Guro Fandrem">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="https://www.facebook.com/guro.fandrem"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Guro Fandrem</h4>
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
					    alt="Allie Mackintosh">
				    <div class="he-view">
					    <div class="bg a0" data-animate="fadeIn">
						    <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
						    <a href="https://www.facebook.com/AleshaWSAD"
							    class="dmbutton a2" data-animate="fadeInUp">
							    <i class="fa fa-facebook"></i>
						    </a>
					    </div><!-- he bg -->
				    </div><!-- he view -->
			    </div><!-- he wrap -->
			    <h4>Allie Mackintosh</h4>
			    <h5 class="ctitle">Card Games Officer</h5>
			    <p>
				    In charge of the other cardboard joy that we partake in, collectible card games.
			    </p>
			    <div class="hline"></div>
                    </div>
		    <div class="col-sm-3 col-xs-6">
			    <div class="he-wrap tpl6 committee-member">
				    <img src="{{ asset('img/committee-social.jpg') }}"
					    alt="Jamie Duguid">
				    <div class="he-view">
					    <div class="bg a0" data-animate="fadeIn">
						    <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
						    <a href="https://www.facebook.com/james.duguid.50"
							    class="dmbutton a2" data-animate="fadeInUp">
							    <i class="fa fa-facebook"></i>
						    </a>
					    </div><!-- he bg -->
				    </div><!-- he view -->
			    </div><!-- he wrap -->
			    <h4>Jamie Duguid</h4>
			    <h5 class="ctitle">Social Secretary</h5>
			    <p>
				    In charge of times we decide to partake in non-cardboard based joy
			    </p>
			    <div class="hline"></div>
                    </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="he-wrap tpl6 committee-member">
                        <img src="{{ asset('img/committee-inclusions.jpg') }}"
                             alt="Sophie Price">
                        <div class="he-view">
                            <div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Contact Me:</h3>
                                <a href="https://www.facebook.com/sophie.price.524"
                                   class="dmbutton a2" data-animate="fadeInUp">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div><!-- he bg -->
                        </div><!-- he view -->
                    </div><!-- he wrap -->
                    <h4>Sophie Price</h4>
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
