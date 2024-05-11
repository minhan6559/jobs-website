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
    <!-- About-Hero -->
    <div class="container">
      <div class="about-hero">
        <section class="about-hero__main">
          <div class="about-hero__inner">
            <!-- About-Hero Text -->
            <section class="about-hero__text-info">
              <div class="about__heading">
                Our team:
              </div>
              <dl class="team-definition-list">
                <dt>Group name:</dt>
                <dd>Group 1</dd>
                <dt>Tutor's Name:</dt>
                <dd>Feixue Yan</dd>
                <dt>Course:</dt>
                <dd>Bachelor of Computer Science</dd>
                <dt>Timetable:</dt>
                <dd> </dd>
              </dl>

              <table>
                <tr>
                  <th>Day</th>
                  <th>Time</th>
                  <th>Room</th>
                </tr>
                <tr>
                  <td>Wednesday</td>
                  <td>3:30pm - 6:30pm</td>
                  <td>ATC420 & EN409</td>
                </tr>
              </table>

              <div class="banner__button-container">
                <a href="mailto:group.1.swinburne.2024@gmail.com" class="email__button">Email Us</a>
              </div>
            </section>
          </div>
        </section>

        <!-- Hero Collage --> <!-- core code was created with assistance from Minh An Nguyen-->
        <section class="about-hero__collage">
          <div class="container">
            <div class="about-hero__collage__inner">
              <!-- Hero Collage Row 1 -->
              <div class="about-hero__collage__row1">
                <img class="about-hero__collage__img" src="./images/about-hero__collage_01.jpg" alt="Business women smiling at work" />
                <img class="about-hero__collage__img" src="./images/about-hero__collage_02.jpg" alt="Business women smiling at work" />
                <img class="about-hero__collage__img" src="./images/about-hero__collage_03.jpg" alt="Business man smiling at work" />
              </div>
              <!-- Hero Collage Row 2 -->
              <div class="about-hero__collage__row2">
                <img class="about-hero__collage__img" src="./images/about-hero__collage_04.jpg" alt="Two Business women smiling working together" />
                <img class="about-hero__collage__img" src="./images/about-hero__collage_05.jpg" alt="Business man smiling at work" />
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <div class="container">
      <!-- Team Member Grid -->
      <div class="team__grid">

        <!-- Minh An Nguyen -->
        <div class="team__member">
          <img src="./images/MinhAnNguyen.jpg" alt="Smiling young man">
          <div class="team__member-info">
            <h3>Minh An Nguyen</h3>
            <p>Team Leader</p>
          </div>
          <div class="team__member-content">
            <p>
              Meet <strong>Minh An Nguyen</strong>, our Project Manager who brings a mix of creativity and savvy
              planning to the table. Leading with heart, Minh guides our projects from the drawing board to the finish
              line, ensuring we're breaking new ground every time. When hes not at the helm, you can find him up on his
              rooftop garden, getting his hands dirty and showing the same care and dedication to his plants. Minh's
              leadership style? Think of it as a greenhouse: everything inside grows stronger and reaches higher.
            </p>
          </div>
        </div>

        <!-- Dashiel Rao -->
        <div class="team__member">
          <img src="./images/dashiel_rao.jpg" alt="Dancing young man">
          <div class="team__member-info">
            <h3>Dashiel Rao</h3>
            <p>Communicaton Expert</p>
          </div>
          <div class="team__member-content">
            <p>
              <strong>Dashiel Rao</strong>, our resident communcicator, knows just how to get our message across,
              blending insight with imagination. Hes the wizard behind the curtain, ensuring our story is not just heard
              but felt, across every platform. Dashiels not all work though; he loves diving into novels from around the
              globe, convinced that a good story is like a secret passage to new worlds. He brings this same
              storytelling magic to our brand, making sure were not just speaking our truths but living them.
            </p>
          </div>
        </div>

        <!-- Brodie Hughes -->
        <div class="team__member">
          <img src="./images/brodie_hughes.jpg" alt="Happy young man">
          <div class="team__member-info">
            <h3>Brodie Hughes</h3>
            <p>Timeline Coordinator</p>
          </div>
          <div class="team__member-content">
            <p>
              <strong>Brodie Hughes</strong> is the master of deadlines around here, keeping us all on track and making
              sure we hit our marks with style to spare. Think of him as the calm in the storm, especially when the
              clocks ticking. Outside the office, Brodie seeks out the adrenaline rush of adventure sports, a testament
              to his belief that the best way to live is by always pushing the limits. Its this blend of precision under
              pressure and a thirst for challenges that makes him an essential piece of our puzzle.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Join Team Text -->
    <div class="join-team__banner">
      <div class="banner__text">
        <h1>Join Us</h1>
      </div>
      <!-- Join Team Button -->
      <div class="banner__button-container">
        <a href="./jobs.php" class="banner__button">View Jobs</a>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include 'footer.inc'; ?>
</body>

</html>