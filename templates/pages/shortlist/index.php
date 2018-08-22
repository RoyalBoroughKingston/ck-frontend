<section class="section section--header section--header--3">
    <div class="flex-container flex-container--space">
        <div class="flex-col">
            {% include('templates/_components/title-card.php') with { title: 'Shortlist', enableShare:'true' } %}
        </div>

        <div class="flex-col text-center">
            {% include('templates/_components/title-card.php') with { action: '#', actionText: 'Print services', actionIcon: 'fa fa-print', actionIconPosition: 'before' } %}
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container">
        <div class="flex-col flex-col--12">
            <p class="sm-copy color-grey text-center">2 services shortlisted</p>
        </div>
    </div>

    <div class="flex-container flex-container--padding flex-container--justify">
        <div class="flex-col flex-col--4 flex-col--gutter">
            {% include('templates/_components/service.php') with { type: 'service', name: 'Fresh Start', subTitle: 'SPEAR', description: 'Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...', location: 'Surbiton, Kingston', telephone: '07384 215259', email: 'fsreferrals@spearlondon.org', enableActions: 'true' } %}
        </div>

        <div class="flex-col flex-col--4 flex-col--gutter">
            {% include('templates/_components/service.php') with { type: 'service', name: 'Fresh Start', subTitle: 'SPEAR', description: 'Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...', location: 'Surbiton, Kingston', telephone: '07384 215259', email: 'fsreferrals@spearlondon.org', enableActions: 'true' } %}
        </div>
    </div>

    <div class="flex-container flex-container--justify">
        <div class="flex-col highlight highlight--green text-center">
            {% include('templates/_components/button.php') with { type: 'green', action: '#', iconPosition: 'before', icon: 'fa fa-plus', text: 'Add more services' } %}
        </div>
    </div>
</section>