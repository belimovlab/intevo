<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('font_awesome_file_icon_class'))
{
    function font_awesome_file_icon_class($mime_type = '')
    {
        static $font_awesome_file_icon_classes = array(
            // Images
            'image' => 'fa-file-image-o',
            // Audio
            'audio' => 'fa-file-audio-o',
            // Video
            'video' => 'fa-file-video-o',
            // Documents
            'application/pdf' => 'fa-file-pdf-o',
            'text/plain' => 'fa-file-text-o',
            'text/html' => 'fa-file-code-o',
            'application/json' => 'fa-file-code-o',
            // Archives
            'application/gzip' => 'fa-file-archive-o',
            'application/zip' => 'fa-file-archive-o',
            // Misc
            'application/octet-stream' => 'fa-file-o',
        );
        if (isset($font_awesome_file_icon_classes[ $mime_type ])) {
            return $font_awesome_file_icon_classes[ $mime_type ];
        }
        $mime_parts = explode('/', $mime_type, 2);
        $mime_group = $mime_parts[0];
        if (isset($font_awesome_file_icon_classes[ $mime_group ])) {
            return $font_awesome_file_icon_classes[ $mime_group ];
        }
        return "fa-file-o";
    }   
}



if ( ! function_exists('formatSizeUnits'))
{
    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' B';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' B';
        }
        else
        {
            $bytes = '0 B';
        }

        return $bytes;
    }
}