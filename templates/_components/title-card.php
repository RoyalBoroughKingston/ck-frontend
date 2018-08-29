<div class="title-card{% if type is defined and type | length %} title-card--{{type}}{% endif %}{% if reducePadding is defined and reducePadding == 'true' %} title-card--reduce-padding{% endif %}{% if type is defined and type == 'service' or type == 'share' %} text-center{% endif %}">
    {% if title is defined and title | length %}
        <h2 class="title-card__title">{{ title }}</h2>
    {% elseif enableSearch is defined and enableSearch == 'true' %}
        <h4 class="title-card__title">Results for</h4>
    {% endif %}

    {% if image is defined and image | length %}
        <div class="title-card__image">
            <img src="{{ image }}" {% if title is defined and title | length %}alt="{{ title }}"{% endif %}>
        </div>
    {% endif %}

    {% if description is defined and description | length %}
        <div class="title-card__description">
            <p>{{ description }}</p>
        </div>
    {% endif %}

    {% if action is defined or actionTitle is defined %}
        <div class="title-card__action">
            {% if actionTitle is defined and actionTitle | length %}
                <h4 class="title-card__action__title">Drop in only</h4>
            {% endif %}

            {% if action is defined and action | length %}
                <a href="{{ action }}" class="btn btn--secondary{% if actionIcon is defined and actionIcon | length %} btn--icon-{{actionIconPosition}}{% endif %}" role="button">{% if actionIcon is defined and actionIcon | length and actionIconPosition == 'before' %}<i class="{{ actionIcon }}"></i> {% endif %}{% if actionText is defined and actionText | length %}{{ actionText }}{% endif %}{% if actionIcon is defined and actionIcon | length and actionIconPosition == 'after' %} <i class="{{ actionIcon }}"></i>{% endif %}</a>
            {% endif %}

            {% if secondaryAction is defined and secondaryAction | length %}
                <a href="{{ secondaryAction }}" class="btn{% if secondaryActionIcon is defined and secondaryActionIcon | length %} btn--icon-{{secondaryActionIconPosition}}{% endif %}" role="button">{% if secondaryActionIcon is defined and secondaryActionIcon | length and secondaryActionIconPosition == 'before' %}<i class="{{ secondaryActionIcon }}"></i> {% endif %}{% if secondaryActionText is defined and secondaryActionText | length %}{{ secondaryActionText }}{% endif %}{% if secondaryActionIcon is defined and secondaryActionIcon | length and secondaryActionIconPosition == 'after' %} <i class="{{ secondaryActionIcon }}"></i>{% endif %}</a>
            {% endif %}
        </div>
    {% endif %}

    {% if type is defined and type == 'service' %}
        <div class="title-card__action">
            <p><a href="#" class="btn btn--green btn--small btn--icon-after">Shortlist <i class="fa fa-star"></i></a></p>
            <p><a href="#" class="btn btn--icon-after">Connect <i class="fa fa-arrow-right"></i></a></p>

            <p><strong>Please contact the service directly</strong></p>
        </div>
    {% endif %}

    {% if enableShare is defined and enableShare == 'true' %}
        <div class="title-card__share">
            <label for="">Share</label>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fa fa-link"></i></a>
            <a href="#"><i class="fa fa-envelope"></i></a>
        </div>
    {% endif %}

    {% if enableSearch is defined and enableSearch == 'true' %}
        <div class="title-card__form">
            <search-results></search-results>
        </div>
    {% endif %}

    {% if enableSearchFilter is defined and enableSearchFilter == 'true' %}
        <div class="title-card__form">
            <p class="sm-copy color-grey">View as</p>

            <div class="field field--buttons">
                <div class="field__buttons">
                    {% include('templates/_components/button.php') with { type: 'toggle', active: 'true', action: '#', text: 'Grid', icon: 'fa fa-th-large', iconPosition: 'after' } %}
                    {% include('templates/_components/button.php') with { type: 'toggle', action: '#', text: 'Map', icon: 'fa fa-map', iconPosition: 'after' } %}
                </div>
            </div>
        </div>
    {% endif %}
</div>