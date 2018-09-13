<section class="section section--reduce-padding section--header section--header--3 section--header--no-margin-bottom" role="banner">
    <div class="flex-container flex-container--mobile-no-padding flex-container--align-center">
        <div class="flex-col">
            {% include('templates/_components/title-card.php') with { title: 'Shortlist', enableShare:'true' } %}
        </div>

        <div class="flex-col text-center tablet-hide">
            {% include('templates/_components/title-card.php') with { action: '#print', actionText: 'Print services', actionIcon: 'fa fa-print', actionIconPosition: 'before' } %}
        </div>
    </div>
</section>


    <services-shortlist></services-shortlist>

    <div class="flex-container flex-container--justify services-shortlist-add-more">
        <div class="flex-col highlight highlight--green text-center">
            {% include('templates/_components/button.php') with { type: 'green', action: '/results?is_free=true&search_term=&location=', iconPosition: 'before', icon: 'fa fa-plus', text: 'Add more services' } %}
        </div>
    </div>
</section>