<?php
/**
 * Exemple de définition d'un template, ici pour pour afficher une
 * vignette de film dans une liste de films
 * 
 * À modifier ou supprimer à volonté par les designers, bien sûr.
 */
    
?>    
    
    <li>
        <a href=""><?php echo $this->escape($movie); ?></a>
        <img src="" alt=""/>
        <ul>
            <li> catégorie : 
                 <span title="<?php echo $this->escape($movie->getCategory()->getDescription()); ?>"><?php echo $this->escape($movie->getCategory()->getName()); ?></span>
            </li>
            <li> tags : 
                <?php foreach ($movie->getTags() as $item) : ?>
                <span title="<?php echo $this->escape($item->getDescription()); ?>">[<?php echo $this->escape($item->getName()); ?>]</span>
                <?php endforeach; ?>
            </li>
            <li> réalistaeurs : 
                <?php foreach ($movie->getDirectors() as $item) : ?>
                <span>[<?php echo $this->escape($item->getFirstName()); ?> <?php echo $this->escape($item->getLastName()); ?>]</span>
                <?php endforeach; ?>
            </li>
            <li> acteurs : 
                <?php foreach ($movie->getActors() as $item) : ?>
                <span>[<?php echo $this->escape($item->getFirstName()); ?> <?php echo $this->escape($item->getLastName()); ?>]</span>
                <?php endforeach; ?>
            </li>
        </ul>
    </li>
