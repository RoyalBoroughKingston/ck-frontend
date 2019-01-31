<div class="title-card__intro">
    <p>Search by <a :href=`#keyword` @click.prevent="smoothScroll"><span class="underline">keyword</span> <i class="fa fa-search" aria-hidden></i></a> <a :href=`#categories` @click.prevent="smoothScroll"><span class="underline">category</span> <i class="fa fa-columns" aria-hidden></i></a> or by <a :href=`#situations` @click.prevent="smoothScroll"><span class="underline">situations</span> <i class="fa fa-users" aria-hidden></i></a></p>
</div>

<section class="section section--header section--header--1 section--header--home" role="banner" id="keyword">
    <div class="flex-container flex-container--justify flex-container--mobile-no-padding">
        <div class="title-card flex-col">
            <h3 class="text-center">I'm looking for <i class="fa fa-search" aria-hidden></i></h3>

            <search-home></search-home>
        </div>
    </div>

    <div class="section__anchor text-center">
        <a href="#categories" class="scroll-to-anchor">
            <p>
                <strong>More options</strong><br>
                <i class="fa fa-angle-down" aria-hidden></i>
            </p>
        </a>
    </div>
</section>

<section id="categories" class="section">
    <div class="flex-container">
        <div class="flex-col flex-col--12 text-center">
            <h3>Browse by category <i class="fa fa-columns" aria-hidden></i></h3>
        </div>
    </div>

    <div class="flex-container">
        <div class="flex-col flex-col--12 highlight highlight--grey text-center">
            <categories></categories>
        </div>
    </div>
</section>

<section class="section section--light-blue" id="situations">
    <div class="flex-container">
        <div class="flex-col flex-col--12 text-center">
            <h3>I want to...</h3>
            <p>Sometimes it's hard to know where to start - here are some suggestions</p>
        </div>
    </div>

    <persona></persona>
</section>