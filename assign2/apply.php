<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apply</title>

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
    <div class="form__container">
      <!-- Form -->
      <div class="form">
        <form action="processEOI.php" method="post" novalidate="novalidate">
          <div class="job__title">
            <h1>Job Application</h1>
          </div>

          <fieldset class="form-input-container">
            <label for="jobRef">*Job Reference Number:</label>
            <input type="text" id="jobRef" name="job_reference_number" pattern="[A-Za-z0-9]{5}" title="Exactly 5 alphanumeric characters" placeholder="e.g ABC12" required>
            <span class="error-message" id="jobRef-error"></span>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="firstName">*First Name:</label>
            <input type="text" id="firstName" name="first_name" pattern="[A-Za-z]{1,20}" title="Max 20 alpha characters" required>
            <span class="error-message" id="firstName-error"></span>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="lastName">*Last Name:</label>
            <input type="text" id="lastName" name="last_name" pattern="[A-Za-z]{1,20}" title="Max 20 alpha characters" required>
            <span class="error-message" id="lastName-error"></span>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="dob">*Date of Birth:</label>
            <input type="text" id="dob" name="date_of_birth" pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/\d{4}" title="Date format dd/mm/yyyy, e.g., 31/12/1999" placeholder="dd/mm/yyyy" required>
            <span class="error-message" id="dob-error"></span>
          </fieldset>

          <fieldset class="form-input-container-visible">
            <legend>*Gender:</legend>
            <div class="skills__field">
              <input type="radio" id="male" name="gender" value="male" tabindex="0" class="skill__input" required>
              <label for="male" class="skill__label">Male</label>

              <input type="radio" id="female" name="gender" value="female" class="skill__input" required>
              <label for="female" class="skill__label">Female</label>

              <input type="radio" id="other" name="gender" value="other" class="skill__input" required>
              <label for="other" class="skill__label">Other</label>
            </div>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="address">*Street Address:</label>
            <input type="text" id="address" name="street_address" required>
            <span class="error-message" id="address-error"></span>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="suburb">*Suburb/Town:</label>
            <input type="text" id="suburb" name="suburb_town" required>
            <span class="error-message" id="suburb-error"></span>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="state">*State:</label>
            <select id="state" name="state" required>
              <option value="">Select a state</option>
              <option value="NSW">NSW</option>
              <option value="VIC">VIC</option>
              <option value="QLD">QLD</option>
              <option value="WA">WA</option>
              <option value="SA">SA</option>
              <option value="TAS">TAS</option>
              <option value="ACT">ACT</option>
              <option value="NT">NT</option>
            </select>
            <span class="error-message" id="state-error"></span>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="postcode">*Postcode:</label>
            <input type="text" id="postcode" name="postcode" pattern="\d{4}" title="Exactly 4 digits" placeholder="e.g 6330" required>
            <span class="error-message" id="postcode-error"></span>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="email">*Email Address:</label>
            <input type="email" id="email" name="email_address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="e.g John@Smith.com" required>
            <span class="error-message" id="email-error"></span>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="phone">*Phone Number:</label>
            <input type="tel" id="phone" name="phone_number" pattern="\d{8,12}|\d{8,12}( |\d)*" title="8 to 12 digits, or spaces" placeholder="e.g 0411222333" required>
            <span class="error-message" id="phone-error"></span>
          </fieldset>

          <fieldset class="form-input-container-visible">
            <legend>*Please select your skills:</legend>
            <div class="skills__field">

              <input type="checkbox" id="project_management" name="skills[]" value="project_management" class="skill__input" tabindex="0">
              <label for="project_management" class="skill__label">Project Management</label>

              <input type="checkbox" id="data_analysis" name="skills[]" value="data_analysis" class="skill__input" tabindex="0">
              <label for="data_analysis" class="skill__label">Data Analysis</label>

              <input type="checkbox" id="other_skills" name="skills[]" value="other" class="skill__input" tabindex="0">
              <label for="other_skills" class="skill__label">Other skills...</label>
            </div>
          </fieldset>

          <fieldset class="form-input-container">
            <label for="otherSkills">Other Skills:</label>
            <textarea id="otherSkills" name="other_skills"></textarea>
          </fieldset>

          <div class="submit__btn-container">
            <input type="submit" value="Apply" class="submit__btn">
          </div>
        </form>

      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include 'footer.inc'; ?>
</body>

</html>