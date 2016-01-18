<div id="reload_content">
    <div class="page_header">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/')?>">Рабочий стол</a></li>
            <li class="active"><?php echo $title;?></li>
        </ul>
    </div>
    <div class="page_wrapper">
        <div class="page">
            <div class="page_title">Файловый менеджер</div>
            <div class="page_content">
                <div class="filemanager">
                    <p>
                        <a class="button button-primary button-small" href="<?php echo base_url('/storage/add_folder/'.$folder_info->id)?>" id="add_folder_button"><i class="fa fa-folder-open"></i> Добавить новую папку</a>
                        <a class="button button-action button-small" id="upload_file_button" data-folder-id="<?php echo $folder_info->id ? $folder_info->id : 0 ; ?>"><i class="fa fa-upload"></i> Загрузить новый файл</a>
                        или 
                    </p>

                    <p style="margin: 30px 0px;">
                    <input type="file" name="files_area" id="files_area" multiple="true" hidden="true" />
                    <div id="dropzone" data-folder-id="<?php echo $folder_info->id ? $folder_info->id : 0 ; ?>">
                        <form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload">
                            <div class="dz-message needsclick">Перетащите файлы сюда</div>
                        </form>
                    </div>
                    </p>
                    
 
                    <p class="flow_list_p">
                    <div class="flow_list_div">
                        <ul class="flow-list">
                           
                        </ul>
                    </div>
                    </p>
                    <div style="clear: both;"></div>
                    <p>
                    <table class="simple">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Название</th>
                                <th>Тип</th>
                                <th>Размер</th>
                                <th>Дата</th>
                                <th>Операции</th>
                            </tr>
                        </thead>
                        <tbody id="body_updated">
                            <?php if($folder_info->parent_folder):?>
                            <tr>
                                <td><i class="fa fa-level-up"></i></td>
                                <td class="folder_link" colspan="5" style="text-align: left;"><a href="<?php echo base_url('/storage/folder/'.$folder_info->parent_folder)?>" class="historyAPI"><strong>Вернуться назад...</strong></a></td>
                            </tr>
                            <?php else:?>
                            <tr>
                                <td><i class="fa fa-level-up"></i></td>
                                <td class="folder_link" colspan="5" style="text-align: left;"><a href="<?php echo base_url('/storage/')?>"><strong>Вернуться назад...</strong></a></td>
                            </tr>
                            <?php endif;?>
                            <?php foreach($folders as $one):?>
                            <tr>
                                <td><i class="fa fa-folder" style="color: #FFB300;"></i></td>
                                <td class="folder_link"><a href="<?php echo base_url('/storage/folder/'.$one->id)?>" class="historyAPI" data-folder_id_from_save="<?php echo $one->id?>"><strong><?php echo $one->name?></strong></a></td>
                                <td>Папка</td>
                                <td>-</td>
                                <td><?php echo date('d.m.Y',  strtotime($one->create_date))?></td>
                                <td>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php endforeach;?>

                            
                            <?php foreach($files as $one):?>
                            <tr>
                                <td><i class="fa <?php echo font_awesome_file_icon_class($one->myme_type)?>"></i></td>
                                <td><strong><?php echo $one->name?></strong></td>
                                <td>Файл</td>
                                <td><?php echo formatSizeUnits($one->size)?></td>
                                <td><?php echo date('d.m.Y',  strtotime($one->create_date))?></td>
                                <td>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php endforeach;?>
                            
                        </tbody>
                    </table>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>