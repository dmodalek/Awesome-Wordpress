
'use strict';

var gulp = require('gulp');

gulp.task('install', function() {
      gulp.start('bower');
});

// Bower
gulp.task('bower', function() {
    gulp.src(['bower_components/wordpress/**'])
        .pipe(gulp.dest('public'))
	gulp.src(['bower_components/awesome-theme/**'])
        .pipe(gulp.dest('public/wp-content/themes/awesome-theme'))

	gulp.src(['bower_components/advanced-custom-fields/**'])
        .pipe(gulp.dest('public/wp-content/plugins/advanced-custom-fields'))
	gulp.src(['bower_components/force-regenerate-thumbnails/**'])
        .pipe(gulp.dest('public/wp-content/plugins/force-regenerate-thumbnails'))
	gulp.src(['bower_components/contact-form-7/**'])
        .pipe(gulp.dest('public/wp-content/plugins/contact-form-7'))
	gulp.src(['bower_components/really-simple-captcha/**'])
        .pipe(gulp.dest('public/wp-content/plugins/really-simple-captcha'))
});

