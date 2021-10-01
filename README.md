# wordpress

## はじめにやること

1. `git clone 'https://github.com/q23isline/wordpress.git'`コマンド実行
2. `docker-compose build`コマンド実行
3. `docker-compose up -d`コマンド実行
4. `docker exec -it db /bin/bash`コマンド実行
5. `mysql -u root -p wordpress < /root/test-data/wordpress.sql`コマンド実行
    - `Enter password:`は`root`を入力
6. `exit`コマンド実行

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
