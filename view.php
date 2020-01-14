<div id="View">

    <div class="files">
        <?php 
        
        foreach($other_files as $other_file):
            
            if(file_exists($other_file['path'])):
                if($other_file['ext'] !== 'txt'):
                ?>
                <a class="btn" download href="<?= $other_file['fullpath'] ?>">
                    Télécharger le <?= $other_file['ext'] ?>
                </a>
                <?php
                endif;
            endif;
            
        endforeach;
        ?>
    </div>
    <img src="<?= $file ?>" alt="Image">
</div>