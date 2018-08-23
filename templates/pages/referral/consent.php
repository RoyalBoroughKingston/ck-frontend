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
                    <p>Step 3 of 3</p>
                    <h2>Does the client give consent?</h2>
                </div>
            </div>

            <div class="flex-container flex-container--no-padding">
                <p>The details that you have entered in the previous steps will be shared with SPEAR who will directly contact you to lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in odio massa.</p>
            </div>

            <div class="flex-container flex-container--no-padding">
                <div class="flex-col flex-col--12">
                    <form class="form" action="/referral/complete" method="post">
                        <div class="flex-container flex-container--no-padding">
                            <div class="flex-col flex-col--12">
                                <p>&nbsp;</p>
                            </div>

                            <div class="field field--radio">
                                <div class="radio radio--stack">
                                    <input type="radio" id="yes" class="input input--radio" name="consent" value="yes"/>
                                    <label for="yes"><span><span></span></span> I give consent</label>
                                </div>

                                <div class="radio radio--stack">
                                    <input type="radio" id="no" class="input input--radio" name="consent" value="no"/>
                                    <label for="no"><span><span></span></span> I do not give consent</label>
                                </div>
                            </div>
                        </div>

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