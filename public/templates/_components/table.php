<table class="table table--who-for">
  <tbody>
    {% if ageGroup is defined and ageGroup | length %}
      <tr>
        <td><img src="/assets/dist/img/whos-this-for-icons/age-group.svg" alt="Age group"></td>
        <td class="text-center">Age group</td>
        <td class="sm-copy">{{ ageGroup }}</td>
      </tr>
    {% endif %}
    {% if disability is defined and disability | length %}
      <tr>
        <td><img src="/assets/dist/img/whos-this-for-icons/disability.svg" alt="Disability"></td>
        <td class="text-center">Disability</td>
        <td class="sm-copy">{{ disability }}</td>
      </tr>
    {% endif %}
    {% if employment is defined and employment | length %}
      <tr>
        <td><img src="/assets/dist/img/whos-this-for-icons/employment.svg" alt="Employment"></td>
        <td class="text-center">{{ employment }}</td>
        <td class="sm-copy">Text</td>
      </tr>
    {% endif %}
    {% if gender is defined and gender | length %}
      <tr>
        <td><img src="/assets/dist/img/whos-this-for-icons/gender.svg" alt="Gender"></td>
        <td class="text-center">Gender</td>
        <td class="sm-copy">{{ gender }}</td>
      </tr>
    {% endif %}
    {% if housing is defined and housing | length %}
      <tr>
        <td><img src="/assets/dist/img/whos-this-for-icons/housing.svg" alt="Housing"></td>
        <td class="text-center">{{ housing }}</td>
        <td class="sm-copy">Text</td>
      </tr>
    {% endif %}
    {% if income is defined and income | length %}
      <tr>
        <td><img src="/assets/dist/img/whos-this-for-icons/income.svg" alt="Income"></td>
        <td class="text-center">{{ income }}</td>
        <td class="sm-copy">Text</td>
      </tr>
    {% endif %}
    {% if language is defined and language | length %}
      <tr>
        <td><img src="/assets/dist/img/whos-this-for-icons/language.svg" alt="Language"></td>
        <td class="text-center">Language</td>
        <td class="sm-copy">{{ language }}</td>
      </tr>
    {% endif %}
    {% if other is defined and other | length %}
      <tr>
        <td><img src="/assets/dist/img/whos-this-for-icons/other.svg" alt="Other"></td>
        <td class="text-center">Other</td>
        <td class="sm-copy">{{ other }}</td>
      </tr>
    {% endif %}
  </tbody>
</table>
