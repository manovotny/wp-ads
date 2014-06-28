module.exports = function (grunt) {

    'use strict';

    grunt.config('jslint', {
        js: {
            directives: {
                browser: true,
                nomen: true,
                predef: [
                    'module',
                    'require'
                ]
            },
            src: [
                'bower.json',
                'composer.json',
                'Gruntfile.js',
                'grunt/*.js',
                'package.json'
            ]
        }
    });

};