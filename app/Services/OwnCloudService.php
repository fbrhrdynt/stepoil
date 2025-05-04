<?php

namespace App\Services;

use Sabre\DAV\Client;
use Illuminate\Http\UploadedFile;

class OwnCloudService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'baseUri'  => config('filesystems.disks.owncloud.baseUri'),
            'userName' => config('filesystems.disks.owncloud.userName'),
            'password' => config('filesystems.disks.owncloud.password'),
        ]);
    }

    public function uploadFile(string $path, UploadedFile $file): bool
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $remoteFolder = rtrim($path, '/');
        $remotePath = $remoteFolder . '/' . $filename;
    
        // 1. Cek folder
        $folderResponse = $this->client->request('PROPFIND', $remoteFolder, '', [
            'Depth' => 0,
        ]);
    
        if ($folderResponse['statusCode'] === 404) {
            // 2. Folder belum ada → buat pakai MKCOL
            $create = $this->client->request('MKCOL', $remoteFolder);
            if (!in_array($create['statusCode'], [201, 405])) {
                \Log::error("❌ Gagal membuat folder di OwnCloud", ['path' => $remoteFolder, 'response' => $create]);
                return false;
            }
        }
    
        // 3. Upload file
        $response = $this->client->request('PUT', $remotePath, file_get_contents($file->getRealPath()));
    
        \Log::info("📦 Upload response", [
            'remotePath' => $remotePath,
            'status' => $response['statusCode'],
        ]);
    
        return in_array($response['statusCode'], [201, 204]);
    }
    

    public function deleteFile(string $remotePath): bool
    {
        $response = $this->client->request('DELETE', $remotePath);
        return $response['statusCode'] === 204;
    }

    public function fileExists(string $remotePath): bool
    {
        $response = $this->client->request('HEAD', $remotePath);
        return $response['statusCode'] === 200;
    }
}
