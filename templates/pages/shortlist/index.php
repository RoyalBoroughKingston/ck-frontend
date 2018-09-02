<section class="section section--reduce-padding section--header section--header--3">
    <div class="flex-container flex-container--space flex-container--mobile-no-padding">
        <div class="flex-col">
            {% include('templates/_components/title-card.php') with { title: 'Shortlist', enableShare:'true' } %}
        </div>

        <div class="flex-col text-center tablet-hide">
            {% include('templates/_components/title-card.php') with { action: '#', actionText: 'Print services', actionIcon: 'fa fa-print', actionIconPosition: 'before' } %}
        </div>
    </div>
</section>


    <services-shortlist></services-shortlist>

    <div class="flex-container flex-container--justify">
        <div class="flex-col highlight highlight--green text-center">
            {% include('templates/_components/button.php') with { type: 'green', action: '/results', iconPosition: 'before', icon: 'fa fa-plus', text: 'Add more services' } %}
        </div>
    </div>
</section>