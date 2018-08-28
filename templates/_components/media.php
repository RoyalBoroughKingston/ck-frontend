<div class="media">
    <div class="responsive-embed">
        {% if type is defined and type | length %}
            {% if type == 'video' and embedCode is defined and embedCode | length %}
                {{ embedCode | raw }}
            {% endif %}
        {% endif %}
    </div>
</div>