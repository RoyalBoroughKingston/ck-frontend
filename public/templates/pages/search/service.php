<service-header></service-header>
<service-main></service-main>
<section class="section section--share">
    <div class="flex-container flex-container--justify">
        <div class="flex-col">
            {% include('templates/_components/title-card.php') with { type: 'share', action: '#print', actionText: 'Print page', actionIcon: 'fa fa-print', actionIconPosition: 'after', enableShare:'true' } %}
        </div>
    </div>
</section>
