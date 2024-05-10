<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enhancements</title>

  <!-- Embed fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Sora:wght@400;700;800&display=swap" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./images/logo_no_bg.png">

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>

<body>
  <!-- Header -->
  <?php include 'header.inc'; ?>

  <main>
    <section class="enhancements">
      <div class="container">
        <!-- First enhacement -->
        <section class="first-enhacement">
          <h2 class="enhacement__heading">Responsive</h2>
          <ul class="enhacement__desc">
            <li>
              Responsive layout for 3 different screen sizes: desktop, tablet, and mobile.
            </li>
            <li>
              The layout will adjust to the
              screen size and provide better user experience.
            </li>
            <li>
              Implemented using <strong>CSS Grid</strong>, <strong>Flex Box</strong> and <strong>Media Query</strong>.
            </li>
            <li>
              Reference of responsive nav bar: <a href="https://youtu.be/HYy4c6lcOlM?si=KFMyqYGA1WaIQuF5">F8 Offical</a>
            </li>
          </ul>
          <div class="enhacement__wrap">
            <img src="./images/enhancement01.jpg" alt="desktop" class="enhacement__img">
            <img src="./images/enhancement02.jpg" alt="tablet" class="enhacement__img">
            <img src="./images/enhancement03.jpg" alt="mobile" class="enhacement__img">
          </div>
        </section>

        <!-- Second enhacement -->
        <section class="second-enhacement">
          <h2 class="enhacement__heading">Animation</h2>
          <ul class="enhacement__desc">
            <li>
              Smooth transition between elements.
            </li>
            <li>
              The animations improves user experience and the overall look of the website.
            </li>
            <li>
              Implemented using <strong>CSS Transition</strong> and <strong>Transform</strong>.
            </li>
            <li>
              Referenced from <a href="https://tnqan.github.io/Literary-Dreams/" target="blank">Literary Dreams</a> and
              <a href="https://codepen.io/kristen17/pen/wvPebxy">Kristen17</a>.
            </li>
          </ul>

          <div class="enhancement__direct">
            <div class="enhacement__list">
              <img src="./images/spotlight_01.jpg" alt="A meeting" class="enhacement__item">
              <img src="./images/spotlight_02.jpg" alt="Working at home" class="enhacement__item">
              <img src="./images/spotlight_03.jpg" alt="Another meeting" class="enhacement__item">
            </div>
            <a href="./index.html#spotlight" class="btn">
              <span class="ennhancement__action">See more</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="enhancement__icon">
                <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z">
                </path>
              </svg>
            </a>
          </div>

          <div class="enhancement__direct">
            <div class="enhacement__wrap">
              <img src="./images/workplace_01.jpg" alt="People share their idea" class="enhacement__img">
              <img src="./images/workplace_02.jpg" alt="Quiet workplace" class="enhacement__img">
              <img src="./images/workplace_03.jpg" alt="People at break time" class="enhacement__img">
            </div>
            <a href="./index.html#workplace" class="btn">
              <span class="ennhancement__action">See more</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="enhancement__icon">
                <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z">
                </path>
              </svg>
            </a>
          </div>
        </section>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <?php include 'footer.inc'; ?>
</body>

</html>