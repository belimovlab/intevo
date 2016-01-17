<?php echo $header;?>
<div id="his_content">
    <div class="page_header">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/')?>">Рабочий стол</a></li>
            <li class="active"><?php echo $title;?></li>
        </ul>
    </div>
    <div class="page_wrapper">
        <div class="page">
            <div class="page_title"><?php echo $title;?></div>
            <div class="page_content">
                <a href="<?php echo base_url('/plugins/page_1')?>" class="historyAPI">Первая страница</a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo base_url('/plugins/page_2')?>" class="historyAPI">Вторая страница</a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo base_url('/plugins/page_3')?>" class="historyAPI">Третья страница</a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo base_url('/plugins/page_4')?>" class="historyAPI">Четвертая страница</a>&nbsp;&nbsp;&nbsp;
                <br/><br/>
                <br/>
                Page 3
            </div>
        </div>
    </div>
</div>
<?php echo $footer;