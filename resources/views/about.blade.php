@extends('base.standard')

@section('title')
    About
@endsection

@section('content')
    <h1 class="page-header">
        About BoardSoc
    </h1>

    <p>
        Sheffield University Board Gaming Society was set up in 2012 by
        Patrick Rose because "he wasn't on a committee and that's just weird".
    </p>

    <p>
        The society focus on playing board games in a social environment, using
        various locations in the Sheffield city - ranging from the Union itself
        to various pubs and shops in Sheffield.
    </p>

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

    <div class="committee">
        <div class="row">
            <div class="committee-president">
                <h2 class="committee-name">
                    Rob Sharp
                    <small>President</small>
                </h2>
            </div>
            <div class="committee-secretary">
                <h2 class="committee-name">
                    David Ray <small>Secretary</small>
                </h2>
            </div>
            <div class="committee-treasurer">
                <h2 class="committee-name">
                    Jon Crossley <small>Treasurer</small>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="committee-librarian">
                <h2 class="committee-name">
                    Matt Tomlinson <small>Librarian</small>
                </h2>
            </div>
            <div class="committee-inclusions">
                <h2 class="committee-name">
                    Jo Conway <small>Inclusions</small>
                </h2>
            </div>
            <div class="committee-web">
                <h2 class="committee-name">
                    Patrick Rose <small>Web Admin</small>
                </h2>
            </div>
        </div>
    </div>
@endsection