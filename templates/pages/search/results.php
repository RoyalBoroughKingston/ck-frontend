<section class="section section--header section--header--reduce-padding section--header--1">
    <div class="flex-container flex-container--space flex-container--align-bottom">
        <div class="flex-col flex-col--7">
            {% include('templates/_components/title-card.php') with { type: 'variant-3', enableSearch: 'true' } %}
        </div>

        <div class="flex-col">
            {% include('templates/_components/title-card.php') with { reducePadding: 'true', enableSearchFilter: 'true' } %}
        </div>
    </div>
</section>

<section class="section section--no-padding">
    <div class="flex-container flex-container--align-center flex-container--space">
        <div class="flex-col">
            <p class="sm-copy color-grey">5 services found</p>
        </div>

        <div class="flex-col">
            <div class="field field--select">
                <label class="field__description">Sort results by:</label>
                <select class="select">
                    <option>Distance</option>
                </select>
            </div>
        </div>
    </div>

    <services-grid></services-grid>

    <!-- <div class="flex-container">
        <div class="flex-col flex-col--12">
            {{ include('templates/_components/map.php') }}
        </div>
    </div> -->
</section>