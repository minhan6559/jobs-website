<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>

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
    <?php
    if (!isset($_SERVER['HTTP_REFERER'])) {
        header('location:manage.php');
        exit;
    }
    include 'header.inc';
    ?>

    <main>
        <div class="result__container">
            <h1>Result</h1>
            <?php
            function sanitize_input($conn, $data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                $data = mysqli_real_escape_string($conn, $data);
                return $data;
            }

            require_once 'settings.php';


            $back_btn = "<div class=\"banner__press-container\">
            <a href=\"./manage.php\" class=\"banner__press\"><strong>Back to Manage Page</strong></a>
            </div>";

            $conn = @mysqli_connect($host, $user, $pwd, $sql_db) or die("<p>Unable to connect to the server</p> $back_btn");

            $eoi_table = "eoi";
            if (isset($_POST['Search'])) {
                $query = "SELECT * FROM $eoi_table";


                $fname_search = sanitize_input($conn, $_POST['fname_search']);
                $lname_search = sanitize_input($conn, $_POST['lname_search']);
                $job_search = $_POST['job_search'];

                if ($fname_search != "" || $lname_search != "" || $job_search != "all") {
                    $query .= " WHERE ";
                    if ($fname_search != "") {
                        $query .= "FirstName LIKE '%$fname_search%' AND ";
                    }
                    if ($lname_search != "") {
                        $query .= "LastName LIKE '%$lname_search%' AND ";
                    }
                    if ($job_search != "all") {
                        $query .= "JobRefNum = '$job_search' AND ";
                    }
                    $query = substr($query, 0, -5);
                }

                $query .= " ORDER BY ";
                $query .= $_POST['crit'];

                if ($_POST['sort'] == "asc") {
                    $query .= " ASC";
                } else {
                    $query .= " DESC";
                }

                $result = @mysqli_query($conn, $query) or die("<p>Failed to execute query</p> $back_btn");

                if (mysqli_num_rows($result) == 0) {
                    echo "<p>No records found</p>";
                } else {
                    echo "<div class='table__container'>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>EOI number</th>";
                    echo "<th>Job Reference Number</th>";
                    echo "<th>First Name</th>";
                    echo "<th>Last Name</th>";
                    echo "<th>DoB</th>";
                    echo "<th>Gender</th>";
                    echo "<th>Street Address</th>";
                    echo "<th>Town</th>";
                    echo "<th>State</th>";
                    echo "<th>Postcode</th>";
                    echo "<th>Email</th>";
                    echo "<th>Phone</th>";
                    echo "<th>Project Management</th>";
                    echo "<th>Data Analysis</th>";
                    echo "<th>Other Skills</th>";
                    echo "<th>Status</th>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['EOInumber'] . "</td>";
                        echo "<td>" . $row['JobRefNum'] . "</td>";
                        echo "<td>" . $row['FirstName'] . "</td>";
                        echo "<td>" . $row['LastName'] . "</td>";
                        echo "<td>" . $row['DOB'] . "</td>";
                        echo "<td>" . $row['Gender'] . "</td>";
                        echo "<td>" . $row['StreetAddress'] . "</td>";
                        echo "<td>" . $row['Town'] . "</td>";
                        echo "<td>" . $row['State'] . "</td>";
                        echo "<td>" . $row['Postcode'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['Phone'] . "</td>";
                        echo "<td>" . ($row['ProjectManagement'] == 1 ? "Yes" : "No") . "</td>";
                        echo "<td>" . ($row['DataAnalysis'] == 1 ? "Yes" : "No") . "</td>";
                        echo "<td>" . $row['OtherSkills'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
                mysqli_free_result($result);
            }

            if (isset($_POST['Delete_EOI'])) {
                // Check if there is any jobs
                $query = "SELECT * FROM job";
                $result = @mysqli_query($conn, $query) or die("<p>Failed to check if there is any jobs</p> $back_btn");

                if (mysqli_num_rows($result) == 0) {
                    echo ("<p>There is no job to delete</p>");
                    mysqli_free_result($result);
                } else {
                    mysqli_free_result($result);
                    $job_del_eoi = $_POST['job_del_eoi'];
                    $query = "DELETE FROM $eoi_table WHERE JobRefNum = '$job_del_eoi'";
                    $result = @mysqli_query($conn, $query) or die("<p>Failed to delete record</p> $back_btn");
                    echo "<p>Delete records successfully</p>";
                }
            }

            if (isset($_POST['Change'])) {
                $eoi_num = sanitize_input($conn, $_POST['eoi_change']);
                $status = $_POST['status_change'];

                // Check if eoi_num is valid
                if (!is_numeric($eoi_num)) {
                    echo "<p>Invalid EOI number</p>";
                } else {
                    $query = "UPDATE $eoi_table SET Status = '$status' WHERE EOInumber = $eoi_num";
                    $result = @mysqli_query($conn, $query) or die("<p>Failed to update record</p> $back_btn");

                    if (mysqli_affected_rows($conn) == 0) {
                        echo "<p>EOI number not found</p>";
                    } else {
                        echo "<p>Update record successfully</p>";
                    }
                }
            }

            if (isset($_POST['Add'])) {
                $jobRefNum = sanitize_input($conn, $_POST['JobRefNum']);
                $title = sanitize_input($conn, $_POST['Title']);
                $briefDesc = sanitize_input($conn, $_POST['BriefDescription']);
                $salary = sanitize_input($conn, $_POST['SalaryRange']);
                $reportsTo = sanitize_input($conn, $_POST['ReportsTo']);
                $keyRes = sanitize_input($conn, $_POST['KeyResponsibilities']);
                $essReq = sanitize_input($conn, $_POST['EssentialRequirements']);
                $preReq = sanitize_input($conn, $_POST['PreferableRequirements']);

                // Check if JobRefNum already exists
                $query = "SELECT * FROM job WHERE JobRefNum = '$jobRefNum'";
                $result = @mysqli_query($conn, $query) or die("<p>Failed to check if Job Reference Number exists</p> $back_btn");

                if (mysqli_num_rows($result) != 0) {
                    echo ("<p>Job Reference Number already exists</p>");
                    mysqli_free_result($result);
                } else {
                    mysqli_free_result($result);
                    $query = "INSERT INTO job (JobRefNum, Title, BriefDescription, SalaryRange, ReportsTo, KeyResponsibilities, EssentialRequirements, PreferableRequirements) VALUES ('$jobRefNum', '$title', '$briefDesc', '$salary', '$reportsTo', '$keyRes', '$essReq', '$preReq')";

                    $result = @mysqli_query($conn, $query) or die("<p>" . mysqli_error($conn) . "</p> $back_btn");

                    echo "<p>Insert job successfully</p>";
                }
            }

            if (isset($_POST['Delete_Job'])) {
                $query = "SELECT * FROM job";
                $result = @mysqli_query($conn, $query) or die("<p>Failed to check if there is any jobs</p> $back_btn");

                if (mysqli_num_rows($result) == 0) {
                    echo ("<p>There is no job to delete</p>");
                    mysqli_free_result($result);
                } else {
                    mysqli_free_result($result);
                    $job_del = sanitize_input($conn, $_POST['job_del']);

                    $query = "SELECT * FROM $eoi_table WHERE JobRefNum = '$job_del'";
                    $result = @mysqli_query($conn, $query) or die("<p>Failed to check if there is any EOIs</p> $back_btn");

                    if (mysqli_num_rows($result) != 0) {
                        echo ("<p>There are EOIs associated with this job</p>");
                        mysqli_free_result($result);
                    } else {
                        mysqli_free_result($result);
                        $query = "DELETE FROM job WHERE JobRefNum = '$job_del'";
                        $result = @mysqli_query($conn, $query) or die("<p>Failed to delete record</p> $back_btn");

                        if (mysqli_affected_rows($conn) == 0) {
                            echo "<p>Job Reference Number not found</p>";
                        } else {
                            echo "<p>Delete job successfully</p>";
                        }
                    }
                }
            }

            mysqli_close($conn);

            echo $back_btn;
            ?>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'footer.inc'; ?>
</body>

</html>