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
            <div class="flex-container flex-container--no-padding">
                <div class="flex-col flex-col--12">
                    <h4>Who is this referral for?</h4>
                </div>
            </div>
            
            <div class="flex-container flex-container--no-padding">
                <div class="flex-col flex-col--12">
                    {% include('templates/_components/card.php') with { type: 'notification', colour: 'light-blue', icon: 'fa fa-info-circle', content: "'Myself' is anyone who is refering themselves or a friend." } %}
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>

            <div class="flex-container flex-container--no-padding">
                <div class="flex-col flex-col--12">
                    <form class="form" action="/referral/you" method="post">
                        <div class="field field--radio">
                            <div class="radio">
                                <input type="radio" id="myself" class="input input--radio" name="who_for"/>
                                <label for="myself"><span><span></span></span> Myself</label>
                            </div>

                            <div class="radio">
                                <input type="radio" id="someone_else" class="input input--radio" name="who_for"/>
                                <label for="someone_else"><span><span></span></span> Someone else</label>
                            </div>
                        </div>

                        <p>&nbsp;</p>

                        <div class="form__actions">
                            <button type="submit" name="submit" class="btn btn--icon-after">Continue <i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex-col flex-col--3">
            {% include('templates/_components/service.php') with { type: 'referral', heading: 'Referring to', name: 'Fresh Start', image: 'https://picsum.photos/295/145', subTitle: 'SPEAR', description: 'Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...' } %}
        </div>
    </div>
</section>