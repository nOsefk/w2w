<!-- start of movie 1 -->

<?php
foreach ($movies as $movie) {
    ?>

    <!--        <div class="col-md-2">-->
    <!--            <img class="review_affiche" src="/assets/img/movies/bohemian_rhapsody.jpg"  alt="bohemian_rapsody">-->
    <!--        </div>-->
    <div class="col-md-6">

        <!--            <h4><b>Bohemian rhapsody</b>(2018)</h4>-->
        <!--            <i class="fa fa-star coul_jaune "> </i> <span >8.1<span class="review_score"> /10</span></span><br>-->
        <!--            <span>Bohemian Rhapsody retrace le destin extraordinaire du groupe Queen et de leur chanteur emblématique Freddie Mercury, qui a défié les stéréotypes, brisé les conventions et révolutionné la musique.</span>-->
        <!--            <br><img class="review_line" src="/assets/img/ligne.png" alt="ligne"><br>-->
        <!--            <span>Run Time : 2h15</span> <span> MMA : PG-13</span> <span>release : 31 Octobre 18</span><br>-->
        <!--            <span>Director : </span><span class="review_color_director_star"><a href="https://en.wikipedia.org/wiki/Bryan_Singer" target="_blank">Bryan Singer</a></span><br>-->
        <!--            <span>Stars : </span><span class="review_color_director_star">-->
        <!--                <a href="https://en.wikipedia.org/wiki/Rami_Malek" target="_blank">Rami Malek</a>,-->
        <!--                <a href="https://en.wikipedia.org/wiki/Gwilym_Lee" target="_blank">Gwilym Lee</a>,-->
        <!--                <a href="https://en.wikipedia.org/wiki/Lucy_Boynton" target="_blank">Lucy Boynton</a></span>-->

        <?= $movie->getId(); ?>
        <br>
        <?= $movie->getTitle(); ?>
    </div>


    <?php
}

if ($maxPages > 1) {
    ?>
    <ul class="pagination">
        <li class="page-item<?php if ($page == 1) { ?>  disabled <?php } ?>">
            <a href="all_movies.php?page=<?= $prevPage < 1 ? 1 : $prevPage ?>" class="page-link "> << </a></li>
        <?php
        for ($i = 1; $i <= $maxPages; $i++) {
            ?>
            <li><a href="all_movies.php?page=<?= $i ?>" class="page-link"><?= $i ?></a></li>
            <?php
        }
        ?>
        <li class="page-item<?php if ($page == $maxPages) { ?>  disabled <?php } ?>">
            <a href="all_movies.php?page=<?= $nextPage > $maxPages ? $maxPages : $nextPage ?>" class="page-link">
                >>
            </a></li>
    </ul>
    <?php

}
