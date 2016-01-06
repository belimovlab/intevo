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
            <div class="page_title"><?php echo $title;?></div>
            <div class="page_content">
                <div class="grid_container">
                    <div class="grid_item_4">
                        <form action="<?php echo base_url('/storage/save_folder')?>" method="POST">
                        <label for="folder_name">Название папки</label>
                        <input type="text" id="folder_name" name="folder_name" placeholder="Название папки" required>
                        <input type="hidden" name="parent_folder" value="<?php echo $parent_folder ? $parent_folder : '';?>">
                        <p>
                            <button class="button button-action button-small"><i class="fa fa-save"></i> Сохранить новую папку</button>
                        </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $footer;