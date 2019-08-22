<div class="pod">
    {% if link is defined and link | length %}
        <a href="{{ link }}">
    {% endif %}

    {% if image is defined and image | length %}
        <div class="pod__image">
            <img src="{{image}}" {% if title is defined and title | length %}alt="{{ title }}"{% endif %}>
        </div>
    {% endif %}

    <div class="pod__content">
        {% if title is defined and title | length %}
            <p class="pod__title"><strong>{{title}}</strong></p>
        {% endif %}
    </div>
    
    {% if link is defined and link | length %}
        </a>
    {% endif %}
</div>