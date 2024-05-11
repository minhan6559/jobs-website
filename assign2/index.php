<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

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
    <!-- Hero -->
    <section class="hero__main">
      <div class="hero__inner">
        <!-- Hero Info  -->
        <section class="hero__main-info">
          <h1>
            Find freelance and fulltime developer jobs
          </h1>
          <div class="hero__main-desc">
            <strong>TECH PULSE</strong> is a IT service provider that works with businesses to provide end to end IT
            solutions. <br> <br>
            Click this <a href="https://youtu.be/JRUysmyHYm4?si=Tna4e8SbrLs_ZjeJ">Link</a> to watch the demonstration
            video for assignment 1. <br> <br>
          </div>
          <div class="hero__search">
            <a href="./jobs.php" class="hero__text">
              <div class="hero__btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                  <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                  </path>
                </svg>
              </div>
              <p>Search jobs</p>
            </a>
          </div>
        </section>

        <!-- Hero image -->
        <img src="./styles/images/hero__img.png" alt="A man holding a laptop" class="hero__img">
      </div>
    </section>

    <!-- Spotlight -->
    <section class="spotlight" id="spotlight">
      <div class="container">
        <div class="spotlight__inner">
          <!-- Spotlight Info -->
          <h1 class="spotlight__head">Why choose us</h1>
          <h2 class="spotlight__des">The things make the differences</h2>

          <!-- Spotlight List -->
          <div class="spotlight__list">
            <!-- Spotlight item 1 -->
            <div class="spotlight__item">
              <img class="spotlight__img" src="./images/spotlight_01.jpg" alt="A meeting">
              <div class="spotlight__info">
                <h3 class="spotlight__heading">About Tech Pulse</h3>
                <p class="spotlight__desc">
                  As a team we aim to source and employ passionate individuals who are able to assist and support
                  businesses where needed!
                </p>
              </div>
            </div>
            <!-- Spotlight item 2 -->
            <div class="spotlight__item">
              <img class="spotlight__img" src="./images/spotlight_02.jpg" alt="Working at home">
              <div class="spotlight__info">
                <h3 class="spotlight__heading">Flexible working environment</h3>
                <p class="spotlight__desc">
                  We prioritize work-life balance with flexible hours and remote work options, empowering you to thrive
                  in a schedule that suits you.
                </p>
              </div>
            </div>
            <!-- Spotlight item 3 -->
            <div class="spotlight__item">
              <img class="spotlight__img" src="./images/spotlight_03.jpg" alt="Another meeting">
              <div class="spotlight__info">
                <h3 class="spotlight__heading">Collaboration & Positivity
                </h3>
                <p class="spotlight__desc">
                  Our team thrives on collaboration! We're a passionate bunch who support each other, fostering a
                  positive environment where your unique contributions are valued.
                </p>
              </div>
            </div>
            <!-- Spotlight item 4 -->
            <div class="spotlight__item">
              <img class="spotlight__img" src="./images/spotlight_04.jpg" alt="Working on the chair">
              <div class="spotlight__info">
                <h3 class="spotlight__heading">Innovation</h3>
                <p class="spotlight__desc">
                  Tech Pulse is involved with many cutting edged projects that allow its staff the autonomy and
                  independence to explore and learn some of the latest tech developments.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Workplace -->
    <section class="workplace" id="workplace">
      <div class="container">
        <div class="workplace__inner">
          <!-- Workplace row 1 -->
          <div class="workplace__row1">
            <img class="workplace__img" src="./images/workplace_01.jpg" alt="People share their idea">
            <img class="workplace__img" src="./images/workplace_02.jpg" alt="Quiet workplace">
            <img class="workplace__img" src="./images/workplace_03.jpg" alt="People in their break time">
          </div>
          <!-- Workplace row 2 -->
          <div class="workplace__row2">
            <img class="workplace__img" src="./images/workplace_04.jpg" alt="A joyful meeting">
            <img class="workplace__img" src="./images/workplace_05.jpg" alt="Whole workplace">
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section class="about" id="about__pc">
      <div class="container">
        <div class="about__inner">
          <!-- About context -->
          <div class="about__context">
            <div class="about__top">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                </path>
              </svg>
              <div class="about__heading">
                <a href="./about.php">About Us</a>
              </div>
            </div>
            <div class="about__desc">The team creates a breakthrough</div>
            <img class="about__img" src="./images/about_01.jpg" alt="New idea">
          </div>

          <!-- About content -->
          <div class="about__content">
            <div class="about__team">
              <a href="./about.php" class="about__info">
                <h2 class="about__name">Minh An</h2>
                <span class="about__role"></span>
              </a>
            </div>
            <div class="about__team">
              <a href="./about.php" class="about__info">
                <h2 class="about__name">Dashiel</h2>
                <span class="about__role"></span>
              </a>
            </div>
            <div class="about__team">
              <a href="./about.php" class="about__info">
                <h2 class="about__name">Brodie</h2>
                <span class="about__role"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="spotlight" id="about__mobile">
      <div class="container">
        <div class="spotlight__inner">
          <!-- Spotlight Info -->
          <div class="about__context">
            <div class="about__top">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                </path>
              </svg>
              <div class="about__heading">
                <a href="./about.php">About Us</a>
              </div>
            </div>
            <div class="about__desc">The team creates a breakthrough</div>
            <img class="about__img" src="./images/about_01.jpg" alt="New idea">
          </div>
          <!-- Spotlight List -->
          <div class="spotlight__list">
            <!-- Spotlight item 1 -->
            <div class="spotlight__item">
              <img class="spotlight__img" src="./images/MinhAnNguyen.jpg" alt="Minh An image">
              <div class="spotlight__info">
                <h3 class="spotlight__heading">Minh An Nguyen</h3>
                <p class="spotlight__desc">
                  Meet <strong>Minh An Nguyen</strong>, our Project Manager who brings a mix of creativity and savvy
                  planning to the table.
                </p>
              </div>
            </div>
            <!-- Spotlight item 2 -->
            <div class="spotlight__item">
              <img class="spotlight__img" src="./images/dashiel_rao.jpg" alt="Dashiel Image">
              <div class="spotlight__info">
                <h3 class="spotlight__heading">Dashiel Rao</h3>
                <p class="spotlight__desc">
                  <strong>Dashiel Rao</strong>, our resident communcicator, knows just how to get our message across,
                  blending insight with imagination.
                </p>
              </div>
            </div>
            <!-- Spotlight item 3 -->
            <div class="spotlight__item">
              <img class="spotlight__img" src="./images/brodie_hughes.jpg" alt="Brodie Image">
              <div class="spotlight__info">
                <h3 class="spotlight__heading">Brodie Hughes
                </h3>
                <p class="spotlight__desc">
                  <strong>Brodie Hughes</strong> is the master of deadlines around here, keeping us all on track and
                  making
                  sure we hit our marks with style to spare.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Job -->
    <section class="job">
      <div class="container">
        <div class="job__inner">
          <!-- Job content -->
          <div class="job__content">
            <div class="job__info"><strong>Jobs</strong> Category</div>
            <div class="btn">
              <a href="./apply.php">Apply now</a>
            </div>
          </div>

          <!-- Job list -->
          <div class="job__list">
            <!-- Job item 1 -->
            <a href="./jobs.php" class="job__item">
              <svg class="job__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z">
                </path>
              </svg>
              <p class="job__title">Cybersecurity Specialist</p>
              <span class="job__desc">3500 Job Vacancy</span>
            </a>
            <!-- Job item 2 -->
            <a href="./jobs.php" class="job__item">
              <svg class="job__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                </path>
              </svg>
              <p class="job__title">Data Engineer</p>
              <span class="job__desc">750 Job Vacancy</span>
            </a>
            <!-- Job item 3 -->
            <a href="./jobs.php" class="job__item">
              <svg class="job__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                <path d="M176 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64c-35.3 0-64 28.7-64 64H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64v56H24c-13.3 0-24 10.7-24 24s10.7 24 24 24H64c0 35.3 28.7 64 64 64v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448h56v40c0 13.3 10.7 24 24 24s24-10.7 24-24V448c35.3 0 64-28.7 64-64h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V280h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448V176h40c13.3 0 24-10.7 24-24s-10.7-24-24-24H448c0-35.3-28.7-64-64-64V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H280V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H176V24zM160 128H352c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H160c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32zm192 32H160V352H352V160z">
                </path>
              </svg>
              <p class="job__title">Software Developer</p>
              <span class="job__desc">8520 Job Vacancy</span>
            </a>
            <!-- Job item 4 -->
            <a href="./jobs.php" class="job__item">
              <svg class="job__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                <path d="M512 256c0 .9 0 1.8 0 2.7c-.4 36.5-33.6 61.3-70.1 61.3H344c-26.5 0-48 21.5-48 48c0 3.4 .4 6.7 1 9.9c2.1 10.2 6.5 20 10.8 29.9c6.1 13.8 12.1 27.5 12.1 42c0 31.8-21.6 60.7-53.4 62c-3.5 .1-7 .2-10.6 .2C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-96a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM288 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 96a32 32 0 1 0 0-64 32 32 0 1 0 0 64z">
                </path>
              </svg>
              <p class="job__title">IT Support Specialist</p>
              <span class="job__desc">120 Job Vacancy</span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <?php include 'footer.inc'; ?>
</body>

</html>