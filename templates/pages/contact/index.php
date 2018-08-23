<section class="section section--header section--header--1 section--reduce-padding">
    <div class="flex-container flex-container--space">
        <div class="flex-col flex-col--5">
            {% include('templates/_components/title-card.php') with { title: 'Contact us' } %}
        </div>
    </div>
</section>

<section class="section">
    <div class="flex-container flex-container--space">
        <div class="flex-col flex-col--7">
            <div class="section__component">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in odio massa. Nullam tincidunt orci vitae vulputate aliquam. Etiam finibus ultricies arcu, non tempor lacus condimentum quis.</p>
            </div>

            <div class="section__component">
                <p><a href="#" class="link link--icon-after">Would you like to be a volunteer? <i class="fa fa-angle-right"></i></a></p>
                <p><a href="#" class="link link--icon-after">Would you like to leave feedback? <i class="fa fa-angle-right"></i></a></p>
            </div>
        </div>

        <div class="flex-col flex-col--3">
            {% include('templates/_components/service.php') with { type: 'contact', name: 'Contact', description: 'Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...', telephone: '01245 360803', email: 'info@cwkingston.com', enableSocial: 'true', facebook: '#', twitter: '#' } %}
        </div>
    </div>
</section>

<section class="section section--social-media">
    <div class="flex-container">
        <div class="flex-col flex-col--12">
            <h3>Hear from us</h3>
        </div>
    </div>

    <div class="flex-container text-center">
        <div class="flex-col flex-col--4">
            {% include('templates/_components/card.php') with { type: 'social', frame: 'white', platform: 'twitter', content: "We're proud to supporting the homeless, refugees and many more in the Kingston area. Find out more about becoming a Community Health Champion here 👉 <a href='#'>https://t.co/3BFo2D0S3g</a>" } %}
            {% include('templates/_components/button.php') with { type: 'secondary', action: '#', target: '_blank', text: 'Follow us on twitter' } %}
        </div>

        <div class="flex-col flex-col--2"></div>

        <div class="flex-col flex-col--4">
            {% include('templates/_components/card.php') with { type: 'social', frame: 'white', platform: 'facebook', content: "We're proud to supporting the homeless, refugees and many more in the Kingston area. Find out more about becoming a Community Health Champion here 👉 <a href='#'>https://t.co/3BFo2D0S3g</a>" } %}
            {% include('templates/_components/button.php') with { type: 'secondary', action: '#', target: '_blank', text: 'Like us on facebook' } %}
        </div>
    </div>
</section>