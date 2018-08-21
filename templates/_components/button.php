
<a href="#" class="btn{% if type is defined and type != 'primary' %} btn--{{type}}{% endif %}{% if small is defined and small == 'true' %} btn--small{% endif %}{% if iconPosition is defined %} btn--icon-{{iconPosition}}{% endif %}" role="button">{% if icon is defined and iconPosition is defined and iconPosition == 'before' %}<i class="{{icon}}"></i> {% endif %}{% if text is defined and text | length %}{{text}}{% endif %}{% if icon is defined and iconPosition is defined and iconPosition == 'after' %} <i class="{{icon}}"></i>{% endif %}</a>

<!-- <a href="#" class="btn" role="button">Search <i class="fa fa-search"></i></a>
<a href="#" class="btn disabled" role="button">Search <i class="fa fa-search"></i></a>
<a href="#" class="btn btn--small" role="button">Search <i class="fa fa-search"></i></a>

<a href="#" class="btn btn--secondary" role="button">Living at home <i class="fa fa-home"></i></a>
<a href="#" class="btn btn--secondary disabled" role="button">Living at home <i class="fa fa-home"></i></a>
<a href="#" class="btn btn--secondary btn--small" role="button">Living at home <i class="fa fa-home"></i></a>

<a href="#" class="btn btn--toggle" role="button">Grid <i class="fa fa-th-large"></i></a>
<a href="#" class="btn btn--toggle active" role="button">Map <i class="fa fa-map"></i></a>

<a href="#" class="btn btn--small" role="button">Add to shortlist <i class="fa fa-star"></i></a>
<a href="#" class="btn btn--small active" role="button">Add to shortlist <i class="fa fa-star"></i></a>

<a href="#" class="btn btn--secondary btn--small btn--shortlist" role="button"><i class="fa fa-star"></i> View shortlist</a>
<a href="#" class="btn btn--secondary btn--small btn--shortlist active" role="button"><i class="fa fa-star"></i> View shortlist</a> -->