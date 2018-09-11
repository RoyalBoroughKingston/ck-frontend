<div class="media">
    {% if type is defined and type | length %}
        {% if type == 'video' and embedCode is defined and embedCode | length %}
            <div class="responsive-embed">
                {{ embedCode | raw }}
            </div>
        {% endif %}

        {% if type == 'image' and imageUrl is defined and imageUrl | length %}
            <img src="{{ imageUrl }}" {% if imageTitle is defined and imageTitle | length %}alt="{{ imageTitle }}"{% endif %} class="img-responsive">
        {% endif %}
    {% endif %}
</div>