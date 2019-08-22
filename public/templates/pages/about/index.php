<section class="section section--header section--header--1 section--reduce-padding" role="banner">
    <div class="flex-container flex-container--mobile-no-padding">
        <div class="flex-col flex-col--5">
            {% include('templates/_components/title-card.php') with { title: 'About us' } %}
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container flex-container--justify">
        <div class="flex-col flex-col--6">
            <div class="section__component">
                <p>Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. It is run by the Royal Borough of Kingston Council and Kingston Voluntary Action in conjunction with local charities and statutory organisations. Special training is available to anyone who regularly comes into contact with people that may be struggling to navigate or find local activities or services.</p>

                <p>Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.</p>
            </div>

            <div class="section__component">
                <p><a href="/contact" class="link link--icon-after">Contact us here <i class="fa fa-angle-right" aria-hidden></i></a></p>
            </div>

            {% include('templates/_components/media.php') with { type: 'video', embedCode: '<iframe width="560" height="315" src="https://www.youtube.com/embed/h-2sgpokvGI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>' } %}

        </div>
    </div>
</section>