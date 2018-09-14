<?php
    echo '<pre>';
    require_once('./includes/TwitterAPIExchange.php');
    $settings = array(
        'oauth_access_token' => "1150714765-pZwD6bV9tTgB5qkY5eG8PWkUrlO6YSxgwXXo0Wv",
        'oauth_access_token_secret' => "UU8WvK7zX1zjS7hR7aIA0lJz1amtuVC70AFRkNggO8odq",
        'consumer_key' => "wvRsdJP1AELhfT7ALSPNA",
        'consumer_secret' => "m55FASKkyNB6FjaEPEn3qRlE0VHaCHoJ5bSvV7QnvI"
    );
    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
    $requestMethod = "GET";
    $user = "seanjessenuk";
    $count = 2;

    if (isset($_GET['user'])) { $user = $_GET['user']; }
    if (isset($_GET['count'])) { $count = $_GET['count'];}

    $getfield = "?screen_name=$user&count=$count";
    $twitter = new TwitterAPIExchange($settings);
    $string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);

    if(isset($string["errors"][0]["message"])) {
        echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";
        exit();
    }
    foreach($string as $items)
        {
            echo "Time and Date of Tweet: ".$items['created_at']."<br />";
            echo "Tweet: ". $items['text']."<br />";
            echo "Tweeted by: ". $items['user']['name']."<br />";
            echo "Screen name: ". $items['user']['screen_name']."<br />";
            echo "Followers: ". $items['user']['followers_count']."<br />";
            echo "Friends: ". $items['user']['friends_count']."<br />";
            echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
        }

    echo '</pre>';
?>

<section class="section section--social-media mobile-hide">
    <div class="flex-container">
        <div class="flex-col flex-col--12">
            <h3>Hear from us</h3>
        </div>
    </div>

    <div class="flex-container flex-container--no-space text-center">
        <div class="flex-col flex-col--4">
            <div class="card card--white card--social">
                <div class="card__header">
                    <div class="card__header__meta">
                        <p><strong>Connected Kingston</strong></p>
                        <p class="sm-copy"><span>@ConnectedKingtson</span> <span>21h</span></p>
                    </div>

                    <div class="card__header__icon">
                        <i class="fab fa-twitter" aria-hidden title="Twitter"></i>
                        <span class="sr-only">Twitter</span>
                    </div>
                </div>

                <div class="card__content">
                    <p class="sm-copy">We're proud to supporting the homeless, refugees and many more in the Kingston area. Find out more about becoming a Community Health Champion here 👉 <a href="#">https://t.co/3BFo2D0S3g</a></p>
                </div>
            </div>
            
            <a href="#" role="button" class="btn btn--secondary">Follow us on twitter</a>
        </div>
        
        <div class="flex-col flex-col--2"></div>

        <div class="flex-col flex-col--4">
            <div class="card card--white card--social">
                <div class="card__header">
                    <div class="card__header__meta">
                        <p><strong>Connected Kingston</strong></p>
                        <p class="sm-copy"><span>21h</span></p>
                    </div>

                    <div class="card__header__icon">
                        <i class="fab fa-facebook" aria-hidden title="Facebook"></i>
                        <span class="sr-only">Facebook</span>
                    </div>
                </div>

                <div class="card__content">
                    <p class="sm-copy">We're proud to supporting the homeless, refugees and many more in the Kingston area. Find out more about becoming a Community Health Champion here 👉 <a href="#">https://t.co/3BFo2D0S3g</a></p>
                </div>
            </div>
            
            <a href="#" role="button" class="btn btn--secondary">Like us on facebook</a>
        </div>
    </div>
</section>