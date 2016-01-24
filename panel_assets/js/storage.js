/* 
    Created on : 17.01.2016, 20:27:34
    Author     : svyatoslavbelimov
*/

var Storage = {
    jq: '',
    clipboard: '',
    to_div: '#reload_content',
    upload_url_string: '/panel/storage/uploads',
    save_url_string: '/panel/storage/save_file',
    r : '',
    folder_id : 0 ,
    readablizeBytes: function(bytes){
        var s = ['байт', 'кБ', 'МБ', 'ГБ', 'ТБ', 'ПТ'];
        var e = Math.floor(Math.log(bytes) / Math.log(1024));
        return (bytes / Math.pow(1024, e)).toFixed(2) + " " + s[e];
    },
    secondsToStr: function(temp){
        function numberEnding (number) {
            return (number > 1) ? 's' : '';
        }
        var years = Math.floor(temp / 31536000);
        if (years) {
            return years + ' года ' + numberEnding(years);
        }
        var days = Math.floor((temp %= 31536000) / 86400);
        if (days) {
            return days + ' дни' + numberEnding(days);
        }
        var hours = Math.floor((temp %= 86400) / 3600);
        if (hours) {
            return hours + ' часы' + numberEnding(hours);
        }
        var minutes = Math.floor((temp %= 3600) / 60);
        if (minutes) {
            return minutes + ' минуты' + numberEnding(minutes);
        }
        var seconds = temp % 60;
        return seconds + ' секунды' + numberEnding(seconds);
    },
    init_flow_js: function(){
        var _th = this;
        _th.folder_id = _th.jq('#upload_file_button').data('folder-id');
        _th.r = new Flow({
            target: _th.upload_url_string,
            chunkSize: 1024*1024,
            testChunks: false,
            query: {
                folder_id : _th.folder_id
            }
        });
        _th.r.assignBrowse(_th.jq('#files_area'));
        _th.r.assignDrop(_th.jq('#dropzone'));
        _th.r.on('fileAdded', function(file){
            _th.jq('.flow_list_div').show();
            _th.jq('.flow-list').append(
                '<li class="flow-file flow-file-'+file.uniqueIdentifier+'">' +
                'Загрузка <span class="flow-file-name">'+file.name+'</span> ' +
                '<span class="flow-file-size"></span> ' +
                '<span class="flow-file-progress"></span> ' +
                '</span></li>'
            );

        });
        _th.r.on('fileSuccess', function(file,message) {
            var res_data = JSON.parse(message);
            _th.folder_id = res_data.folder_id;
            if(res_data.error == "-1")
            {
                toastr.info('Are you the 6 fingered man?');
                $N('Файл <strong>' + file.name +'</strong> не был загружен').setStyle('error').show('.full-notify');
            }
            else
            {
               _th.add_file_in_folder(res_data.file_name,file.name); 
               $N('Файл <strong>' + file.name +'</strong> успешно загружен').setStyle('success').show('.full-notify');
            }
        });
        _th.r.on('filesSubmitted', function(file) {
            _th.r.upload();
        });
        _th.r.on('complete', function(){
            _th.jq('.flow-file').remove();
            _th.jq('.flow_list_div').hide();
        });
        _th.r.on('fileProgress', function(file){
            _th.jq('.flow-file-'+file.uniqueIdentifier+' .flow-file-progress')
                .html(Math.floor(file.progress()*100) + '% '
                + _th.readablizeBytes(file.averageSpeed) + '/s '
                + _th.secondsToStr(file.timeRemaining()) + ' осталось') ;
            _th.jq('.progress-bar').css({width:Math.floor(_th.r.progress()*100) + '%'});
        });
        
        
    },
    add_file_in_folder: function(file,file_name){
        var _th =this;
         _th.jq.ajax({
            type: "POST",
            url: _th.save_url_string,
            data: {file: file, file_name:  file_name,folder_id : _th.folder_id},
            success: function(data){
                var res_data = JSON.parse(data);
                if(res_data.folder_id !== '-1' && res_data.folder_id !== "undefined")
                {
                    _th.get_content('/panel/storage/folder/'+res_data.folder_id, _th.to_div, true);
                }
                else
                {
                    _th.get_content('/panel/storage', _th.to_div, true);
                }
                _th.re_init();
            }
        });
    },
    bind_dropzone_click: function(){
        var _th = this;
        _th.jq('#dropzone').click(function(e){
            e.stopImmediatePropagation();
            _th.folder_id = _th.jq(this).data('folder-id');
            _th.jq("#files_area").trigger('click');
        });
        _th.jq('#upload_file_button').click(function(e){
            e.stopImmediatePropagation();
            _th.folder_id = _th.jq(this).data('folder-id');
            _th.jq("#files_area").trigger('click');
        });
    },
    reset_config: function(){
        var _th = this;
        if (Modernizr.history) {
            _th.jq('.historyAPI').on('click', function(e){
                e.preventDefault();
                var href = _th.jq(this).attr('href');
                _th.folder_id = _th.jq(this).data('folder_id_from_save');
                _th.get_content(href, _th.to_div, true);
            });
        }
    },
    get_content: function(url, to_div, addEntry){
        var _th = this;
        _th.jq.get(url)
        .done(function( data ) {
            _th.jq(to_div).html(data);
            _th.reset_config();
            if(addEntry == true) {
                history.pushState(null, null, url);
            }
            _th.re_init();
        });

    },
    init_popstate: function(){
        var _th = this;
        window.addEventListener("popstate", function(e) {
            _th.get_content(location.pathname, _th.to_div, false);
        });
    },
    re_init: function(){
        this.init_popstate();
        this.reset_config();
        this.bind_dropzone_click();
        this.init_flow_js();
        this.bind_popup_show();
    },
    bind_popup_show: function(){
        var _th = this;
        _th.jq('.popup').click(function(e){
            e.preventDefault();
            _th.jq('.popup_window').css('display','block');
            var file_url = _th.jq(this).data('file_url');
            var html = '<p>Ссылка на файл:</p><p class="link_area">'+file_url+'</p>';
             html += '<p style="text-align:center;"><button class="button button-royal button-smal clip_action_link" data-clipboard-text="'+file_url+'"><i class="fa fa-clipboard"></i> Скопировать в буфер обмена</button></p>';
            _th.jq('.popup_window_content_content').html(html);
            _th.clipboard = new Clipboard('.clip_action_link');
            _th.clipboard.on('success', function(ee) {
                toastr.success('Информация скопирована');
                _th.jq('.popup_window').css('display','none');
                _th.jq('.popup_window_content_content').html('');
                ee.clearSelection();
                _th.bind_popup_show();
            });
            _th.clipboard.on('error', function(e) {
                toastr.error('Информация не скопирована');
                _th.jq('.popup_window').css('display','none');
                _th.jq('.popup_window_content_content').html('');
            });
        });
        _th.jq('.popup_window_content_close').click(function(e){
            e.preventDefault();
            _th.jq('.popup_window').css('display','none');
        });
        _th.bind_popup_hide();
    },
    bind_popup_hide: function(){
        var _th = this;
        _th.jq('.popup_window').click(function(e){
            e.preventDefault();
            if(!_th.jq(e.target).is(".popup_window_content") && !_th.jq(e.target).parents().is(".popup_window_content"))
            {
                _th.jq('.popup_window').css('display','none');
                _th.jq('.popup_window_content_content').html('');
            }
        });
        
    },
    init: function(jquery)
    {
        this.jq = jquery;
        this.init_popstate();
        this.reset_config();
        this.bind_dropzone_click();
        this.init_flow_js();
        this.bind_popup_show();
        toastr.success('Are you the 6 fingered man?');
    }
};





jQuery('document').ready(function(){
    Storage.init($);
});
