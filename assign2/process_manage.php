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
    <?php include 'header.inc'; ?>

    <main>
        <div class="result__container">
            <h1>Result</h1>
            <?php
            require_once 'settings.php';

            $back_btn = "<div class=\"banner__press-container\">
            <a href=\"./manage.php\" class=\"banner__press\"><strong>Back to Manage Page</strong></a>
            </div>";

            $conn = @mysqli_connect($host, $user, $pwd, $sql_db) or die("<p>Unable to connect to the server</p> $back_btn");

            // SQL query to create the table:
            // CREATE TABLE IF NOT EXISTS eoi (
            //     EOInumber INT AUTO_INCREMENT PRIMARY KEY,
            //     JobRefNum CHAR(5) NOT NULL,
            //     FirstName VARCHAR(20) NOT NULL,
            //     LastName VARCHAR(20) NOT NULL,
            //     DOB CHAR(10) NOT NULL,
            //     Gender ENUM('Male', 'Female', 'Other') NOT NULL,
            //     StreetAddress VARCHAR(40) NOT NULL,
            //     Town VARCHAR(40) NOT NULL,
            //     State VARCHAR(4) NOT NULL, 
            //     Postcode CHAR(4) NOT NULL,
            //     Email VARCHAR(255) NOT NULL,
            //     Phone VARCHAR(12) NOT NULL,
            //     ProjectManagement BOOLEAN DEFAULT FALSE,
            //     DataAnalysis BOOLEAN DEFAULT FALSE,
            //     OtherSkills TEXT,
            //     Status ENUM('New', 'Current', 'Final') DEFAULT 'New' 
            //   );

            $sql_table = "eoi";
            if (isset($_POST['Search'])) {
                $query = "SELECT * FROM $sql_table";


                $fname_search = $_POST['fname_search'];
                $lname_search = $_POST['lname_search'];
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
                    echo "<th>EOInumber</th>";
                    echo "<th>JobRefNum</th>";
                    echo "<th>FirstName</th>";
                    echo "<th>LastName</th>";
                    echo "<th>DOB</th>";
                    echo "<th>Gender</th>";
                    echo "<th>StreetAddress</th>";
                    echo "<th>Town</th>";
                    echo "<th>State</th>";
                    echo "<th>Postcode</th>";
                    echo "<th>Email</th>";
                    echo "<th>Phone</th>";
                    echo "<th>ProjectManagement</th>";
                    echo "<th>DataAnalysis</th>";
                    echo "<th>OtherSkills</th>";
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
                        echo "<td>" . $row['ProjectManagement'] . "</td>";
                        echo "<td>" . $row['DataAnalysis'] . "</td>";
                        echo "<td>" . $row['OtherSkills'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
                mysqli_free_result($result);
            }

            if (isset($_POST['Delete'])) {
                $job_del = $_POST['job_del'];
                $query = "DELETE FROM $sql_table WHERE JobRefNum = '$job_del'";
                $result = @mysqli_query($conn, $query) or die("<p>Failed to delete record</p> $back_btn");
                echo "<p>Delete records successfully</p>";
            }

            if (isset($_POST['Change'])) {
                $eoi_num = $_POST['eoi_change'];
                $status = $_POST['status_change'];

                $query = "UPDATE $sql_table SET Status = '$status' WHERE EOInumber = $eoi_num";
                $result = @mysqli_query($conn, $query) or die("<p>Failed to update record</p> $back_btn");

                if (mysqli_affected_rows($conn) == 0) {
                    echo "<p>EOI number not found</p>";
                } else {
                    echo "<p>Update record successfully</p>";
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