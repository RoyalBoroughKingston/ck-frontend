<div class="service{% if type is defined %} service--{{type}}{% endif %}">
    {% if type is defined and type == 'contact' or type == 'referral' %}
        <div class="service__header">
            <span>
                {% if type == 'referral' and heading is defined and heading | length %}
                    <p class="service__name"><strong>{{ heading }}</strong></p>
                {% elseif name is defined and name | length %}
                    <p class="service__name"><strong>{{ name }}</strong></p>
                {% endif %}

                {% if subTitle is defined and subTitle | length %}
                    <p class="service__sub-title sm-copy mobile-show">{{ subTitle }}</p>
                {% endif %}
            </span>
            <span class="mobile-show">
                <i class="fa fa-angle-down"></i>
            </span>
        </div>
    {% endif %}

    {% if image is defined and image | length %}
        <div class="service__image">
            <img src="https://picsum.photos/315/157" alt="Image title">
            
            {% if type is defined and type == 'shortlist' %}
                <div class="service__add">
                    <a href="#" class="btn btn--small{% if added == 'true' %} btn--green{% endif %}" role="button">{% if added == 'true' %}In your shortlist{% else %}Add to shortlist{% endif %} <i class="fa fa-star"></i></a>
                </div>
            {% endif %}
        </div>
    {% endif %}

    {% if type is defined and type != 'shortlist' and type != 'contact' %}
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
    {% endif %}

    {% if location is defined and location | length %}
        <div class="service__location">
            <i class="fa fa-map-marker-alt"></i>
            <span class="service__location__name">{{ location }}</span>
        </div>
    {% endif %}

    {% if cost is defined and cost | length or duration is defined and duration | length %}
        <div class="service__meta">
            {% if cost is defined and cost | length %}
                <div class="service__meta__item sm-copy">
                    <i class="fa fa-pound-sign"></i> {{ cost }}
                </div>
            {% endif %}

            {% if duration is defined and duration | length %}
                <div class="service__meta__item sm-copy">
                    <i class="fa fa-hourglass"></i> {{ duration }}
                </div>
            {% endif %}
        </div>
    {% endif %}

    {% if telephone is defined and telephone | length %}
        <div class="service__contact service__contact--telephone">
            <span class="sm-copy">
                <i class="fa fa-phone"></i> Telephone
            </span>
            <a href="tel:{{ telephone }}">{{ telephone }}</a>
        </div>
    {% endif %}

    {% if email is defined and email | length %}
        <div class="service__contact service__contact--email">
            <span class="sm-copy">
                <i class="fa fa-envelope"></i> Email
            </span>
            <a href="mailto:{{ email }}">{{ email }}</a>
        </div>
    {% endif %}

    {% if website is defined and website | length %}
        <div class="service__contact service__contact--website">
            <span class="sm-copy">
                <i class="fa fa-globe"></i> Website
            </span>
            <a href="{{ website }}">{{ website }}</a>
        </div>
    {% endif %}

    {% if type is defined and type == 'shortlist' %}
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

            <a {% if url is defined and url | length %}href="{{ url }}"{% endif %} class="btn btn--small" role="button">View more <i class="fa fa-angle-right"></i></a>
        </div>
    {% endif %}

    {% if enableActions is defined and enableActions | length and type is defined and type != 'shortlist' %}
        <div class="service__actions">
            <a href="#" class="btn btn--small" role="button">View more <i class="fa fa-angle-right"></i></a>
            <a href="#" class="btn btn--small btn--green" role="button">Remove <i class="fa fa-ban"></i></a>
        </div>
    {% endif %}

    {% if enableSocial is defined and enableSocial | length and type is defined and type == 'contact' %}
        <div class="service__social">
            {% if facebook is defined and facebook | length %}
                <a href="{{ facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            {% endif %}

            {% if twitter is defined and twitter | length %}
                <a href="{{ twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
            {% endif %}
        </div>
    {% endif %}
</div>