<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process EOI</title>
    <meta name="description" content="Page to process EOI application">
    <meta name="keywords" content="eoi, application">
    <meta name="author" content="TechPulse">

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
    <?php
    function sanitize_input($conn, $data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($conn, $data);
        return $data;
    }
    //Disables direct connections to processEOI.php
    if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_SERVER['HTTP_REFERER'])) {
        header('location:apply.php');
        exit;
    }
    include 'header.inc';
    require_once 'settings.php';

    echo '<div class="result__container">';
    $back_btn = "<div class=\"banner__press-container\">
            <a href=\"./apply.php\" class=\"banner__press\"><strong>Back to Apply Page</strong></a>
            </div>";

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db) or die("<p>Unable to connect to the server</p>");

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jobRefNumber = sanitize_input($conn, $_POST['job_reference_number']);
        $firstName = sanitize_input($conn, $_POST['first_name']);
        $lastName = sanitize_input($conn, $_POST['last_name']);
        $dob = sanitize_input($conn, $_POST['date_of_birth']);
        $gender = sanitize_input($conn, $_POST['gender']);
        $streetAddress = sanitize_input($conn, $_POST['street_address']);
        $suburbTown = sanitize_input($conn, $_POST['suburb_town']);
        $state = sanitize_input($conn, $_POST['state']);
        $postcode = sanitize_input($conn, $_POST['postcode']);
        $emailAddress = sanitize_input($conn, $_POST['email_address']);
        $phoneNumber = sanitize_input($conn, $_POST['phone_number']);
        $project_management = isset($_POST['project_management']) ? 1 : 0;
        $data_analysis = isset($_POST['data_analysis']) ? 1 : 0;
        $otherSkills = sanitize_input($conn, $_POST['other_skills']);

        // Validate form inputs
        $errors = [];

        // Job reference number exactly 5 alphanumeric characters and must exist in the job table
        if (!preg_match('/^[A-Za-z0-9]{5}$/', $jobRefNumber)) {
            $errors[] = "Job reference number must be exactly 5 alphanumeric characters.";
        }

        $query = "SELECT * FROM job WHERE RefNum = '$jobRefNumber'";
        $result = @mysqli_query($conn, $query) or die("<p>Unable to execute the query</p>");

        if (mysqli_num_rows($result) === 0) {
            $errors[] = "Job reference number does not exist.";
        }
        mysqli_free_result($result);

        // First name max 20 alpha characters
        if (!preg_match('/^[A-Za-z]{1,20}$/', $firstName)) {
            $errors[] = "First name must be maximum 20 alphabetical characters.";
        }

        // Last name max 20 alpha characters
        if (!preg_match('/^[A-Za-z]{1,20}$/', $lastName)) {
            $errors[] = "Last name must be maximum 20 alphabetical characters.";
        }

        // Date of birth dd/mm/yyyy between 15 and 80
        if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $dob)) {
            $errors[] = "Invalid date of birth format (dd/mm/yyyy).";
        } else {
            $dobParts = explode('/', $dob);
            if (count($dobParts) === 3 && checkdate($dobParts[1], $dobParts[0], $dobParts[2])) {
                $dobTimestamp = strtotime("$dobParts[2]-$dobParts[1]-$dobParts[0]");
                $minTimestamp = strtotime('-80 years');
                $maxTimestamp = strtotime('-15 years');
                if ($dobTimestamp < $minTimestamp || $dobTimestamp > $maxTimestamp) {
                    $errors[] = "Date of birth must be between 15 and 80 years ago.";
                }
            } else {
                $errors[] = "Invalid date of birth format (dd/mm/yyyy) or invalid date.";
            }
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
        } else {
            $postcode_int = (int)$postcode;
            if ($state === 'VIC' && ($postcode_int < 3000 || $postcode_int > 3999)) {
                $errors[] = "Postcode does not match state.";
            } elseif ($state === 'NSW' && !(($postcode_int >= 2000 && $postcode_int <= 2599) || ($postcode_int >= 2619 && $postcode_int <= 2899) || ($postcode_int >= 2921 && $postcode_int <= 2999))) {
                $errors[] = "Postcode does not match state.";
            } elseif ($state === 'QLD' && ($postcode_int < 4000 || $postcode_int > 4999)) {
                $errors[] = "Postcode does not match state.";
            } elseif ($state === 'NT' && ($postcode_int < 800 || $postcode_int > 999)) {
                $errors[] = "Postcode does not match state.";
            } elseif ($state === 'WA' && ($postcode_int < 6000 || $postcode_int > 6797)) {
                $errors[] = "Postcode does not match state.";
            } elseif ($state === 'SA' && ($postcode_int < 5000 || $postcode_int > 5799)) {
                $errors[] = "Postcode does not match state.";
            } elseif ($state === 'TAS' && ($postcode_int < 7000 || $postcode_int > 7999)) {
                $errors[] = "Postcode does not match state.";
            } elseif ($state === 'ACT' && !(($postcode_int >= 2600 && $postcode_int <= 2618) || ($postcode_int >= 2900 && $postcode_int <= 2920))) {
                $errors[] = "Postcode does not match state.";
            }
        }

        // Email address validate format
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address format.";
        }

        // Phone number 8 to 12 digits, or spaces
        if (!preg_match('/^[\d\s]{8,12}$/', $phoneNumber)) {
            $errors[] = "Phone number must be 8 to 12 digits, or spaces.";
        }

        // Other skills checked but no text
        if (isset($_POST['other']) && empty($otherSkills)) {
            $errors[] = "Other skills checked but no text provided.";
        }

        // Other skills has text but not checked
        if (!isset($_POST['other']) && !empty($otherSkills)) {
            $errors[] = "Other skills text provided but not checked.";
        }

        // Displays any validation errors

        if (!empty($errors)) {
            echo '<div class="message error">';
            echo '<h2>Validation Errors:</h2>';
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
            echo '</div>';
        } else {
            // SQL query to create the table:
            $query = "CREATE TABLE IF NOT EXISTS eoi (
                EOInumber INT AUTO_INCREMENT PRIMARY KEY,
                JobRefNum CHAR(5) NOT NULL,
                FirstName VARCHAR(20) NOT NULL,
                LastName VARCHAR(20) NOT NULL,
                DOB CHAR(10) NOT NULL,
                Gender ENUM('Male', 'Female', 'Other') NOT NULL,
                StreetAddress VARCHAR(40) NOT NULL,
                Town VARCHAR(40) NOT NULL,
                State VARCHAR(4) NOT NULL, 
                Postcode CHAR(4) NOT NULL,
                Email VARCHAR(255) NOT NULL,
                Phone VARCHAR(12) NOT NULL,
                ProjectManagement BOOLEAN DEFAULT FALSE,
                DataAnalysis BOOLEAN DEFAULT FALSE,
                OtherSkills TEXT,
                Status ENUM('New', 'Current', 'Final') DEFAULT 'New' 
              );";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo '<div class="message error">';
                echo "Error creating table: " . mysqli_error($conn);
                echo '</div>';
            } else {
                // Insert data into table
                $stmt = mysqli_prepare($conn, "INSERT INTO eoi (JobRefNum, FirstName, LastName, DOB, Gender, StreetAddress, Town, State, Postcode, Email, Phone, ProjectManagement, DataAnalysis, OtherSkills) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $types = "sssssssssssiis";

                mysqli_stmt_bind_param($stmt, $types, $jobRefNumber, $firstName, $lastName, $dob, $gender, $streetAddress, $suburbTown, $state, $postcode, $emailAddress, $phoneNumber, $project_management, $data_analysis, $otherSkills);

                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    $eoinumber = mysqli_insert_id($conn);
                    echo '<div class="message success">';
                    echo "New record created successfully. Your EOI number is: " . $eoinumber;
                    echo '</div>';
                } else {
                    echo '<div class="message error">';
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    echo '</div>';
                }

                mysqli_stmt_close($stmt);
            }
        }
    }

    // Close connection
    mysqli_close($conn);
    echo $back_btn;
    echo '</div>';

    include 'footer.inc';
    ?>
</body>

</html>