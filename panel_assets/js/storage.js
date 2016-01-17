/* 
    Created on : 17.01.2016, 20:27:34
    Author     : svyatoslavbelimov
*/

var Storage = {
    jq: '',
    to_div: '',
    upload_url_string: './storage/uploads',
    save_url_string: './storage/save_file',
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
            _th.add_file_in_folder(message,file.name);
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
                alert(data);
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
    },
    reset_config: function(){
        var _th = this;
        if (Modernizr.history) {
            _th.jq('.historyAPI').on('click', function(e){
                e.preventDefault();
                var href = _th.jq(this).attr('href');
                _th.get_content(href, _th.to_div, true);
                _th.jq('.historyAPI').removeClass('active');
                _th.jq(this).addClass('active');
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
        });
    },
    init_popstate: function(){
        var _th = this;
        window.addEventListener("popstate", function(e) {
            _th.get_content(location.pathname, _th.to_div, false);
        });
    },
    init: function(jquery,to_div)
    {
        this.jq = jquery;
        this.init_popstate();
        this.to_div = to_div;
        this.reset_config();
        this.bind_dropzone_click();
        this.init_flow_js();
    }
};





jQuery('document').ready(function(){
    Storage.init($,'#his_content');
});
