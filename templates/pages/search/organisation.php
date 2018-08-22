<section class="section section--header section--header--reduce-padding section--header--3">
    <div class="flex-container flex-container--space">
        <div class="flex-col flex-col--8 flex-col--gutter">
            {% include('templates/_components/title-card.php') with { type: 'variant-0', title: 'SPEAR', description: 'SPEAR is a charity for people experiencing homelessness in SW London including Richmond, Merton, Sutton, Kingston and Wandsworth.' } %}
        </div>

        <div class="flex-col flex-col--4 flex-col--gutter">
            {% include('templates/_components/title-card.php') with { image: 'https://picsum.photos/240/80' } %}
        </div>
    </div>
</section>

<section class="section section--no-padding">
    <div class="flex-container">
        <div class="flex-col flex-col--4 flex-col--gutter">
            {% include('templates/_components/service.php') with { type: 'shortlist', image: 'https://picsum.photos/315/172', name: 'Fresh Start', subTitle: 'SPEAR', description: 'Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...', location: 'Surbiton, Kingston', cost: 'Free', duration: 'Up to 1 week', url: '#', enableActions: 'true' } %}
        </div>

        <div class="flex-col flex-col--4 flex-col--gutter">
            {% include('templates/_components/service.php') with { type: 'shortlist', image: 'https://picsum.photos/315/172', name: 'Fresh Start', subTitle: 'SPEAR', description: 'Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...', location: 'Surbiton, Kingston', cost: 'Free', duration: 'Up to 1 week', url: '#', enableActions: 'true' } %}
        </div>

        <div class="flex-col flex-col--4 flex-col--gutter">
            {% include('templates/_components/service.php') with { type: 'contact', name: 'Contact', description: 'Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...', telephone: '07384 215259', email: 'fsreferrals@spearlondon.org', website: 'www.spearlondon.org/', enableSocial: 'true', facebook: '#', twitter: '#' } %}
        </div>
    </div>
</section>