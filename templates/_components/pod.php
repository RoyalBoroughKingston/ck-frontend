<div class="pod">
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
</div>