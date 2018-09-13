<div class="card{% if frame is defined and frame | length %} card--{{frame}}{% endif %}{% if type is defined and type | length %} card--{{ type }}{% endif %}{% if colour is defined and colour | length %} card--{{ colour }}{% endif %}">
  {% if type == 'notification' and icon is defined and icon | length %}
    <div class="card__icon">
      <i class="{{ icon }}"></i>
    </div>
  {% endif %}

  {% if type is defined and type == 'social' %}
    <div class="card__header">
      <div class="card__header__meta">
        <p><strong>Connected Kingston</strong></p>
        
        <p class="sm-copy">
          {% if platform is defined and platform == 'twitter' %}
            <span>@ConnectedKingtson</span>
          {% endif %}
          
          <span>21h</span>
        </p>
      </div>

      <div class="card__header__icon">
        {% if platform is defined and platform == 'twitter' %}
          <i class="fab fa-twitter"></i>
        {% elseif platform is defined and platform == 'facebook' %}
          <i class="fab fa-facebook"></i>
        {% endif %}
      </div>
    </div>
  {% endif %}

  {% if title is defined and title | length %}
    <h4 class="card__title">{{ title }}</h4>
  {% endif %}

  {% if content is defined and content | length or description is defined and description | length or image is defined and image | length %}
    <div class="card__content{% if contentCenter ==  'true' %} text-center{% endif %}">
      {% if image is defined and image | length %}
        <img src="{{ image }}" {% if imageTitle is defined and imageTitle | length %}alt="{{ imageTitle }}"{% endif %} class="card__image">
      {% endif %}
      
      
      <p {% if type is defined and type != 'notification' %}class="sm-copy"{% endif %}>{{ content | raw }}</p>
      
      {% if description is defined and description | length %}
        <p class="sm-copy">{{ description | raw }}</p>
      {% endif %}
    </div>
  {% endif %}

  {% if type is defined and type == 'location' %}
    <div class="card__location flex-col flex-col--6">
      {% if locationName is defined and locationName | length %}
        <p class="card__location__name"><strong>{{ locationName }}</strong></p>
      {% endif %}

      {% if locationAddress is defined and locationAddress | length %}
        <p class="card__location__address">
          {{ locationAddress | raw }}
        </p>
      {% endif %}

      {% if locationDistance is defined and locationDistance | length %}
        <p class="card__location__distance sm-copy">{{ locationDistance }}</p>
      {% endif %}
    </div>

    <div class="card__hours flex-col flex-col--6">
      <div class="card__hours__times">
        <table>
          <tbody>
            <tr>
              <td class="sm-copy">Wednesday</td>
            </tr>
            <tr>
              <td>10:30am-12pm</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  {% endif %}

  {% if usefulInformation is defined and usefulInformation | length %}
    <div class="flex-col flex-col--12">
      {% for info in usefulInformation %}
        <blockquote>
          <p>{{ info.title }}</p>
          <p class="sm-copy">{{ info.description }}</p>
        </blockquote>
      {% endfor %}
    </div>
  {% endif %}
</div>