<?php echo $header;?>
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
                        <a class="button button-primary button-small" href="<?php echo base_url('/storage/add_folder')?>"><i class="fa fa-folder-open"></i> Добавить новую папку</a>
                        <a class="button button-action button-small" id="upload_file_button"><i class="fa fa-upload"></i> Загрузить новый файл</a>
                        или 
                    </p>
                    <input type="file" id="fileinput" multiple="multiple" style="display: none;" id="upload_file_input"/>

                    <p>
                        <div class="flow-error">
                            Ваш браузер скорее всего не поддерживает современные способы загрузки файлов. 
                        </div>

                        <div class="flow-drop" ondragenter="jQuery(this).addClass('flow-dragover');" ondragend="jQuery(this).removeClass('flow-dragover');" ondrop="jQuery(this).removeClass('flow-dragover');">
                          Перенесите сюда  <a class="flow-browse"><u>файлы</u></a></a>
                        </div>

                        <div class="flow-progress">
                            <table>
                                <tr>
                                    <td width="100%"><div class="progress-container"><div class="progress-bar"></div></div></td>
                                    <td class="progress-text" nowrap="nowrap"></td>
                                    <td class="progress-pause" nowrap="nowrap">
                                        <a href="#" onclick="r.upload(); return(false);" class="progress-resume-link"><img src="/panel_assets/images/resume.png" title="Resume upload" /></a>
                                        <a href="#" onclick="r.pause(); return(false);" class="progress-pause-link"><img src="/panel_assets/images/pause.png" title="Pause upload" /></a>
                                        <a href="#" onclick="r.cancel(); return(false);" class="progress-cancel-link"><img src="/panel_assets/images/cancel.png" title="Cancel upload" /></a>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <ul class="flow-list"></ul>
                    </p>
                    
                    
                    
                    <p style="margin: 30px 0px;">
                    <div id="dropzone"><form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload"><div class="dz-message needsclick">Перетащите файлы сюда</div></form></div>
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
                        <tbody>
                            <?php foreach($folders as $one):?>
                            <tr>
                                <td><i class="fa fa-folder" style="color: #FFB300;"></i></td>
                                <td class="folder_link"><a href="<?php echo base_url('/storage/folder/'.$one->id)?>"><strong><?php echo $one->name?></strong></a></td>
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
<?php echo $footer;