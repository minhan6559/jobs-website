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
                <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="post">
                    <div class="job__title">
                        <h1>
                            Search EOI
                        </h1>
                        <p>(leave all values empty to list all EOIs)</p>
                    </div>

                    <fieldset class="form-input-container">
                        <label for="firstName">*First Name:</label>
                        <input type="text" id="firstName" name="first_name" pattern="[A-Za-z]{1,20}" title="Max 20 alpha characters">
                        <span class="error-message" id="firstName-error"></span>
                    </fieldset>

                    <fieldset class="form-input-container">
                        <label for="lastName">*Last Name:</label>
                        <input type="text" id="lastName" name="last_name" pattern="[A-Za-z]{1,20}" title="Max 20 alpha characters">
                        <span class="error-message" id="lastName-error"></span>
                    </fieldset>

                    <fieldset class="form-input-container-visible">
                        <legend>*Job Position:</legend>
                        <div class="skills__field">
                            <input type="radio" id="CSS01" name="job" value="CSS01" tabindex="0" class="skill__input">
                            <label for="CSS01" class="skill__label">CSS01</label>

                            <input type="radio" id="DE002" name="job" value="DE002" class="skill__input">
                            <label for="DE002" class="skill__label">DE002</label>

                            <input type="radio" id="SE003" name="job" value="SE003" class="skill__input">
                            <label for="SE003" class="skill__label">SE003</label>

                            <input type="radio" id="ITSS4" name="job" value="ITSS4" class="skill__input">
                            <label for="ITSS4" class="skill__label">ITSS4</label>
                        </div>
                    </fieldset>

                    <fieldset class="form-input-container-visible">
                        <legend>*Sort order:</legend>
                        <div class="skills__field">
                            <input type="radio" id="asc" name="sort" value="asc" tabindex="0" class="skill__input" checked>
                            <label for="asc" class="skill__label">Ascending</label>

                            <input type="radio" id="desc" name="sort" value="desc" class="skill__input">
                            <label for="desc" class="skill__label">Descending</label>
                        </div>
                    </fieldset>

                    <fieldset class="form-input-container-visible">
                        <legend>*Choose a criteria to sort:</legend>
                        <div class="skills__field">
                            <input type="radio" id="none" name="crit" value="none" tabindex="0" class="skill__input" checked>
                            <label for="none" class="skill__label">No Sort</label>

                            <input type="radio" id="fname" name="crit" value="fname" class="skill__input">
                            <label for="fname" class="skill__label">First name</label>

                            <input type="radio" id="lname" name="crit" value="lname" class="skill__input">
                            <label for="lname" class="skill__label">Last name</label>

                            <input type="radio" id="gender" name="crit" value="gender" class="skill__input">
                            <label for="gender" class="skill__label">Gender</label>

                            <input type="radio" id="state" name="crit" value="state" class="skill__input">
                            <label for="state" class="skill__label">State</label>

                            <input type="radio" id="postcode" name="crit" value="postcode" class="skill__input">
                            <label for="postcode" class="skill__label">Postcode</label>
                        </div>
                    </fieldset>

                    <div class="submit__btn-container">
                        <input type="submit" value="Search" class="submit__btn">
                    </div>
                </form>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'footer.inc'; ?>
</body>

</html>