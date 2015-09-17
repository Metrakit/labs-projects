// packages
var gulp           = require('gulp'),
    notify         = require('gulp-notify'),
    concat 		   = require('gulp-concat'),
    browserSync    = require('browser-sync'), 
    sass 		   = require('gulp-sass'),
    plumber        = require('gulp-plumber'),
    uglify         = require('gulp-uglify')
    path           = require('path'),
    sourcemaps 	   = require('gulp-sourcemaps'),
    bourbon 	   = require('node-bourbon'),
    sprity 		   = require('sprity'),
    gulpif 		   = require('gulp-if'),
    argv 		   = require('yargs').argv,
    uncss 		   = require('gulp-uncss'),

    url 		   = "http://labs.dev",

    reload         = browserSync.reload;

// paths
var path = {
        src: "resources/assets",
        dist: "public",
        bower: 'vendor/bower_components',
        icons: path.join(__dirname, "node_modules/gulp-notify/node_modules/node-notifier/node_modules/growly/example/")
};

// Error Handler
var plumberErrorHandler = { errorHandler: notify.onError({
        title: "SASS ERROR",
        message: "Error: <%= error.message %>",
        icon: path.icons + "muffin.png",
    })
};

// Browser-sync
gulp.task('browser-sync', function() {
    browserSync({
        proxy: url
    });
});

// Javascript
gulp.task('js', function() {
    var main = [path.src + '/js/*.js', path.bower + '/bootstrap/dist/js/bootstrap.js'];
    return gulp.src(main)
        .pipe(uglify())
        .pipe(concat('main.js'))
        .pipe(gulp.dest('public/js'));
});
 
// Sass
gulp.task('sass', function() {
  gulp.src(path.src + '/sass/*.scss')
    .pipe(plumber(plumberErrorHandler))
	.pipe(sourcemaps.init())
    .pipe(sass({
    	includePaths: bourbon.includePaths
    }))
	.pipe(sourcemaps.write())
	.pipe(concat('main.css'))
    .pipe(gulpif(argv.production, uncss({
        html: [url]
    })))
	.pipe(gulp.dest('public/css'))
    .pipe(reload({stream: true}));
});

// sprites
gulp.task('sprites', function () {
	return sprity.src({
	    src: path.src + '/img/sprites/icons/**/*.{png}',
	    style: "sprite.scss",
		processor: 'sass'
	})
	.pipe(gulpif('*.png', gulp.dest('public/img/'), gulp.dest(path.src + "/sass/")))
});

// Default task
gulp.task('default', ['browser-sync', 'js', /*'sprites',*/ 'sass'], function () {
    gulp.watch(path.src + "/js/**/*.js", ['js', browserSync.reload]);
    gulp.watch(path.src + "/sass/**/*.scss", ['sass']);
    gulp.watch('resources/views/**/*.blade.php', [browserSync.reload]);
   // gulp.watch(path.src + '/img/sprites/**/*.png', ['sprites', 'sass']);
});
