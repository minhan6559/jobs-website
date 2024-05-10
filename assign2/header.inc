
  <!-- PC header -->
  <header class="header">
    <div class="container">
      <div class="header__inner">
        <!-- Tablet/Mobile menu -->
        <!-- Header Hamburger -->
        <label for="header__checkbox" class="header__ham">
          &zwnj;
          <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512">
            <path fill="currentColor"
              d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z">
            </path>
          </svg>
        </label>

        <!-- Logo -->
        <div class="logo__wrap logo__center">
          <a href="#" class="logo__img">
            <img src="./images/logo_no_bg.png" alt="Tech Pulse Logo">
          </a>

          <span class="logo__text">
            <span class="logo__text-brand">Tech</span>
            <span class="logo__text-brand logo__text-brand--small">Pulse</span>
          </span>
        </div>

        <!-- Navbar -->
        <nav class="navbar">
          <ul class="navbar__list">
            <li class="navbar__item">
              <a href="./index.php">Home</a>
            </li>
            <li class="navbar__item">
              <a href="./about.php">About</a>
            </li>
            <li class="navbar__item">
              <a href="./jobs.php">Jobs</a>
            </li>
            <li class="navbar__item">
              <a href="./apply.php">Apply</a>
            </li>
            <li class="navbar__item">
              <a href="./enhancements.php">Enhancements</a>
            </li>
          </ul>
        </nav>

        <!-- Header action -->
        <div class="btn header__action">
          <a href="mailto:group.1.swinburne.2024@gmail.com" target="blank">CONTACT US</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Tablet/Mobile header -->
  <header class="header__mobile">
    <input type="checkbox" name="header__checkbox" id="header__checkbox" class="header__checkbox" hidden>

    <!-- Menu content -->
    <div class="header__drawer">
      <!-- Navbar -->
      <nav class="navbar">
        <ul class="navbar__res">
          <li class="navbar__item">
            <a href="./index.php">Home</a>
          </li>
          <li class="navbar__item">
            <a href="./about.php">About</a>
          </li>
          <li class="navbar__item">
            <a href="./jobs.php">Jobs</a>
          </li>
          <li class="navbar__item">
            <a href="./apply.php">Apply</a>
          </li>
          <li class="navbar__item">
            <a href="./enhancements.php">Enhancements</a>
          </li>
          <li class="navbar__item navbar__hidden">
            <a href="mailto:group.1.swinburne.2024@gmail.com" target="blank">Contact Us</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>