module.exports = function (grunt) {

    'use strict';

    grunt.config('cssmin', {
        admin: {
            options: {
                keepSpecialComments: 0
            },
            expand: true,
            cwd: 'admin/css',
            src: [
                '*.css',
                '!*.min.css'
            ],
            dest: 'admin/css',
            ext: '.min.css'
        }
    });

};