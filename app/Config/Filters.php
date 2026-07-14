<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;


class Filters extends BaseFilters
{

    /**
     * Aliases
     *
     * @var array<string, class-string|list<class-string>>
     */
    public array $aliases = [

        // Default CodeIgniter Filter
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'cors'          => Cors::class,


        // Custom Filter Login
        'auth' => \App\Filters\AuthFilter::class,


        // Custom Filter Admin
        'admin' => \App\Filters\AdminFilter::class,

    ];



    /**
     * Required Filters
     *
     * @var array<string, array>
     */
    public array $required = [

        'before' => [

            'forcehttps',
            'pagecache',

        ],


        'after' => [

            'pagecache',
            'performance',
            'toolbar',

        ],

    ];




    /**
     * Global Filters
     *
     * @var array<string, array>
     */
    public array $globals = [

        'before' => [

            // 'honeypot',
            // 'csrf',
            // 'invalidchars',

        ],


        'after' => [

            // 'secureheaders',

        ],

    ];





    /**
     * Method Filters
     *
     * @var array<string, list<string>>
     */
    public array $methods = [];






    /**
     * Route Filters
     *
     * @var array<string, array<string, list<string>>>
     */
    public array $filters = [



        // Semua user yang login
        'auth' => [

            'before' => [

                'dashboard/*',

            ],

        ],




        // Khusus admin
        'admin' => [

            'before' => [

                'admin/*',

            ],

        ],



    ];

}