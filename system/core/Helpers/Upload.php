<?php

function folder($foldername = 'directory', $folderid = NULL, $type = 'image')
{
    $foldername = replaceFolderName($foldername);
    $type = replaceFolderName($type);

    if (empty($folderid)) {
        $folder = 'upload/' . $foldername . '/' . $type;
    } else {
        $folderid = replaceFolderName($folderid);
        $folder = 'upload/' . $foldername . '/' . $folderid . '/' . $type;
    }

    // check if folder current email id not exist, 
    // create one with permission (server) to upload
    if (!is_dir($folder)) {

        $old = umask(0);
        mkdir($folder, 0755, true);
        umask($old);

        chmod($folder, 0755);
    }

    return $folder;
}

function replaceFolderName($folderName)
{
    return str_replace(array('\'', '/', '"', ',', ';', '<', '>', '@', '|'), '_', preg_replace('/\s+/', '_', $folderName));
}

function get_mime_type($filename)
{
    $idx = pathinfo($filename, PATHINFO_EXTENSION);

    $mimet = array(
        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',

        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        // archives
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'exe' => 'application/x-msdownload',
        'msi' => 'application/x-msdownload',
        'cab' => 'application/vnd.ms-cab-compressed',

        // audio/video
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',

        // adobe
        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',

        // ms office
        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',
        'docx' => 'application/msword',
        'xlsx' => 'application/vnd.ms-excel',
        'pptx' => 'application/vnd.ms-powerpoint',


        // open office
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    );

    if (isset($mimet[$idx])) {
        return $mimet[$idx];
    } else {
        return 'application/octet-stream';
    }
}

function upload($files, $folder, $data = NULL, $index = false, $compress = false)
{
    $fileTmpPath = ($index === false) ? $files['tmp_name'] : $files['tmp_name'][$index];
    $fileName = ($index === false) ? $files['name'] : $files['name'][$index];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $newName = md5($fileName) . date('dmYhis');
    $saveName = $newName . '.' . $ext;
    $path = $folder . '/' . $saveName;

    if (move_uploaded_file($fileTmpPath, $path)) {

        $entity_type = $entity_file_type = $entity_id = $user_id = $file_compression = 0;

        if ($compress) {
            $canCompress = ['jpg', 'png', 'jpeg', 'gif'];
            if (in_array(pathinfo($saveName, PATHINFO_EXTENSION), $canCompress)) {
                $compressfolder = $folder . '/' . $newName . "_compress." . $ext;
                $compressImage = compress($path, $compressfolder, '30');
                $thumbnailfolder = $folder . '/' . $newName . "_thumbnail." . $ext;
                $thumbnailImage = compress($path, $thumbnailfolder, '5');
                $file_compression = 3;
            }
        }

        if (!empty($data)) {
            $user_id = (isset($data['user_id'])) ? $data['user_id'] : NULL;
            $entity_type = (isset($data['type'])) ? $data['type'] : NULL;
            $entity_file_type = (isset($data['file_type'])) ? $data['file_type'] : 'PROFILE_PHOTO';
            $entity_id = (isset($data['entity_id'])) ? $data['entity_id'] : NULL;
        }

        $filesMime = get_mime_type($fileName);
        $fileType = explodeArr($filesMime, '/',  0);
        $fileType = $fileType[0];

        return [
            'files_name' => $saveName,
            'files_original_name' => $fileName,
            'files_folder' => $folder,
            'files_type' => $fileType,
            'files_mime' => $filesMime,
            'files_extension' => $ext,
            'files_size' => ($index === false) ? $files['size'] : $files['size'][$index],
            'file_compression' => $file_compression,
            'files_path' => $path,
            'file_path_is_url' => 0,
            'entity_type' => $entity_type,
            'entity_file_type' => $entity_file_type,
            'entity_id' => $entity_id,
            'user_id' => $user_id,
        ];
    }

    return [];
}

function moveFile($filesName, $currentPath, $folder, $data = NULL, $type = 'rename')
{
    $ext = pathinfo($filesName, PATHINFO_EXTENSION);
    $newName = md5($filesName) . date('dmYhis');
    $saveName = $newName . '.' . $ext;
    $path = $folder . '/' . $saveName;
    $fileSize = filesize($currentPath);

    if ($type($currentPath, $path)) {

        $entity_type = $entity_file_type = $entity_id = $user_id = 0;

        if (!empty($data)) {
            $user_id = (isset($data['user_id'])) ? $data['user_id'] : NULL;
            $entity_type = (isset($data['type'])) ? $data['type'] : NULL;
            $entity_file_type = (isset($data['file_type'])) ? $data['file_type'] : 'PROFILE_PHOTO';
            $entity_id = (isset($data['entity_id'])) ? $data['entity_id'] : NULL;
        }

        $filesMime = get_mime_type($filesName);
        $fileType = explodeArr($filesMime, '/',  0);
        $fileType = $fileType[0];

        //Clear cache and check filesize again
        clearstatcache();

        return [
            'files_name' => $saveName,
            'files_original_name' => $filesName,
            'files_folder' => $folder,
            'files_type' => $fileType,
            'files_mime' => $filesMime,
            'files_extension' => $ext,
            'files_size' => round($fileSize, 2),
            'file_compression' => 0,
            'files_path' => $path,
            'file_path_is_url' => 0,
            'entity_type' => $entity_type,
            'entity_file_type' => $entity_file_type,
            'entity_id' => $entity_id,
            'user_id' => $user_id,
        ];
    }

    return [];
}

// Quality: quality is optional, and ranges from 0 (worst quality, smaller file) to 100 (best quality, biggest file),
function compress($source, $destination, $quality = '100')
{
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}

// Compress on the go
function compressImageonthego($source, $quality)
{
    $info = getimagesize($source);
    $extension = explode(".", $source);

    $newname = "temp" . rand(10, 100);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, "images/" . $newname . "." . $extension[1], $quality);
    echo "<b>" . $newname . "." . $extension[1] . "</b>";
}
