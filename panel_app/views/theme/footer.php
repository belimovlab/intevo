   
            
    </div>
    </div>
    <script src="/panel_assets/js/app.js"></script>
    <?php foreach($js as $one):?>
        <?php if($one):?>
            <script src="/panel_assets/js/<?php echo $one?>.js"></script>
        <?php endif;?>
    <?php endforeach;?>
</body>
</html>