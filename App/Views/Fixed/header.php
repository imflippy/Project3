
<body>

<div class="page-wrapper">
    <div class="page">
        <header>
            <h1>Project 3</h1>
            <?php
            if (isset($_SESSION['user'])):
            ?>
            <div class="user-header">
                <span><?= $_SESSION['user']->first_name; ?></span>
                <a href="index.php?page=logout">Logout</a>
            </div>

            <?php endif; ?>
        </header>

        <div class="content">
