<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>

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
        <div class="form__container">
            <!-- Form -->
            <div class="form">
                <form action="./process_manage.php" method="post">
                    <div class="job__title">
                        <h1>
                            Search EOIs
                        </h1>
                        <p>To list all items, leave first 3 values as default</p>
                    </div>

                    <fieldset class="form-input-container">
                        <label for="fname_search">*First Name:</label>
                        <input type="text" id="fname_search" name="fname_search" pattern="[A-Za-z]{1,20}" title="Max 20 alpha characters">
                        <span class="error-message" id="firstName-error"></span>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="lname_search">*Last Name:</label>
                        <input type="text" id="lname_search" name="lname_search" pattern="[A-Za-z]{1,20}" title="Max 20 alpha characters">
                        <span class="error-message" id="lastName-error"></span>
                    </fieldset>

                    <fieldset class="form-input-container-visible">
                        <legend>*Job Position:</legend>
                        <div class="skills__field">
                            <input type="radio" id="all_jobs_search" name="job_search" value="all" class="skill__input" checked>
                            <label for="all_jobs_search" class="skill__label">All</label>

                            <input type="radio" id="CSS01_search" name="job_search" value="CSS01" class="skill__input">
                            <label for="CSS01_search" class="skill__label">CSS01</label>

                            <input type="radio" id="DE002_search" name="job_search" value="DE002" class="skill__input">
                            <label for="DE002_search" class="skill__label">DE002</label>

                            <input type="radio" id="SE003_search" name="job_search" value="SE003" class="skill__input">
                            <label for="SE003_search" class="skill__label">SE003</label>

                            <input type="radio" id="ITSS4_search" name="job_search" value="ITSS4" class="skill__input">
                            <label for="ITSS4_search" class="skill__label">ITSS4</label>
                        </div>
                    </fieldset>

                    <fieldset class="form-input-container-visible">
                        <legend>*Choose a criteria to sort:</legend>
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

                    <fieldset class="form-input-container-visible">
                        <legend>*Sort order:</legend>
                        <div class="skills__field">
                            <input type="radio" id="asc" name="sort" value="asc" class="skill__input" checked>
                            <label for="asc" class="skill__label">Ascending</label>

                            <input type="radio" id="desc" name="sort" value="desc" class="skill__input">
                            <label for="desc" class="skill__label">Descending</label>
                        </div>
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
                <form action="./process_manage.php" method="post">
                    <div class="job__title">
                        <h1>
                            Delete EOIs
                        </h1>
                    </div>

                    <fieldset class="form-input-container-visible">
                        <legend>*Job Position:</legend>
                        <div class="skills__field">
                            <input type="radio" id="CSS01_del" name="job_del" value="CSS01" class="skill__input" checked>
                            <label for="CSS01_del" class="skill__label">CSS01</label>

                            <input type="radio" id="DE002_del" name="job_del" value="DE002" class="skill__input">
                            <label for="DE002_del" class="skill__label">DE002</label>

                            <input type="radio" id="SE003_del" name="job_del" value="SE003" class="skill__input">
                            <label for="SE003_del" class="skill__label">SE003</label>

                            <input type="radio" id="ITSS4_del" name="job_del" value="ITSS4" class="skill__input">
                            <label for="ITSS4_del" class="skill__label">ITSS4</label>
                        </div>
                    </fieldset>

                    <div class="submit__btn-container">
                        <input type="submit" name="Delete" value="Delete" class="submit__btn">
                    </div>
                </form>

            </div>
        </div>

        <div class="form__container">
            <!-- Form -->
            <div class="form">
                <form action="./process_manage.php" method="post">
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
    </main>

    <!-- Footer -->
    <?php include 'footer.inc'; ?>
</body>

</html>