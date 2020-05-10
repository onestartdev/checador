<div id="main">
    <div class="container">
        <div class="movies-list-wrap mlw-featured">
            <div class="row">
                <div class="col-md-12"> 
                    <?php foreach ($css_files as $file): ?>
                        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                    <?php endforeach; ?>
                    <?php foreach ($js_files as $file): ?>
                        <script src="<?php echo $file; ?>"></script>
                    <?php endforeach; ?>
                    <div style='height:20px;'></div>  
                    <div>
                        <?php echo $output; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>