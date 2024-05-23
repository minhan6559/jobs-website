<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
    <meta name="description" content="Manage Page of TechPulse">
    <meta name="keywords" content="manage, search, mysql">
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
    <!-- Header -->
    <?php
    include 'header.inc';
    require_once 'settings.php';
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db) or die("<p>Unable to connect to the server</p>");

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

    $result = @mysqli_query($conn, $query) or die("<p>Failed to create EOI table</p> $back_btn");

    $query = "CREATE TABLE IF NOT EXISTS job (
            RefNum CHAR(5) PRIMARY KEY,
            Title VARCHAR(100) NOT NULL,
            BriefDescription TEXT NOT NULL,
            SalaryRange VARCHAR(100) NOT NULL,
            ReportsTo VARCHAR(100) NOT NULL,
            KeyResponsibilities TEXT NOT NULL,
            EssentialRequirements TEXT NOT NULL,
            PreferableRequirements TEXT NOT NULL
    );";

    $result = @mysqli_query($conn, $query) or die("<p>Failed to create table</p> $back_btn");
    ?>

    <main>
        <div class="form__container">
            <!-- Form -->
            <div class="form">
                <form action="./processManage.php" method="post">
                    <div class="job__title">
                        <h1>
                            Search EOIs
                        </h1>
                        <p>To list all items, leave first 3 values as default</p>
                    </div>

                    <fieldset class="form-input-container">
                        <label for="fname_search">First Name:</label>
                        <input type="text" id="fname_search" name="fname_search" pattern="[A-Za-z]{1,20}" title="Max 20 alpha characters">
                        <span class="error-message" id="firstName-error"></span>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="lname_search">Last Name:</label>
                        <input type="text" id="lname_search" name="lname_search" pattern="[A-Za-z]{1,20}" title="Max 20 alpha characters">
                        <span class="error-message" id="lastName-error"></span>
                    </fieldset>

                    <fieldset class="form-input-container-visible">
                        <legend>*Job Reference Number:</legend>
                        <div class="skills__field">
                            <input type="radio" id="all_jobs_search" name="job_search" value="all" class="skill__input" checked>
                            <label for="all_jobs_search" class="skill__label">All</label>

                            <?php
                            $query = "SELECT RefNum FROM job";
                            $result = @mysqli_query($conn, $query) or die("<p>Unable to find the Job Reference Numbers</p>");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<input type=\"radio\" id=\"" . $row['RefNum'] . "_search\" name=\"job_search\" value=\"" . $row['RefNum'] . "\" class=\"skill__input\">";
                                echo "<label for=\"" . $row['RefNum'] . "_search\" class=\"skill__label\">" . $row['RefNum'] . "</label>";
                            }

                            mysqli_free_result($result);
                            ?>
                        </div>
                    </fieldset>


                    <fieldset class="form-input-container-visible">
                        <legend>*Sort:</legend>
                        <fieldset>
                            <legend>Criteria:</legend>
                            <div class="skills__field">
                                <input type="radio" id="EOInumber" name="crit" value="EOInumber" class="skill__input" checked>
                                <label for="EOInumber" class="skill__label">EOI number</label>

                                <input type="radio" id="fname_crit" name="crit" value="FirstName" class="skill__input">
                                <label for="fname_crit" class="skill__label">First name</label>

                                <input type="radio" id="lname_crit" name="crit" value="LastName" class="skill__input">
                                <label for="lname_crit" class="skill__label">Last name</label>

                                <input type="radio" id="gender_crit" name="crit" value="Gender" class="skill__input">
                                <label for="gender_crit" class="skill__label">Gender</label>

                                <input type="radio" id="state_crit" name="crit" value="State" class="skill__input">
                                <label for="state_crit" class="skill__label">State</label>

                                <input type="radio" id="postcode_crit" name="crit" value="Postcode" class="skill__input">
                                <label for="postcode_crit" class="skill__label">Postcode</label>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Order:</legend>
                            <div class="skills__field">
                                <input type="radio" id="asc" name="sort" value="asc" class="skill__input" checked>
                                <label for="asc" class="skill__label">Ascending</label>

                                <input type="radio" id="desc" name="sort" value="desc" class="skill__input">
                                <label for="desc" class="skill__label">Descending</label>
                            </div>
                        </fieldset>
                    </fieldset>


                    <div class="submit__btn-container">
                        <input type="submit" name="Search" value="Search" class="submit__btn">
                    </div>
                </form>

            </div>
        </div>


        <div class="form__container">
            <!-- Form -->
            <div class="form">
                <form action="./processManage.php" method="post">
                    <div class="job__title">
                        <h1>
                            Delete EOIs
                        </h1>
                    </div>

                    <fieldset class="form-input-container-visible">
                        <legend>*Job Position:</legend>
                        <div class="skills__field">
                            <?php
                            $query = "SELECT RefNum FROM job";
                            $result = @mysqli_query($conn, $query) or die("<p>Unable to find the Job Reference Numbers</p>");

                            if (mysqli_num_rows($result) == 0) {
                                echo "<p>No jobs found</p>";
                            } else {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($i == 0) {
                                        echo "<input type=\"radio\" id=\"" . $row['RefNum'] . "_del_eoi\" name=\"job_del_eoi\" value=\"" . $row['RefNum'] . "\" class=\"skill__input\" checked>";
                                        $i++;
                                    } else {
                                        echo "<input type=\"radio\" id=\"" . $row['RefNum'] . "_del_eoi\" name=\"job_del_eoi\" value=\"" . $row['RefNum'] . "\" class=\"skill__input\">";
                                    }

                                    echo "<label for=\"" . $row['RefNum'] . "_del_eoi\" class=\"skill__label\">" . $row['RefNum'] . "</label>";
                                }
                            }

                            mysqli_free_result($result);
                            ?>
                        </div>
                    </fieldset>

                    <div class="submit__btn-container">
                        <input type="submit" name="Delete_EOI" value="Delete" class="submit__btn">
                    </div>
                </form>

            </div>
        </div>

        <div class="form__container">
            <!-- Form -->
            <div class="form">
                <form action="./processManage.php" method="post">
                    <div class="job__title">
                        <h1>
                            Change Status
                        </h1>
                    </div>

                    <fieldset class="form-input-container">
                        <label for="eoi_change">*Enter the EOI number:</label>
                        <input type="text" id="eoi_change" name="eoi_change" required>
                    </fieldset>

                    <fieldset class="form-input-container-visible">
                        <legend>*Choose a status:</legend>
                        <div class="skills__field">
                            <input type="radio" id="new" name="status_change" value="New" class="skill__input" checked>
                            <label for="new" class="skill__label">New</label>

                            <input type="radio" id="current" name="status_change" value="Current" class="skill__input">
                            <label for="current" class="skill__label">Current</label>

                            <input type="radio" id="final" name="status_change" value="Final" class="skill__input">
                            <label for="final" class="skill__label">Final</label>
                        </div>
                    </fieldset>

                    <div class="submit__btn-container">
                        <input type="submit" name="Change" value="Change" class="submit__btn">
                    </div>
                </form>

            </div>
        </div>

        <div class="form__container">
            <!-- Form -->
            <div class="form">
                <form action="./processManage.php" method="post">
                    <div class="job__title">
                        <h1>
                            Add Job Description
                        </h1>
                    </div>

                    <fieldset class="form-input-container">
                        <label for="RefNum">*Job Reference Number:</label>
                        <input type="text" id="RefNum" name="JobRefNum" pattern="[A-Za-z0-9]{5}" title="Exactly 5 alphanumeric characters" placeholder="e.g ABC12" required>
                        <span class="error-message" id="jobRef-error"></span>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="Title">*Position Title:</label>
                        <input type="text" id="Title" name="Title" required>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="BriefDescription">*Brief Description:</label>
                        <textarea id="BriefDescription" name="BriefDescription" required></textarea>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="SalaryRange">*Salary Range:</label>
                        <input type="text" id="SalaryRange " name="SalaryRange" required>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="ReportsTo">*Reports To:</label>
                        <input type="text" id="ReportsTo" name="ReportsTo" required>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="KeyResponsibilities">*Key Responsibilities (one per line):</label>
                        <textarea id="KeyResponsibilities" name="KeyResponsibilities" required></textarea>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="EssentialRequirements">*Essential Requirements (one per line):</label>
                        <textarea id="EssentialRequirements" name="EssentialRequirements" required></textarea>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="PreferableRequirements">*Preferable Requirements (one per line):</label>
                        <textarea id="PreferableRequirements" name="PreferableRequirements" required></textarea>
                    </fieldset>

                    <div class="submit__btn-container">
                        <input type="submit" name="Add" value="Add" class="submit__btn">
                    </div>
                </form>

            </div>
        </div>

        <div class="form__container">
            <!-- Form -->
            <div class="form">
                <form action="./processManage.php" method="post">
                    <div class="job__title">
                        <h1>
                            Delete Job Description
                        </h1>
                    </div>

                    <fieldset class="form-input-container-visible">
                        <legend>*Job Reference Number:</legend>
                        <div class="skills__field">
                            <?php
                            $query = "SELECT RefNum FROM job";
                            $result = @mysqli_query($conn, $query) or die("<p>Unable to find the Job Reference Numbers</p>");

                            if (mysqli_num_rows($result) == 0) {
                                echo "<p>No jobs found</p>";
                            } else {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($i == 0) {
                                        echo "<input type=\"radio\" id=\"" . $row['RefNum'] . "_del\" name=\"job_del\" value=\"" . $row['RefNum'] . "\" class=\"skill__input\" checked>";
                                        $i++;
                                    } else {
                                        echo "<input type=\"radio\" id=\"" . $row['RefNum'] . "_del\" name=\"job_del\" value=\"" . $row['RefNum'] . "\" class=\"skill__input\">";
                                    }

                                    echo "<label for=\"" . $row['RefNum'] . "_del\" class=\"skill__label\">" . $row['RefNum'] . "</label>";
                                }
                            }

                            mysqli_free_result($result);
                            ?>
                        </div>
                    </fieldset>

                    <div class="submit__btn-container">
                        <input type="submit" name="Delete_Job" value="Delete" class="submit__btn">
                    </div>
                </form>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php
    include 'footer.inc';
    mysqli_close($conn);
    ?>
</body>

</html>