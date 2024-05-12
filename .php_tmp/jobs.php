<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jobs</title>

  <!-- Embed fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Sora:wght@400;700;800&display=swap" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./images/logo_no_bg.png" />

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="./styles/styles.css" />
</head>

<body>
  <!-- Header -->
  <?php include 'header.inc'; ?>

  <main>
    <div class="jobs__heading">
      <h1>Available Jobs</h1>
      <p>Here are the current <strong>job descriptions</strong> that <strong>YOU</strong> can apply for.</p>
    </div>
    <aside class="jobs__aside">
      <ul>
        <?php
        require_once './settings.php';
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db) or die('Failed to connect to the job database');
        $query = 'SELECT * FROM job';
        $result = @mysqli_query($conn, $query) or die('Failed to retrieve job details');

        if (mysqli_num_rows($result) == 0) {
          echo '<li class="menu"><a href="#">No jobs available</a></li>';
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<li class="menu"><a href="#' . $row['JobRefNum'] . '">' . $row['Title'] . '</a></li>';
          }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
      </ul>
    </aside>
    <br />

    <div class="jobs__content">
      <?php
      require_once './settings.php';
      $conn = @mysqli_connect($host, $user, $pwd, $sql_db) or die('Failed to connect to the job database');
      $query = 'SELECT * FROM job';
      $result = @mysqli_query($conn, $query) or die('Failed to retrieve job details');

      // "CREATE TABLE IF NOT EXISTS job (
      //   JobRefNum CHAR(5) PRIMARY KEY,
      //   Title TEXT NOT NULL,
      //   BriefDescription TEXT NOT NULL,
      //   SalaryRange TEXT NOT NULL,
      //   ReportsTo TEXT NOT NULL,
      //   KeyResponsibilities TEXT NOT NULL,
      //   EssentialRequirements TEXT NOT NULL,
      //   PreferableRequirements TEXT NOT NULL
      // );"

      if (mysqli_num_rows($result) == 0) {
        echo '<h2>No jobs available</h2>';
      } else {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<section id="' . $row['JobRefNum'] . '">';
          echo '<h2><strong>' . $row['Title'] . ' (' . $row['JobRefNum'] . ')</strong></h2>';
          echo '<h3>Brief Description</h3>';
          echo '<p>' . $row['BriefDescription'] . '</p>';
          echo '<br />';
          echo '<h3>Key Information</h3>';
          echo '<p><strong>Position Description Reference Number:</strong> ' . $row['JobRefNum'] . '</p>';
          echo '<p><strong>Salary Range:</strong> ' . $row['SalaryRange'] . '</p>';
          echo '<p><strong>Reporting To:</strong> ' . $row['ReportsTo'] . '</p>';
          echo '<br />';
          echo '<h3>Key responsibilities</h3>';
          echo '<ul>';
          $keyResponsibilities = explode("\n", $row['KeyResponsibilities']);
          foreach ($keyResponsibilities as $keyResponsibility) {
            echo '<li>' . $keyResponsibility . '</li>';
          }
          echo '</ul>';
          echo '<br />';
          echo '<h3>Required Qualifications, Skills, Knowledge, and Attributes</h3>';
          echo '<h4>Essential:</h4>';
          echo '<ol>';
          $essentialRequirements = explode("\n", $row['EssentialRequirements']);
          foreach ($essentialRequirements as $essentialRequirement) {
            echo '<li>' . $essentialRequirement . '</li>';
          }
          echo '</ol>';
          echo '<h4>Preferable:</h4>';
          echo '<ol>';
          $preferableRequirements = explode("\n", $row['PreferableRequirements']);
          foreach ($preferableRequirements as $preferableRequirement) {
            echo '<li>' . $preferableRequirement . '</li>';
          }
          echo '</ol>';
          echo '</section>';
          echo '<br />';
        }

        mysqli_free_result($result);
        mysqli_close($conn);
      }
      ?>
    </div>
    <div class="apply-team__banner">
      <div class="baner__text">
        <h2>Like What You See?</h2>
      </div>
      <div class="banner__press-container">
        <a href="./apply.php" class="banner__press"><strong>Apply Now!</strong></a>
      </div>
    </div>
    <br />
  </main>

  <!-- Footer -->
  <?php include 'footer.inc'; ?>
</body>

</html>