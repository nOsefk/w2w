<?php

global $user;

$reviewDAO = new \w2w\DAO\Doctrine\DoctrineReviewDAO();
$userDAO = new \w2w\DAO\Doctrine\DoctrineUserDAO();

if ($user) {
    $reviewId = param("id");
    $rawInput = [
        'reviewId' => ['num', $reviewId, false]
    ];

    if (\w2w\Utils\Utils::inputValidation($rawInput)) {
        $review = $reviewDAO->findOneBy('id', $reviewId);

        if ($user->getId() === $review->getUser()->getId()) {
            if ($user->isAdmin()) {

                $movieDAO = new \w2w\DAO\Doctrine\DoctrineMovieDAO();
                $movie = $movieDAO->findOneBy('adminReview',$review);

                if ($movie->getAdminReview()->getId() == $reviewId) {
                    $movie->setAdminReview(null);
                    $movieDAO->update($movie);

                    $userDAO = new \w2w\DAO\Doctrine\DoctrineUserDAO();
                    $user->setNumberReviews($user->getNumberReviews()-1);
                    $userDAO->update($user);
                }
            }
            $reviewDAO->delete($review);
            \w2w\Utils\Utils::message(true, 'Critique Supprimée', '');
            header('Location: ../movie.php?id=' . $review->getMovie()->getId());
            exit();
        }
    }
}