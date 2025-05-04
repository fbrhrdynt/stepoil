<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class OwncloudSetupController extends Controller
{
    public function install()
    {
        $dockerCompose = base_path('docker-compose.owncloud.yml');

        // Simpan file docker-compose
        file_put_contents($dockerCompose, <<<YML
version: '3.1'

services:
  owncloud:
    image: owncloud/server:latest
    restart: always
    ports:
      - 8080:8080
    environment:
      - OWNCLOUD_DOMAIN=localhost
      - ADMIN_USERNAME=admin
      - ADMIN_PASSWORD=admin
      - OWNCLOUD_DB_TYPE=mysql
      - OWNCLOUD_DB_NAME=owncloud
      - OWNCLOUD_DB_USERNAME=owncloud
      - OWNCLOUD_DB_PASSWORD=secret
      - OWNCLOUD_DB_HOST=db
    volumes:
      - owncloud_files:/mnt/data

  db:
    image: mariadb:10.5
    restart: always
    environment:
      - MYSQL_ROOT_PASSWORD=secret
      - MYSQL_DATABASE=owncloud
      - MYSQL_USER=owncloud
      - MYSQL_PASSWORD=secret
    volumes:
      - owncloud_db:/var/lib/mysql

volumes:
  owncloud_files:
  owncloud_db:
YML
        );

        // Jalankan docker compose
        $process = new Process(['docker', 'compose', '-f', $dockerCompose, 'up', '-d']);
        $process->setTimeout(300); // timeout 5 menit

        try {
            $process->mustRun();
            return response()->json(['message' => 'OwnCloud successfully installed on port 8080']);
        } catch (ProcessFailedException $e) {
            return response()->json(['error' => 'Install failed', 'details' => $e->getMessage()], 500);
        }
    }
}
