<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhancements</title>
    <meta name="description" content="PHP enhacements">
    <meta name="keywords" content="php, mysql, enhacements">
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
    <?php include 'header.inc'; ?>

    <main>
        <section class="enhancements">
            <div class="container">
                <!-- First enhacement -->
                <section class="first-enhacement">
                    <h2 class="enhacement__heading">Sorting</h2>
                    <ul class="enhacement__desc">
                        <li>Provide the manager with the ability to select the field on which to sort the records.</li>
                        <li>Manager can also choose the sort order.</li>
                        <li>Implemented using <strong>"ORDER BY"</strong> and <strong>"ASC", "DESC"</strong> for the sort order</li>
                    </ul>
                    <div class="php_enhacement__wrap">
                        <img src="./images/php_enhancement_1.png" alt="Sort enhacement" class="php_enhancement__img">
                    </div>
                    <a href="./manage.php#fname_search" class="btn">
                        <span class="ennhancement__action">See more</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="enhancement__icon">
                            <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z">
                            </path>
                        </svg>
                    </a>
                </section>

                <!-- Second enhacement -->
                <section class="second-enhacement">
                    <h2 class="enhacement__heading">Manage the job descriptions</h2>
                    <ul class="enhacement__desc">
                        <li>
                            Store job descriptions in a database table named "job".
                        </li>
                        <li>
                            Provide the manager with the ability to add and delete job descriptions.
                        </li>
                        <li>
                            The HTML codes that related to job descriptions will be dynamically created by PHP.
                            (like in <a href="./jobs.php">Job Page</a>)
                        </li>
                    </ul>

                    <div class="php_enhacement__wrap">
                        <img src="./images/php_enhancement_2.png" alt="Add job form" class="php_enhancement__img">
                    </div>

                    <div class="php_enhacement__wrap">
                        <img src="./images/php_enhancement_3.png" alt="Delete job form" class="php_enhancement__img">
                    </div>

                    <a href="./manage.php#JobRefNum" class="btn">
                        <span class="ennhancement__action">See more</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="enhancement__icon">
                            <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z">
                            </path>
                        </svg>
                    </a>
                </section>
            </div>
        </section>

        <div class="banner__press-container">
            <a href="./enhancements.php" class="banner__press"><strong>Move to Assignment 1 Enhancements</strong></a>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'footer.inc'; ?>
</body>

</html>