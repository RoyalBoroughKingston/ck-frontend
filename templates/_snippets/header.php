<header class="header">
  <div class="flex-container flex-container--align-center flex-container--justify">
    <div class="flex-col flex-col--6 flex-col--tablet--12 header__brand">
      <figure class="logo">
        <a href="/"><img src="/assets/dist/img/global/logo.png" alt="Connected Kingston" class="img-responsive"/></a>
      </figure>

      <button type="button" name="nav-trigger" class="nav-trigger tablet-show">
        <label for="nav-trigger"></label>
        <i class="bars fa fa-bars"></i>
      </button>
    </div>

    <div class="flex-col flex-col--6 flex-col--tablet--12 header__navigation tablet-hide">
      <nav class="nav nav--primary" role="navigation">
        <a href="/" class="nav__link <?php if ($CURRENT_PAGE == "index") {?>active<?php }?>" role="menuitem">Search</a>
        <a href="/about" class="nav__link <?php if ($CURRENT_PAGE == "about") {?>active<?php }?>" role="menuitem">About</a>
        <a href="/contact" class="nav__link <?php if ($CURRENT_PAGE == "contact") {?>active<?php }?>" role="menuitem">Contact</a>
      </nav>

      <a href="/shortlist" class="btn btn--small btn--secondary btn--shortlist btn--icon-before"><i class="fa fa-star"></i> View shortlist</a>
    </div>

    <div id="google_translate_element"></div>

    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
      }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </div>
</header>
