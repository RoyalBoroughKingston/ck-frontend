<section class="section section--header section--header--reduce-padding section--header--3">
    <service-header></service-header>
</section>

<section class="section section--no-padding">
    <div class="flex-container flex-container--space">
        <div class="flex-col flex-col--7 flex-col--gutter">
            <div class="section__component">
                <h4>About</h4>
                <p class="sm-copy color-grey">Our friendly staff offer help with CV writing, cover letters, Universal Jobmatch, setting up email and basic IT skills.<br>
                For New Malden library the session is held in the computer room upstairs.</p>
            </div>
            
            <div class="section__component">
                <h4>Where I can access this service</h4>

                {% include('templates/_components/card.php') with { type: 'location', frame: 'grey', locationName: 'New Malden Library', locationAddress: 'Kingston Rd<br>New Malden<br>Surrey<br>KT3 3LY', locationDistance: '0.3 miles away' } %}
                {% include('templates/_components/card.php') with { type: 'location', frame: 'grey', locationName: 'New Malden Library', locationAddress: 'Kingston Rd<br>New Malden<br>Surrey<br>KT3 3LY', locationDistance: '0.3 miles away' } %}
            </div>

            <div class="section__component">
                <h4>Who is this service for</h4>

                {% include('templates/_components/table.php') with { ageGroup: 'Text', disability: 'Text', employment: 'Text', gender: 'Text', housing: 'Text', income: 'Text', language: 'Text', other: 'Text' } %}
            </div>

            <div class="section__component">
                {% include('templates/_components/card.php') with { frame: 'border-blue', title: 'Useful information', usefulInformation: [{"title": "How to apply", "description": "Lorem ipsum", "order": 1},{"title": "How to apply", "description": "Lorem ipsum", "order": 2}] } %}
            </div>

            <div class="section__component">
                {% include('templates/_components/media.php') with { type: 'video', embedCode: '<iframe width="560" height="315" src="https://www.youtube.com/embed/NpEaa2P7qZI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>' } %}
            </div>

            <div class="section__component">
                {% include('templates/_components/quote.php') with { quote: "I'm a regular user and I find the support extremely helpful especially for those going through a transient period in their life.  Really useful to know that people are out there to offer support.  I've had help to draw up a plan, the staff really know their stuff.", by: 'Rachel', what: 'Coffee morning regular' } %}
            </div>
        </div>

        <div class="flex-col flex-col--4 flex-col--gutter">
            <div class="section__component text-center">
                {% include('templates/_components/button.php') with { type: 'secondary', action: '#print', text: 'Print page', icon: 'fa fa-print', iconPosition: 'after' } %}
            </div>

            <div class="section__component">
                {% include('templates/_components/card.php') with { type: 'notification', colour: 'mint', icon: 'fa fa-pound-sign', content: "Free", description: "This service costs no money." } %}
                {% include('templates/_components/service.php') with { type: 'contact', name: 'Contact', description: 'Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...', telephone: '07384 215259', email: 'fsreferrals@spearlondon.org', website: 'www.spearlondon.org/', enableSocial: 'true', facebook: '#', twitter: '#', instagram: '#' } %}
                {% include('templates/_components/card.php') with {  } %}
            </div>

            <div class="section__component">
                {% include('templates/_components/card.php') with { type: 'reduce-padding', frame: 'border-blue', image: '/assets/dist/img/global/royal-borough-of-kingston.jpg', contentCenter: 'true', content: 'Royal Borough of Kingston', description: '<a href="https://www.kingston.gov.uk/" target="_blank">https://www.kingston.gov.uk/</a>' } %}
            </div>

            <div class="section__component text-center">
                <p class="sm-copy"><span class="color-grey">Page last updated</span> <em>11th May 2018</em></p>
                <p class="sm-copy"><a href="#">Give us feedback</a></p>
            </div>
        </div>
    </div>
</section>