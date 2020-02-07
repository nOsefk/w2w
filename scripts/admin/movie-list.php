<?php

use \w2w\DAO\DAOFactory;

checkAdmin();

$daoFactory = DAOFactory::getDAOFactory();
$movieDAO = $daoFactory->getMovieDAO();
$movies = $movieDAO->findAll();


?>
    <script src="/assets/js/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <div class="container-fluid">
        <h1>Liste des films</h1>

        <table id="movie_list" class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Année</th>
                <th scope="col" class="text-center">Poster</th>
                <th scope="col">Category</th>
                <th scope="col" class="text-center">Editer</th>
                <th scope="col" class="text-center">Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($movies) && is_array($movies) && count($movies) > 0) : ?>
                <?php foreach ($movies as $movie) : ?>
                    <tr>
                        <th scope="row">
                            <a href="/admin/movie-edit.php?id=<?php echo escape($movie->getId()); ?>"><?php echo escape($movie->getId()); ?></a>
                        </th>
                        <td>
                            <a href="/admin/movie-edit.php?id=<?php echo escape($movie->getId()); ?>"><?php echo escape($movie->getTitle()); ?></a>
                        </td>
                        <td>
                            <?php echo escape($movie->getDescription()); ?>
                        </td>
                        <td>
                            <?php echo escape($movie->getYear()); ?>
                        </td>
                        <td class="text-center">
                            <img src="/uploads/<?php echo escape($movie->getPoster()); ?>-medium.jpg" alt=""
                                 style="max-width: 50px">
                        </td>
                        <td>
                            <?php if ($category = $movie->getCategory()) echo escape($category->getName()); ?>
                        </td>
                        <td class="text-center">
                            <a href="movie-edit.php?id=<?php echo escape($movie->getId()); ?>"><i
                                        class="fas fa-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-trash" data-target="#modal-delete-movie" data-toggle="modal"></i>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>

    </div>

<!-- ****************** Delete movie confirm box ****************** -->
<div class="modal fade" id="modal-delete-movie" tabindex="-1" role="dialog" aria-labelledby="modal-delete-movie"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletetitle">Supprimer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="">
                <form action="movie-delete.php" method="post">
                    <div>
                        <input type="hidden" id="id" name="id" value="<?php echo escape($movie->getId()); ?>"/>
                        <input type="hidden" id="confirm" name="confirm" value="confirm"/>
                        <label  for="submitDelete">Etes-vous sur de vouloir supprimer ce film? cette action est irréversible!</label>
                        <input id="submitDelete" type="submit" class="btn btn-primary" value="Supprimer ?"/>
                        <button class="btn btn-primary" data-dismiss="modal" aria-label="Close"> Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ****************** END Delete movie confirm box ****************** -->




<script>
    $(document).ready(function () {
        $.noConflict();
        $('#movie_list').DataTable({
            "columns": [
                null,
                null,
                null,
                null,
                {"orderable": false},
                null,
                {"orderable": false},
                {"orderable": false},
            ]
        });
    });

</script>
