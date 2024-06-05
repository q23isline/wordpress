# wordpress

![releases](https://img.shields.io/github/release/q23isline/wordpress.svg?logo=github)
[![CircleCI](https://img.shields.io/circleci/build/github/q23isline/wordpress/develop.svg?label=CircleCI&logo=circleci)](https://circleci.com/gh/q23isline/wordpress)
[![GitHub Actions](https://github.com/q23isline/wordpress/actions/workflows/ci.yml/badge.svg)](https://github.com/q23isline/wordpress/actions/workflows/ci.yml)
[![Open in Visual Studio Code](https://img.shields.io/static/v1?logo=visualstudiocode&label=&message=Open%20in%20Visual%20Studio%20Code&labelColor=555555&color=007acc&logoColor=007acc)](https://open.vscode.dev/q23isline/wordpress)

[![PHP](https://img.shields.io/static/v1?logo=php&label=PHP&message=v8.0&labelColor=555555&color=777BB4&logoColor=777BB4)](https://www.php.net)
[![WordPress](https://img.shields.io/static/v1?logo=wordpress&label=WordPress&message=v6.5.3&labelColor=585C60&color=F4F4F4&logoColor=F4F4F4)](https://ja.wordpress.org/)
[![MySQL](https://img.shields.io/static/v1?logo=mysql&label=MySQL&message=v8.3&labelColor=555555&color=4479A1&logoColor=4479A1)](https://dev.mysql.com)
[![NGINX](https://img.shields.io/static/v1?logo=nginx&label=NGINX&message=v1.27&labelColor=555555&color=009639&logoColor=009639)](https://www.nginx.com)

## はじめにやること

1. ソースダウンロード

    ```bash
    git clone 'https://github.com/q23isline/wordpress.git'
    ```

2. DB コンテナ起動時に Permission Denied で起動できない状態にならないように権限付与する

    ```bash
    cd wordpress
    sudo chmod -R ugo+w logs
    ```

3. アプリ立ち上げ

    ```bash
    docker compose build
    docker compose up -d

    docker exec -it app php composer.phar install
    docker exec -it app vendor/bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs
    ```

## 日常的にやること

### システム起動

```bash
docker compose up -d
```

### システム終了

```bash
docker compose down
```

## プラグイン等更新できるようパーミッション解決

- 権限の見直し要！いったん動くように

```bash
sudo usermod -aG www-data ｛※所有者｝
sudo chgrp -R www-data ../*

# Wordpress本体を更新できるように
sudo chown www-data wp-admin/includes/file.php

sudo chmod g+w -R ../*
```

## 動作確認

### URL

- 管理ページ
  - <http://localhost/wp-login.php>
- 一般ページ
  - <http://localhost>

### ログイン情報

| Username | Password |
| -------- | -------- |
| admin    | admin00  |

## logsフォルダ配下のログファイルを見たいとき

以下のコマンド実行でファイルを開けるようになる

```bash
sudo chmod -R oug+rw logs
```

## コード静的解析

```bash
docker exec -it --env XDEBUG_MODE=coverage app php composer.phar check
# もしくは
docker exec -it app vendor/bin/phpcs --colors -p --standard=WordPress wp-content/themes/
```

## DBのダンプ更新手順

```bash
docker exec -it db /bin/bash
cd /docker-entrypoint-initdb.d
mysqldump -u root -p wordpress > wordpress.sql
# Enter password: は root を入力
exit
```

git 差分が現れるため、コミット＆プッシュする

## デバッグ実行

### VS Codeの初期設定

- VS Codeの拡張機能PHP Debugをインストールする
- VS CodeにXDebug用の構成ファイル（launch.json）を追加する

```json
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "hostname": "0.0.0.0",
            "pathMappings": {
                "/var/www/html/": "${workspaceRoot}"
            }
        }
    ]
}
```
