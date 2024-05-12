<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Process EOI</title>
</head>

<body>
<?php

//Disables direct connections to processEOI.php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  header("Location: apply.php");
  exit();
}

//Server Information
$servername = "feenix-mariadb.swin.edu.au";
$username = "s104844794";
$password = "260804";
$dbname = "s104844794_db";

//Creates new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $jobRefNumber = mysqli_real_escape_string($conn, $_POST['job_reference_number']);
  $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
  $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
  $dob = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $streetAddress = mysqli_real_escape_string($conn, $_POST['street_address']);
  $suburbTown = mysqli_real_escape_string($conn, $_POST['suburb_town']);
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
  $emailAddress = mysqli_real_escape_string($conn, $_POST['email_address']);
  $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
  $otherSkills = mysqli_real_escape_string($conn, $_POST['other_skills']);

  // Validate form inputs
  $errors = [];

  // Job reference number exactly 5 alphanumeric characters
  if (!preg_match('/^[A-Za-z0-9]{5}$/', $jobRefNumber)) {
      $errors[] = "Job reference number must be exactly 5 alphanumeric characters.";
  }

  // First name max 20 alpha characters
  if (!preg_match('/^[A-Za-z]{1,20}$/', $firstName)) {
      $errors[] = "First name must be maximum 20 alphabetical characters.";
  }

  // Last name max 20 alpha characters
  if (!preg_match('/^[A-Za-z]{1,20}$/', $lastName)) {
      $errors[] = "Last name must be maximum 20 alphabetical characters.";
  }

  // Date of birth dd/mm/yyyy between 15 and 80
  $dobParts = explode('/', $dob);
  if (count($dobParts) === 3 && checkdate($dobParts[1], $dobParts[0], $dobParts[2])) {
      $dobTimestamp = strtotime("$dobParts[2]-$dobParts[1]-$dobParts[0]");
      $minTimestamp = strtotime('-80 years');
      $maxTimestamp = strtotime('-15 years');
      if ($dobTimestamp < $minTimestamp || $dobTimestamp > $maxTimestamp) {
          $errors[] = "Date of birth must be between 15 and 80 years ago.";
      }
  } else {
      $errors[] = "Invalid date of birth format (dd/mm/yyyy).";
  }

  // Gender selected
  if (empty($gender)) {
      $errors[] = "Gender is required.";
  }

  // Street Address max 40 characters
  if (strlen($streetAddress) > 40) {
      $errors[] = "Street address must be maximum 40 characters.";
  }

  // Suburb/town max 40 characters
  if (strlen($suburbTown) > 40) {
      $errors[] = "Suburb/town must be maximum 40 characters.";
  }

  // State One of VIC,NSW,QLD,NT,WA,SA,TAS,ACT
  $validStates = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];
  if (!in_array($state, $validStates)) {
      $errors[] = "Invalid state.";
  }

  // Postcode exactly 4 digits – matches state
  if (!preg_match('/^\d{4}$/', $postcode)) {
      $errors[] = "Postcode must be exactly 4 digits.";
  } elseif ($state === 'VIC' && substr($postcode, 0, 1) !== '3') {
      $errors[] = "Postcode does not match state.";
  } elseif ($state === 'NSW' && substr($postcode, 0, 1) !== '1') {
      $errors[] = "Postcode does not match state.";
  } elseif ($state === 'QLD' && substr($postcode, 0, 1) !== '4') {
      $errors[] = "Postcode does not match state.";
  } elseif ($state === 'NT' && substr($postcode, 0, 1) !== '0') {
      $errors[] = "Postcode does not match state.";
  } elseif ($state === 'WA' && substr($postcode, 0, 1) !== '6') {
      $errors[] = "Postcode does not match state.";
  } elseif ($state === 'SA' && substr($postcode, 0, 1) !== '5') {
      $errors[] = "Postcode does not match state.";
  } elseif ($state === 'TAS' && substr($postcode, 0, 1) !== '7') {
      $errors[] = "Postcode does not match state.";
  } elseif ($state === 'ACT' && substr($postcode, 0, 1) !== '0') {
      $errors[] = "Postcode does not match state.";
  }

  // Email address validate format
  if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Invalid email address format.";
  }

  // Phone number 8 to 12 digits, or spaces
  if (!preg_match('/^[\d\s]{8,12}$/', $phoneNumber)) {
      $errors[] = "Phone number must be 8 to 12 digits, or spaces.";
  }

  // Other skills not empty if check box selected
  if (isset($_POST['skills']) && in_array('other', $_POST['skills']) && empty($otherSkills)) {
    $errors[] = "Other skills are required.";
  }

  // Displays any validation errors
  if (!empty($errors)) {
      echo "<h2>Validation Errors:</h2>";
      foreach ($errors as $error) {
          echo "<p>$error</p>";
      }
  } else {

      $skills = '';
      if (!empty($_POST['skills'])) {
          $skills = implode(',', $_POST['skills']);
      }

      // SQL to insert data
      $sql = "INSERT INTO eoi (JobRefNumber, FirstName, LastName, StreetAddress, SuburbTown, State, Postcode, EmailAddress, PhoneNumber, Skills, OtherSkills)
      VALUES ('$jobRefNumber', '$firstName', '$lastName', '$streetAddress', '$suburbTown', '$state', '$postcode', '$emailAddress', '$phoneNumber', '$skills', '$otherSkills')";

      if ($conn->query($sql) === TRUE) {
          $eoinumber = $conn->insert_id;
          echo "New record created successfully. Your EOI number is: " . $eoinumber;
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
}

// Close connection
$conn->close();
?>
</body>

</html>