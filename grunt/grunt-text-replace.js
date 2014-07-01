module.exports = function (grunt) {

    'use strict';

    var config = require('config');

    grunt.config('replace', {
        phpDoc: {
            src: [
                '*.php'
            ],
            overwrite: true,
            replacements: [{
                from: 'Version: ' + config.version.from,
                to: 'Version: ' + config.version.to
            }]
        },
        json: {
            src: [
                'bower.json',
                'composer.json',
                'package.json'
            ],
            overwrite: true,
            replacements: [{
                from: '"version": "' + config.version.from + '"',
                to: '"version": "' + config.version.to + '"'
            }]
        },
        plugin: {
            src: [
                'classes/**/*.php'
            ],
            overwrite: true,
            replacements: [{
                from: '$version = \'' + config.version.from + '\'',
                to: '$version = \'' + config.version.to + '\''
            }]
        }
    });

};