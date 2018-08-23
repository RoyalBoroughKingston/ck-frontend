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

  {% if content is defined and content | length %}
    <div class="card__content">
      <p {% if type is defined and type != 'notification' %}class="sm-copy"{% endif %}>{{ content | raw }}</p>
    </div>
  {% endif %}
</div>

<!-- <div class="card card--grey card--location">
  <div class="card__location flex-col flex-col--6">
    <p class="card__location__name"><strong>New Malden Library</strong></p>
    <p class="card__location__address">
      Kingston Rd<br>
      New Malden<br>
      Surrey<br>
      KT3 3LY
    </p>
    <p class="card__location__distance sm-copy">0.3 miles away</p>
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

  <div class="card__services flex-col flex-col--12">
    <img src="/assets/dist/img/access-icons/level-access-automatic-doors.png" alt="">
    <img src="/assets/dist/img/access-icons/access-by-ramps-slopes-manual-doors.png" alt="">
    <img src="/assets/dist/img/access-icons/mobility-impaired-walker.png" alt="">
  </div>
</div>

<div class="card card--grey card--location">
  <div class="card__location flex-col flex-col--6">
    <p class="card__location__name"><strong>New Malden Library</strong></p>
    <p class="card__location__address">
      Kingston Rd<br>
      New Malden<br>
      Surrey<br>
      KT3 3LY
    </p>
    <p class="card__location__distance sm-copy">0.3 miles away</p>
  </div>

  <div class="card__hours flex-col flex-col--6">
    <div class="card__hours__times card__hours__times--two-column">
      <table>
        <tbody>
          <tr>
            <td class="sm-copy">Wednesday</td>
            <td>10:30am-12pm</td>
          </tr>
          <tr>
            <td class="sm-copy">Thursday</td>
            <td>10:30am-12pm</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="card__services flex-col flex-col--12">
    <img src="/assets/dist/img/access-icons/level-access-automatic-doors.png" alt="">
    <img src="/assets/dist/img/access-icons/access-by-ramps-slopes-manual-doors.png" alt="">
    <img src="/assets/dist/img/access-icons/mobility-impaired-walker.png" alt="">
  </div>
</div>

<div class="card card--border-blue">
  <h4 class="card__title">Useful information</h4>

  <blockquote>
    <p>Parking</p>
    <p class="sm-copy">Parking available at the Hook Centre, no parking available at other sites</p>
  </blockquote>

  <blockquote>
    <p>What to bring</p>
    <p class="sm-copy">If you have a CV feel free to bring a copy with you.</p>
  </blockquote>
</div>

<div class="card card--notification card--mint">
  <div class="card__icon">
    <i class="fa fa-pound-sign"></i>
  </div>

  <div class="card__content">
    <p>Free</p>
    <p class="sm-copy">This service cost no money.</p>
  </div>
</div>

<div class="card card--notification card--light-blue">
  
</div>

<div class="card card--reduce-padding card--border-blue text-center">
  <div class="card__content">
    <img src="https://picsum.photos/245/125" alt="">
    <p>Royal Borough of Kingston</p>
    <p class="sm-copy"><a href="https://www.kingston.gov.uk/">https://www.kingston.gov.uk/</a></p>
  </div>
</div> -->