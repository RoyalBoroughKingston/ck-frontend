<section class="section section--header section--header--1" role="banner">
    <div class="flex-container flex-container--justify flex-container--mobile-no-padding">
        <div class="title-card flex-col">
            <h3 class="text-center">I'm looking for <i class="fa fa-search"></i></h3>

            <search-home></search-home>
        </div>
    </div>

    <div class="flex-container flex-container--justify flex-container--no-margin mobile-hide">
        <div class="flex-col flex-col--10">
            <p class="text-center color-blue">You can search by keyword, category or by groups</p>
        </div>
    </div>

    <div class="section__anchor text-center">
        <a href="#categories" class="scroll-to-anchor">
            <p>
                <strong>More options</strong><br>
                <i class="fa fa-angle-down"></i>
            </p>
        </a>
    </div>
</section>

<div class="flex-container">
    <div class="flex-col flex-col--12 mobile-show">
        <p class="sm-copy text-center color-blue">You can search by keyword, category or by groups</p>
    </div>
</div>

<section id="categories" class="section">
    <div class="flex-container">
        <div class="flex-col flex-col--12 text-center">
            <h3>Browse by category <i class="fa fa-columns"></i></h3>
        </div>
    </div>

    <div class="flex-container">
        <div class="flex-col flex-col--12 highlight highlight--grey text-center">
            <categories></categories>
        </div>
    </div>
</section>

<section class="section section--light-blue">
    <div class="flex-container">
        <div class="flex-col flex-col--12 text-center">
            <h3>Services for people</h3>
            <p>Sometimes it's hard to know where to start with a problem - here are some suggestions</p>
        </div>
    </div>

    <persona></persona>
</section>

<social-feed></social-feed>

<section class="section mobile-hide">
    <div class="flex-container">
        <div class="flex-col flex-col--7 highlight highlight--grey">
            {% include('templates/_components/media.php') with { type: 'image', imageUrl: '/assets/dist/img/global/CK_Homepage_About.jpg', imageTitle: 'Connected Kingston' } %}
        </div>

        <div class="flex-col flex-col--5">
            {% include('templates/_components/quote.php') with { quote: "We don't want people to start a journey they are not yet ready for!", by: 'Lisa Blackman', what: 'Manager Alfriston Day Centre, Surbiton' } %}
        </div>
    </div>
</section>