<?php echo $header;?>
    <div class="page_header">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/')?>">Рабочий стол</a></li>
            <li><a href="<?php echo base_url('/storage')?>">Хранилище</a></li>
            <li class="active"><?php echo $title;?></li>
        </ul>
    </div>
    <div class="page_wrapper">
        <div class="page">
            <div class="page_title">Файловый менеджер</div>
            <div class="page_content">
                <div class="filemanager">
                    <p style="text-align: center; color: red;">
                        Такой папки не существует.
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
<?php echo $footer;