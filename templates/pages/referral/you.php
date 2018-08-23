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
                    <p>Step 1 of 3</p>
                    <h2>About you</h2>
                </div>
            </div>

            <div class="flex-container flex-container--no-padding">
                <div class="flex-col flex-col--12">
                    <form class="form" action="/referral/client" method="post">
                        <div class="flex-container flex-container--no-padding">
                            <div class="field flex-col flex-col--8">
                                <label for="your_name">Name</label>
                                <input type="text" class="input input--text" name="your_name" placeholder="Enter here"/>
                            </div>

                            <div class="field field--select flex-col flex-col--8">
                                <label for="organisation">What organisation are you with?</label>
                                <select class="select" name="organisation">
                                    <option>Option</option>
                                    <option>Option</option>
                                    <option>Option</option>
                                    <option>Option</option>
                                    <option>Option</option>
                                </select>

                                <p>&nbsp;</p>

                                <p><a href="#" class="linkr">Cant see my organisation</a></p>
                            </div>
                        </div>

                        <div class="flex-container flex-container--no-padding">
                            <div class="flex-col flex-col--12">
                                <h4>How can we contact you?</h4>
                                <p class="color-grey">This information will be used to get in contact about problems, updates, and if any extra information is needed.</p>
                            </div>
                        </div>

                        <div class="flex-container flex-container--no-padding">
                            <div class="field flex-col flex-col--8">
                                <label for="email">Email</label>
                                <input type="email" class="input input--text" name="email" placeholder="Enter here"/>
                            </div>

                            <div class="field flex-col flex-col--8">
                                <label for="telephone">Telephone</label>
                                <input type="email" class="input input--text" name="telephone" placeholder="Enter here"/>
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