module.exports = function (grunt) {

    'use strict';

    grunt.config('clean', {
        css: [
            'admin/css',
            'css'
        ],
        lib: [
            'composer.lock',
            'config/.scss-lint.yml',
            'lib'
        ]
    });

};