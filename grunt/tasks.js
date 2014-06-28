module.exports = function (grunt) {

    'use strict';

    grunt.registerTask('default', [
        'build',
        'watch'
    ]);

    grunt.registerTask('build', [
        'lib',
        'css'
    ]);

    grunt.registerTask('bump', [
        'replace'
    ]);

    grunt.registerTask('css', [
        'clean:css',
        'scsslint',
        'sass',
        'cssmin'
    ]);

    grunt.registerTask('lib', [
        'clean:lib',
        'copy'
    ]);

};
