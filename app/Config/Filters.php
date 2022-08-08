<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'login'      => \App\Filters\Auth::class,
        'role'       => \Myth\Auth\Filters\RoleFilter::class,
        'permission' => \Myth\Auth\Filters\PermissionFilter::class,
        'cors'     => \App\Filters\Cors::class,
        'auth'         => \App\Filters\Auth::class,
        'login2'      => \Myth\Auth\Filters\LoginFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'honeypot',
            'cors',
            // 'login'
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        //bisa nambahin lagi
        'login' => ['before' => [
            'Report', 'Detail', 'Home', 'Komik', 'Komik/create', 'Komik/detail', 'Komik/edit', 'Komik/generate', 'Komik/index', 'Komik/lanjut', 'Komik/lanjut2', 'Komitmen', 'Komitmen/create', 'Komitmen/detail', 'Komitmen/edit', 'Komitmen/generate', 'Komitmen/index', 'Komitmen/lanjut', 'Komitmen/lanjut2', 'Monitoring',
            'Mengajar', 'Mengajar/create', 'Mengajar/detail', 'Mengajar/edit', 'Mengajar/generate', 'Mengajar/index', 'Mengajar/lanjut', 'Mengajar/lanjut2',
            'MonitoringKomitmen', 'Pages', 'laporan', 'report/laporan', 'Profil'
        ]],
    ];
}
