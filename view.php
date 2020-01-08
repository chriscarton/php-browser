<div id="View">

    <div class="files">
        <?php 
        
        foreach($other_files as $other_file):
            
            if(file_exists($other_file['path'])):
                
                ?>
                <a class="btn" download href="<?= $other_file['fullpath'] ?>">
                    Télécharger le <?= $other_file['ext'] ?>
                </a>
                <?php
            endif;
            
        endforeach;
        ?>
    </div>
    <img src="<?= $file ?>" alt="Image">
</div>