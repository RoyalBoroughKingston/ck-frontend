<div class="quote">
    <p class="quote__icons"><i class="fa fa-quote-left"></i> <i class="fa fa-quote-right"></i></p>

    {% if quote is defined and quote | length %}
        <p class="quote__quote"><strong>{{ quote }}</strong></p>
    {% endif %}

    {% if by is defined and by | length %}
        <p class="quote__by">{{ by }}</p>
    {% endif %}

    {% if what is defined and what | length %}
        <p class="quote__what sm-copy">{{ what }}</p>
    {% endif %}
</div>