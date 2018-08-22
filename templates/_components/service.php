<!-- <div class="service">
    <div class="service__image">
        <img src="https://picsum.photos/315/157" alt="Image title">
        
        <div class="service__add">
            <a href="#" class="btn btn--small" role="button">Add to shortlist <i class="fa fa-star"></i></a>
        </div>
    </div>

    <div class="service__location">
        <i class="fa fa-map-marker-alt"></i>
        <span class="service__location__name">Surbiton, Kingston</span>
    </div>

    <div class="service__meta">
        <div class="service__meta__item sm-copy">
            <i class="fa fa-pound-sign"></i> Free
        </div>
        <div class="service__meta__item sm-copy">
            <i class="fa fa-hourglass"></i> Up to 1 week
        </div>
    </div>

    <div class="service__details">
        <h4 class="service__name">Fresh Start</h4>
        <p class="service__sub-title sm-copy">SPEAR</p>
        <p class="service__description sm-copy">Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...</p>
        <a href="#" class="btn btn--small" role="button">View more <i class="fa fa-angle-right"></i></a>
    </div>
</div> -->

<div class="service">
    <div class="service__details">
        {% if name is defined and name | length %}
            <h4 class="service__name">{{ name }}</h4>
        {% endif %}
        
        {% if subTitle is defined and subTitle | length %}
            <p class="service__sub-title sm-copy">{{ subTitle }}</p>
        {% endif %}

        {% if description is defined and description | length %}
            <p class="service__description sm-copy">{{ description }}</p>
        {% endif %}
    </div>

    {% if location is defined and location | length %}
        <div class="service__location">
            <i class="fa fa-map-marker-alt"></i>
            <span class="service__location__name">{{ location }}</span>
        </div>
    {% endif %}

    {% if telephone is defined and telephone | length %}
        <div class="service__contact service__contact--telephone">
            <span class="sm-copy">
                <i class="fa fa-phone"></i> Telephone
            </span>
            <p>{{ telephone }}</p>
        </div>
    {% endif %}

    {% if email is defined and email | length %}
        <div class="service__contact service__contact--email">
            <span class="sm-copy">
                <i class="fa fa-envelope"></i> Email
            </span>
            <p>{{ email }}</p>
        </div>
    {% endif %}

    {% if enableActions is defined and enableActions | length %}
        <div class="service__actions">
            <a href="#" class="btn btn--small" role="button">View more <i class="fa fa-angle-right"></i></a>
            <a href="#" class="btn btn--small btn--green" role="button">Remove <i class="fa fa-ban"></i></a>
        </div>
    {% endif %}
</div>

<!-- <div class="service">
    <div class="service__header">
        <span>
            <p class="service__name"><strong>Referring to</strong></p>
            <p class="service__sub-title sm-copy mobile-show">Longer organisation name</p>
        </span>
        <span class="mobile-show">
            <i class="fa fa-angle-down"></i>
        </span>
    </div>

    <div class="service__image">
        <img src="https://picsum.photos/315/157" alt="Image title">
    </div>

    <div class="service__details">
        <h4 class="service__name">Fresh Start</h4>
        <p class="service__sub-title sm-copy mobile-hide">SPEAR</p>
        <p class="service__description sm-copy">Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...</p>
    </div>
</div> -->