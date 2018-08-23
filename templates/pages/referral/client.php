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
                    <p>Step 2 of 3</p>
                    <h2>About the client</h2>
                </div>
            </div>

            <div class="flex-container flex-container--no-padding">
                <div class="flex-col flex-col--12">
                    <form class="form" action="/referral/consent" method="post">
                        <div class="flex-container flex-container--no-padding">
                            <div class="field flex-col flex-col--8">
                                <label for="client_name">Name</label>
                                <input type="text" class="input input--text" name="client_name" placeholder="Enter here"/>
                            </div>

                            <div class="field field--has-description flex-col flex-col--8">
                                <label for="postcode">Postcode</label>
                                <p class="field__description sm-copy">You have to be in the Kingston area to use this service</p>
                                <input type="text" class="input input--text" name="postcode" placeholder="Enter here"/>
                            </div>
                        </div>

                        <div class="flex-container flex-container--no-padding">
                            <div class="flex-col flex-col--12">
                                <h4>How can we contact the client?</h4>
                                <p class="color-grey">You have to input at least one contact information to continue</p>
                            </div>
                        </div>

                        <div class="flex-container flex-container--no-padding">
                            <div class="field field--radio">
                                <div class="radio radio--stack">
                                    <input type="radio" id="email" class="input input--radio input--reveal" name="client_contact"/>
                                    <label for="email"><span><span></span></span> Email</label>

                                    <div class="radio__input">
                                        <input type="text" class="input input--text" name="email" placeholder="Enter here"/>
                                    </div>
                                </div>

                                <div class="radio radio--stack">
                                    <input type="radio" id="telephone" class="input input--radio input--reveal" name="client_contact"/>
                                    <label for="telephone"><span><span></span></span> Telephone</label>

                                    <div class="radio__input">
                                        <input type="text" class="input input--text" name="telephone" placeholder="Enter here"/>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-col flex-col--12">
                                <p><a href="#" class="link">I can't provide an email/phone</a></p>
                                <p>&nbsp;</p>
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