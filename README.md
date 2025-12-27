# wordpress

[![LICENSE](https://custom-icon-badges.herokuapp.com/badge/license-GPL%202.0-8BB80A.svg?logo=law&logoColor=white)](./license.txt)
![releases](https://img.shields.io/github/release/q23isline/wordpress.svg?logo=github)
[![CircleCI](https://img.shields.io/circleci/build/github/q23isline/wordpress/develop.svg?label=CircleCI&logo=circleci)](https://circleci.com/gh/q23isline/wordpress)
[![GitHub Actions](https://github.com/q23isline/wordpress/actions/workflows/ci.yml/badge.svg)](https://github.com/q23isline/wordpress/actions/workflows/ci.yml)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%20max-brightgreen.svg)](https://github.com/phpstan/phpstan)
[![Open in Visual Studio Code](https://img.shields.io/static/v1?logo=visualstudiocode&label=&message=Open%20in%20Visual%20Studio%20Code&labelColor=555555&color=007acc&logoColor=007acc)](https://open.vscode.dev/q23isline/wordpress)

[![PHP](https://img.shields.io/static/v1?logo=php&label=PHP&message=v8.4&labelColor=555555&color=777BB4&logoColor=777BB4)](https://www.php.net)
[![WordPress](https://img.shields.io/static/v1?logo=wordpress&label=WordPress&message=v6.9&labelColor=585C60&color=F4F4F4&logoColor=F4F4F4)](https://ja.wordpress.org/)
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

3. 開発準備

    ```bash
    cp .vscode/launch.json.default .vscode/launch.json
    cp .vscode/settings.json.default .vscode/settings.json
    ```

4. アプリ立ち上げ

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
  - <https://lvh.me/wp-login.php>
- 一般ページ
  - <https://lvh.me>

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

# フォーマッターのみ
docker exec -it app vendor/bin/phpcs --colors -p
# コード静的解析のみ
docker exec -it app ./vendor/bin/phpstan analyse
# コード静的解析のベースラインを生成する（現状のエラーをいったんすべて無視する）
docker exec -it app ./vendor/bin/phpstan analyse --generate-baseline
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

## テーマ・プラグインを新規作成したいとき

```bash
# テーマ
docker exec -it app php wp-cli.phar scaffold _s my-classic-theme --allow-root
# プラグイン
docker exec -it app php wp-cli.phar scaffold plugin my-plugin --allow-root
```
