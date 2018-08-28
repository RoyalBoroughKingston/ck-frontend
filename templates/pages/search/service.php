<section class="section section--header section--header--reduce-padding section--header--3">
    <div class="flex-container flex-container--space">
        <div class="flex-col flex-col--8 flex-col--gutter">
            {% include('templates/_components/title-card.php') with { type: 'variant-0', title: 'Job Club', description: 'We can offer help with CV writing, cover letters, Universal Jobmatch, setting up email and basic IT skills.' } %}
        </div>

        <div class="flex-col flex-col--4 flex-col--gutter">
            {% include('templates/_components/title-card.php') with { action: '#', actionText: 'Shortlist', actionIcon: 'fa fa-star', actionIconPosition: 'after', secondaryAction: '#', secondaryActionText: 'Connect', secondaryActionIcon: 'fa fa-angle-right', secondaryActionIconPosition: 'after' } %}
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container">
        <div class="flex-col flex-col--6">
            <h4>About</h4>
            <p class="sm-copy">Our friendly staff offer help with CV writing, cover letters, Universal Jobmatch, setting up email and basic IT skills.<br>
            For New Malden library the session is held in the computer room upstairs.</p>
            <h4>Where I can access this service</h4>
        </div>
    </div>
</section>