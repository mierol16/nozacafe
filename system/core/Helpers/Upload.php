<?php

// function folder($foldername = 'directory', $folderid = NULL, $type = 'image')
// {
//     $foldername = replaceFolderName($foldername);
//     $type = replaceFolderName($type);

//     if (empty($folderid)) {
//         $folder = 'upload/' . $foldername . '/' . $type;
//     } else {
//         $folderid = replaceFolderName($folderid);
//         $folder = 'upload/' . $foldername . '/' . $folderid . '/' . $type;
//     }

//     // check if folder current email id not exist, 
//     // create one with permission (server) to upload
//     if (!is_dir($folder)) {

//         $old = umask(0);
//         mkdir($folder, 0755, true);
//         umask($old);

//         chmod($folder, 0755);
//     }

//     return $folder;
// }

function replaceFolderName($folderName)
{
    return str_replace(array('\'', '/', '"', ',', ';', '<', '>', '@', '|'), '_', preg_replace('/\s+/', '_', $folderName));
}

function upload($files, $path, $folder, $data = null, $compress = false)
{
    $fileTmpPath = $files['tmp_name'];
    $fileName = $files['name'];

    $entity_type = $entity_file_type = $entity_id = $user_id = $file_compression = 0;

    if (!empty($data)) {
        $entity_type = (isset($data['type'])) ? $data['type'] : '';
        $entity_file_type = (isset($data['file_type'])) ? $data['file_type'] : 'PROFILE_PHOTO';
        $entity_id = (isset($data['entity_id'])) ? $data['entity_id'] : '';
        $user_id = (isset($data['user_id'])) ? $data['user_id'] : '';
    }

    if (move_uploaded_file($fileTmpPath, $path)) {
        return [
            'files_name' => md5($fileName) . "_" . date('dFYhis'),
            'file_original_name' => pathinfo($fileName, PATHINFO_BASENAME),
            'files_folder' => $folder,
            'files_type' => $files['type'],
            'files_mime' => get_mime_type($fileName),
            'files_extension' => pathinfo($fileName, PATHINFO_EXTENSION),
            'files_size' => $files['size'],
            'file_compression' => $file_compression,
            'files_path' => $path,
            'file_path_is_url' => 0,
            'entity_type' => $entity_type,
            'entity_file_type' => $entity_file_type,
            'entity_id' => $entity_id,
            'user_id' => $user_id,
        ];
    }

    return false;
}
