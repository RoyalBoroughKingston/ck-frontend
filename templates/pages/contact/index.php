<section class="section section--header section--header--1 section--reduce-padding">
    <div class="flex-container flex-container--mobile-no-padding">
        <div class="flex-col flex-col--5">
            {% include('templates/_components/title-card.php') with { title: 'Contact us' } %}
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container">
        <div class="flex-col flex-col--7">
            <div class="section__component">
                <p>Connected Kingston online support is currently provided by Kingston Voluntary Action. Please contact them using the telephone no. or email address opposite:</p>
            </div>

            <div class="section__component">
                <h3>Other key contacts:</h3>
                <p><strong>In an emergency, always dial 999.</strong></p>
                <p>
                    <strong>The Silver Line:</strong><br>
                    0800 4 70 80 90 - a confidential helpline providing information, friendship and advice to older people, open 24 hours a day, every day of the year.
                </p>
                <p>
                    <strong>Samaritans:</strong><br>
                    116 123 - a 24 hour emotional support helpline (Free to call)
                </p>
                <p>
                    <strong>Sane Emotional Support:</strong><br>
                    0845 767 8000 - provides crisis support (6pm to 11pm seven days a week)
                </p>
                <p>
                    <strong>ChildLine:</strong><br>
                    0800 1111 - a 24 hour private and confidential helpline for children
                </p>
            </div>
        </div>

        <div class="flex-col flex-col--3">
            {% include('templates/_components/service.php') with { type: 'contact', name: 'Contact', telephone: '020 8255 3335', email: 'info@connectedkingston.com', enableSocial: 'true', facebook: '#', twitter: '#' } %}
        </div>
    </div>
</section>

<social-feed></social-feed>