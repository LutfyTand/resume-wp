<?php
/**
 * Konfigurasi dasar WordPress.
 *
 * Berkas ini berisi konfigurasi-konfigurasi berikut: Pengaturan MySQL, Awalan Tabel,
 * Kunci Rahasia, Bahasa WordPress, dan ABSPATH. Anda dapat menemukan informasi lebih
 * lanjut dengan mengunjungi Halaman Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Menyunting wp-config.php}. Anda dapat memperoleh pengaturan MySQL dari web host Anda.
 *
 * Berkas ini digunakan oleh skrip penciptaan wp-config.php selama proses instalasi.
 * Anda tidak perlu menggunakan situs web, Anda dapat langsung menyalin berkas ini ke
 * "wp-config.php" dan mengisi nilai-nilainya.
 *
 * @package WordPress
 */

// ** Pengaturan MySQL - Anda dapat memperoleh informasi ini dari web host Anda ** //
/** Nama basis data untuk WordPress */
define( 'DB_NAME', 'wp_tiga' );

/** Nama pengguna basis data MySQL */
define( 'DB_USER', 'user_tiga' );

/** Kata sandi basis data MySQL */
define( 'DB_PASSWORD', '123456' );

/** Nama host MySQL */
define( 'DB_HOST', 'localhost' );

/** Set Karakter Basis Data yang digunakan untuk menciptakan tabel basis data. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Jenis Collate Basis Data. Jangan ubah ini jika ragu. */
define('DB_COLLATE', '');

/**#@+
 * Kunci Otentifikasi Unik dan Garam.
 *
 * Ubah baris berikut menjadi frase unik!
 * Anda dapat menciptakan frase-frase ini menggunakan {@link https://api.wordpress.org/secret-key/1.1/salt/ Layanan kunci-rahasia WordPress.org}
 * Anda dapat mengubah baris-baris berikut kapanpun untuk mencabut validasi seluruh cookies. Hal ini akan memaksa seluruh pengguna untuk masuk log ulang.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'R45[$x:ooL+sAC1l2slAwm(.:}E6hF2)=Aof$328]mw&&aQ)vOL%(j jxDMrAaBi' );
define( 'SECURE_AUTH_KEY',  'SrI@Jy^9sG3,R$d49tGOOs[NK6},Ad9`I1:{nb^GUk5kknX9w^@5Na[R8=Gt43vx' );
define( 'LOGGED_IN_KEY',    'LPI?NG?JbU.;Ucd`Y~2@W=xTi4|7OAB&A].4u:@ -Ra:^ja/1MPkOPL`lX^Z7)zm' );
define( 'NONCE_KEY',        '1[,QBVVNkP0oI#=W%82ea,G7-Xu,itz?Sic5`HS~AN5LLOw0GsD1bUu{WO^=CmCO' );
define( 'AUTH_SALT',        'TEx9!;@aKT;=`T^X;E+% ||S?y^Yu{Q@uQ2XgvLdK) f%wF9eKXJDM[~9&Knf+! ' );
define( 'SECURE_AUTH_SALT', '^`^{Yfc~}fu+y>Z1B`QQDF:>@Y16. 6,.u3_7L_93NUe{gp,5eFG<ccgK8,QV3fc' );
define( 'LOGGED_IN_SALT',   'Dc)0w.ZBUZdBvMUi$QF`(yj<&j8RGSCE0M1t5Jp1Vm8l)0]9huI*s-iR|M9WZN<A' );
define( 'NONCE_SALT',       ':tGD1~@tVg[ap)eVctI@yN?{/u@P1r=x,#!%!  ?3o-/KZlktVV$0ZkjI6Ii6)DZ' );

/**#@-*/

/**
 * Awalan Tabel Basis Data WordPress.
 *
 * Anda dapat memiliki beberapa instalasi di dalam satu basis data jika Anda memberikan awalan unik
 * kepada masing-masing tabel. Harap hanya masukkan angka, huruf, dan garis bawah!
 */
$table_prefix = 'wp_';

/**
 * Untuk pengembang: Moda pengawakutuan WordPress.
 *
 * Ubah ini menjadi "true" untuk mengaktifkan tampilan peringatan selama pengembangan.
 * Sangat disarankan agar pengembang plugin dan tema menggunakan WP_DEBUG
 * di lingkungan pengembangan mereka.
 */
define('WP_DEBUG', false);

/* Cukup, berhenti menyunting! Selamat ngeblog. */

/** Lokasi absolut direktori WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Menentukan variabel-variabel WordPress berkas-berkas yang disertakan. */
require_once(ABSPATH . 'wp-settings.php');
