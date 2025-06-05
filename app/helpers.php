<?php
if (!function_exists('readableMime')) {
    function readableMime($mime)
    {
        return match ($mime) {
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'application/pptx',
            'application/vnd.ms-powerpoint' => 'application/ppt',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'application/docx',
            'application/msword' => 'application/doc',
            'application/vnd.ms-excel' => 'application/xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'application/xlsx',
            'application/pdf' => 'application/pdf',
            default => $mime,
        };
    }
}
