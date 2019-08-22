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

    {% if enableShare is defined and enableShare == 'true' %}
        <div class="title-card__share">
            <label for="">Share</label>
            
            <social-share></social-share>
        </div>
    {% endif %}
</div>