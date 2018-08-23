<section class="section section--header section--header--1 section--reduce-padding">
    <div class="flex-container flex-container--space">
        <div class="flex-col flex-col--5">
            {% include('templates/_components/title-card.php') with { title: 'Referral form' } %}
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container flex-container--justify text-center">
        <div class="flex-col flex-col--1">
            <img src="/assets/dist/img/symbols/tick.svg" class="img-responsive">
        </div>
    </div>

    <div class="flex-container flex-container--justify text-center">
        <div class="flex-col flex-col--4">
            <h3>You've successfully referred to SPEAR - Fresh Start.</h3>
        </div>
    </div>

    <div class="flex-container flex-container--justify text-center">
        <div class="flex-col flex-col--6">
            <p>You will recieve… Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in odio massa. Nullam tincidunt orci vitae vulputate aliquam. Etiam finibus ultricies arcu, non tempor lacus condimentum quis.</p>
        </div>
    </div>

    <div class="flex-container flex-container--justify text-center">
        <div class="flex-col flex-col--6">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in odio massa.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container flex-container--justify text-center">
        <div class="flex-col flex-col--6 highlight highlight--grey">
            <p>{% include('templates/_components/button.php') with { type: 'secondary', action: '#', text: 'Print page', 'icon': 'fa fa-print', iconPosition: 'after' } %}</p>
            <p>{% include('templates/_components/button.php') with { type: 'primary', small: 'true', action: '#', text: 'Back to service page', 'icon': 'fa fa-angle-right', iconPosition: 'after' } %}</p>
        </div>
    </div>
</section>