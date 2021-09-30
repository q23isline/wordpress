# wordpress

## はじめにやること

1. `git clone 'https://github.com/q23isline/wordpress.git'`コマンド実行
2. `docker-compose build`コマンド実行
3. `docker-compose up -d`コマンド実行
4. `docker exec -it db /bin/bash`コマンド実行
5. `mysql -u root -p wordpress < /root/test-data/wordpress.sql`コマンド実行
    - `Enter password:`は`root`を入力
6. `exit`コマンド実行

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
