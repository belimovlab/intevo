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
                        <a class="button button-primary button-small"><i class="fa fa-folder-open"></i> Добавить новую папку</a>
                        <a class="button button-action button-small"><i class="fa fa-upload"></i> Загрузить новый файл</a>
                        или 
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
                            <tr>
                                <td><i class="fa fa-folder" style="color: #FFB300;"></i></td>
                                <td><strong>Photography</strong></td>
                                <td>Папка</td>
                                <td>-</td>
                                <td>09.12.2015</td>
                                <td>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-folder" style="color: #FFB300;"></i></td>
                                <td><strong>Images</strong></td>
                                <td>Папка</td>
                                <td>-</td>
                                <td>05.12.2015</td>
                                <td>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-folder" style="color: #FFB300;"></i></td>
                                <td><strong>System</strong></td>
                                <td>Папка</td>
                                <td>-</td>
                                <td>04.12.2015</td>
                                <td>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-file-image-o"></i></td>
                                <td><strong>logo.png</strong></td>
                                <td>Файл</td>
                                <td>100Kb</td>
                                <td>09.12.2015</td>
                                <td>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-file-pdf-o"></i></td>
                                <td><strong>instructions.pdf</strong></td>
                                <td>Файл</td>
                                <td>100Kb</td>
                                <td>09.12.2015</td>
                                <td>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-file-excel-o"></i></td>
                                <td><strong>stylsheed.xls</strong></td>
                                <td>Файл</td>
                                <td>100Kb</td>
                                <td>09.12.2015</td>
                                <td>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-file-text-o"></i></td>
                                <td><strong>passwords.txt</strong></td>
                                <td>Файл</td>
                                <td>100Kb</td>
                                <td>09.12.2015</td>
                                <td>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php echo $footer;