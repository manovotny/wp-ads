module.exports = (function () {

    'use strict';

    return {
        author: {
            email: 'manovotny@gmail.com',
            name: 'Michael Novotny',
            url: 'http://manovotny.com',
            username: 'anovotny'
        },
        files: {
            browserify: 'bundle'
        },
        paths: {
            curl: 'curl_downloads',
            source: 'src',
            translations: 'lang'
        },
        project: {
            composer: 'manovotny/wp-ads',
            description: 'Ads for WordPress.',
            git: 'git://github.com/manovotny/wp-ads.git',
            name: 'WP Ads',
            slug: 'wp-ads',
            type: 'plugin', // Should be `plugin` or `theme`.
            url: 'https://github.com/manovotny/wp-ads',
            version: '1.0.1'
        }
    };

}());
