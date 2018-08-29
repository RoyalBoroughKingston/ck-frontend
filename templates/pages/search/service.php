<section class="section section--header section--header--reduce-padding section--header--3">
    <service-header></service-header>

    <div class="section__anchor text-center">
        <a href="#main" class="scroll-to-anchor">
            <p>
                <strong>Find out more</strong><br>
                <i class="fa fa-angle-down"></i>
            </p>
        </a>
    </div>
</section>

<section id="main" class="section section--no-padding">
    <service-main></service-main>
</section>

<section class="section section--share">
    <div class="flex-container flex-container--justify">
        <div class="flex-col">
            {% include('templates/_components/title-card.php') with { type: 'share', action: '#print', actionText: 'Print page', actionIcon: 'fa fa-print', actionIconPosition: 'after', enableShare:'true' } %}
        </div>
    </div>
</section>