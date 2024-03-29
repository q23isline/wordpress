<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'wordpress' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', 'root' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'db' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'r&2roR*_3yykMJyJ&4&,so?GFpFy@4}:FW(owZ.{/w7rNcU2IX>Y%P,rM3v]}a0S' );
define( 'SECURE_AUTH_KEY',  '#D<(.`b72:{tnPNlyvS]XPgw.Mc7-CBY!#gcP(Z$0Ee+90R]Y=@6:#qc!cO`D+>6' );
define( 'LOGGED_IN_KEY',    '&q}m638H~O&CK&Zt+B%3C1HAo+a&N~}-Ow9p)w.^:B=0m6u=i|=$U$3])XKq$Jz>' );
define( 'NONCE_KEY',        '[9HpCR}OOq&u$~-2&Ma5pU5!$`Bm)@/d7B]kCV1o{2Whzfx;j+Jbxd#Oj4r~Q%h2' );
define( 'AUTH_SALT',        '`SLPoh7?tPB29:s8uxmeqQ`_C=D6-<6O3o3dX[q*E=Ng)=Qs`_@L-e4Zb.g/FJDG' );
define( 'SECURE_AUTH_SALT', 'AKVZYLUjBnYq{KCOEvxh9TtUeK!7(/+&AfQVbyBXxo~mYnTho9tY?8-bP,7!QoBW' );
define( 'LOGGED_IN_SALT',   '.;82FI$+t}5WUM[h>4TZb5>&knMnghUpv[Sj9UL_y)rOT+)l8:6xpIVDX.GZ_G3J' );
define( 'NONCE_SALT',       'Z?ecE:iyU@m:xO]d][{>uh+JB#R_yn#zw2V,QQ53>91tXT,&25>AaoGmBu?V-,oS' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
