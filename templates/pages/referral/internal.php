<section class="section section--header section--header--1 section--reduce-padding">
    <div class="flex-container flex-container--space">
        <div class="flex-col flex-col--5">
            {% include('templates/_components/title-card.php') with { title: 'Referral form' } %}
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container flex-container--space">
        <div class="flex-col flex-col--7 flex-col--gutter">
            <p>You have requested to be connected with <strong>SPEAR - Fresh Start</strong>. In order to make a referral you will be asked to complete a short form to collect some basic information which will then be sent directly to <strong>SPEAR</strong> - who will then contact you directly.</p>
            <p>&nbsp;</p>
            <p class="sm-copy color-grey">This form should take you <strong>no longer than 5 minutes</strong> to complete.</p>
            {% include('templates/_components/button.php') with { action: '/referral/who', text: 'Continue', icon: 'fa fa-angle-right', iconPosition: 'after' } %}
        </div>

        <div class="flex-col flex-col--3">
            {% include('templates/_components/service.php') with { type: 'referral', heading: 'Referring to', name: 'Fresh Start', image: 'https://picsum.photos/295/145', subTitle: 'SPEAR', description: 'Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...' } %}
        </div>
    </div>
</section>