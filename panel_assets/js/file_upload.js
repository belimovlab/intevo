/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function readablizeBytes(bytes) {
    var s = ['байты', 'kB', 'MB', 'GB', 'TB', 'PB'];
    var e = Math.floor(Math.log(bytes) / Math.log(1024));
    return (bytes / Math.pow(1024, e)).toFixed(2) + " " + s[e];
}
function secondsToStr (temp) {
    function numberEnding (number) {
        return (number > 1) ? 's' : '';
    }
    var years = Math.floor(temp / 31536000);
    if (years) {
        return years + ' year' + numberEnding(years);
    }
    var days = Math.floor((temp %= 31536000) / 86400);
    if (days) {
        return days + ' day' + numberEnding(days);
    }
    var hours = Math.floor((temp %= 86400) / 3600);
    if (hours) {
        return hours + ' hour' + numberEnding(hours);
    }
    var minutes = Math.floor((temp %= 3600) / 60);
    if (minutes) {
        return minutes + ' minute' + numberEnding(minutes);
    }
    var seconds = temp % 60;
    return seconds + ' second' + numberEnding(seconds);
}


$(function () {
    
    var r = new Flow({
            target: './storage/uploads',
            chunkSize: 1024*1024,
            testChunks: false
    });
    if (!r.support) {
        $('.flow-error').show();
        return ;
    }
    $('.flow-drop').show();
    r.assignDrop($('.flow-drop')[0]);
    r.assignBrowse($('.flow-browse')[0]);

    r.on('fileAdded', function(file){
        // Show progress bar
        $('.flow-progress, .flow-list').show();
        // Add the file to the list
        $('.flow-list').append(
          '<li class="flow-file flow-file-'+file.uniqueIdentifier+'">' +
          'Uploading <span class="flow-file-name"></span> ' +
          '<span class="flow-file-size"></span> ' +
          '<span class="flow-file-progress"></span> ' +

          '<span class="flow-file-pause">' +
          ' <img src="/panel_assets/images/pause.png" title="Pause upload" />' +
          '</span>' +
          '<span class="flow-file-resume">' +
          ' <img src="/panel_assets/images/resume.png" title="Resume upload" />' +
          '</span>' +
          '<span class="flow-file-cancel">' +
          ' <img src="/panel_assets/images/cancel.png" title="Cancel upload" />' +
          '</span>'
        );
        var $self = $('.flow-file-'+file.uniqueIdentifier);
        $self.find('.flow-file-name').text(file.name);
        $self.find('.flow-file-size').text(readablizeBytes(file.size));

        $self.find('.flow-file-pause').on('click', function () {
          file.pause();
          $self.find('.flow-file-pause').hide();
          $self.find('.flow-file-resume').show();
        });
        $self.find('.flow-file-resume').on('click', function () {
          file.resume();
          $self.find('.flow-file-pause').show();
          $self.find('.flow-file-resume').hide();
        });
        $self.find('.flow-file-cancel').on('click', function () {
          file.cancel();
          $self.remove();
        });
    });
    r.on('filesSubmitted', function(file) {
      r.upload();
    });
    r.on('complete', function(){
      // Hide pause/resume when the upload has completed
      $('.flow-progress .progress-resume-link, .flow-progress .progress-pause-link').hide();
    });
    r.on('fileSuccess', function(file,message){
      var $self = $('.flow-file-'+file.uniqueIdentifier);
      // Reflect that the file upload has completed
      $self.find('.flow-file-progress').text('(completed)');
      $self.find('.flow-file-pause, .flow-file-resume').remove();

    });
    r.on('fileError', function(file, message){
      // Reflect that the file upload has resulted in error
      $('.flow-file-'+file.uniqueIdentifier+' .flow-file-progress').html('(file could not be uploaded: '+message+')');
    });
    r.on('fileProgress', function(file){
      // Handle progress for both the file and the overall upload
      $('.flow-file-'+file.uniqueIdentifier+' .flow-file-progress')
        .html(Math.floor(file.progress()*100) + '% '
          + readablizeBytes(file.averageSpeed) + '/s '
          + secondsToStr(file.timeRemaining()) + ' remaining') ;
      $('.progress-bar').css({width:Math.floor(r.progress()*100) + '%'});
    });
    r.on('uploadStart', function(){
      // Show pause, hide resume
      $('.flow-progress .progress-resume-link').hide();
      $('.flow-progress .progress-pause-link').show();
    });
    r.on('catchAll', function() {
      console.log.apply(console, arguments);
    });
    window.r = {
      pause: function () {
        r.pause();
        // Show resume, hide pause
        $('.flow-file-resume').show();
        $('.flow-file-pause').hide();
        $('.flow-progress .progress-resume-link').show();
        $('.flow-progress .progress-pause-link').hide();
      },
      cancel: function() {
        r.cancel();
        $('.flow-file').remove();
      },
      upload: function() {
        $('.flow-file-pause').show();
        $('.flow-file-resume').hide();
        r.resume();
      },
      flow: r
    };
    

});