<?php
if(!empty($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'files';
}

$rii = new IteratorIterator(new DirectoryIterator($p));

$results = []; 
?>
<div id="Main">
    <?php
    foreach ($rii as $file) {


        //DOSSIER
        if ($file->isDir() && $file->getFilename() != '.git'){ 
            if(!$file->isDot()){
            ?>
            <a 
                class="thumbnail thumbnail-folder"
                href="index.php?p=<?= $file->getPathname() ?>"
            >
                <?php
                $raa = new IteratorIterator(new DirectoryIterator($file->getPathname()));
                
                $child_images = [];
                foreach($raa as $child):
                    if($child->isFile()):
                        if($child->getExtension() === 'jpg' || $child->getExtension() === 'png'):
                            ob_start();
                            ?>
                            <img src="<?= $child->getPathname() ?>" alt="">
                            <?php
                            $child_images[] = ob_get_clean();
                        endif;
                    endif;
                endforeach;

                //Pour afficher juste la première image du dossier. 
                if(!empty($child_images[0])){
                    echo $child_images[0];
                }else{
                    ?>
                    <!-- <img src="http://localhost/bibliotheque-graphique/folder.png" alt=""> -->
                    <?php
                }
                ?>
                <?php echo $file->getFilename(); ?>
            </a>
            <?php
            }

        //FICHIER
        }else{
            if($file->getExtension() === 'jpg' || $file->getExtension() === 'png'){
            ?>
            <a 
                class="thumbnail thumbnail-file"
                href="index.php?f=<?= $file->getPathname() ?>"
            >
                <img src="<?= $file->getPathname() ?>" alt="">    
            </a>
            <?php
            }
        }
    }
    ?>
</div>