module.exports = function (grunt) {

    'use strict';

    grunt.config('scsslint', {
        sass: {
            options: {
                config: 'config/.scss-lint.yml'
            },
            src: [
                'admin/sass/**/*.scss'
            ]
        }
    });

};