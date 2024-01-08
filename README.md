# APKINDI (Aplikasi Kinerja Prodi)
Aplikasi ini berbasis website  dikembangkan untuk dapat membantu admin/staff universitas dalam mengelola kinerja prodi dalam upaya peningkatan kenaikan pangkat, agar lebih mudah dan praktis,
Aplikasi ini dikembangkan oleh :

(Bapak Gunardi Djoko Winardo dan Agus Sulistiono)

untuk pandunan penggunaan website anda dapat membacanya melalui link berikut ini [(https://www.infosinau.my.id/2024/01/panduan-penggunaan-appkindi.html)]. Adapun demo dapat Anda akses di https://apkindi.astwebmedia.my.id/.

beberapa spesifikasi diantaranya:
1. Dikembangan dengan Ci-4. Pastikan teman-teman membaca Server Requirements dari CI4 ini yah.
2. menggunakan AdminLTE 3.1.0. Bisa diakses di https://adminlte.io/
3. Notifikasi menggunakan Sweetalert yang dapat diakases melalui link https://sweetalert2.github.io/

# Fitur-fitur kelola aplikasi meliputi:
- Login dan logout
- Master Data
- Kelola Jumlah Mahasiswa Masuk dan Keluar
- kelola Dosen
- kelola Buku/Jurnal/Prosiding dan lainya
- kelola staff and team
- Report Buku Perdosen
- kelola pengguna
- kelola konfigurasi 
- Dan fitur lainnya

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds the distributable version of the framework,
including the user guide. It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).


## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/contributing.md) section in the development repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
