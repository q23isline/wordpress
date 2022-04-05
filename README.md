# wordpress

## はじめにやること

```bash
git clone 'https://github.com/q23isline/wordpress.git'
docker-compose build
docker-compose up -d
# db コンテナ内へ入る
docker exec -it db /bin/bash
# db コンテナ内でデータ取り込み
mysql -u root -p wordpress < /root/test-data/wordpress.sql
# Enter password: は root を入力
# db コンテナから脱出
exit

docker exec -it app php composer.phar install
docker exec -it app vendor/bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs
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

- ユーザー名
  - admin
- パスワード
  - admin00

## コード静的解析

```bash
docker exec -it --env XDEBUG_MODE=coverage app php composer.phar check
# もしくは
docker exec -it app vendor/bin/phpcs --colors -p --standard=WordPress wp-content/themes/
```

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
