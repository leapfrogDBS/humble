const gulp = require('gulp');
const clean = require('gulp-clean');
const plumber = require('gulp-plumber');
const cache = require('gulp-cached');
const notify = require('gulp-notify');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const rename = require('gulp-rename');
const babel = require('gulp-babel');
const browserSync = require('browser-sync').create();
const postcss = require('gulp-postcss');
const tailwindcss = require('tailwindcss');
const cssnano = require('cssnano');
const cleanCSS = require('gulp-clean-css');

/**
 * Paths
 */
const base = {
  src: 'develop',
  public: 'wp/wp-content/themes/humble-associates',
  browserSyncProxy: 'localhost/humble/wp'
};

const paths = {
  src: {
    root: base.src,
    js: base.src + '/js/',
    css: base.src + '/sass/',
    assets: base.src + '/assets/',
    acfjson: base.src + '/acf-json/',
    screenshot: base.src + '/screenshot.png'
  },
  public: {
    root: base.public,
    js: base.public + '/scripts/',
    css: base.public,
    imgs: base.public + '/assets/images/',
    assets: base.public + '/assets/',
    acfjson: base.public + '/acf-json/',
    screenshot: base.public
  }
};

/**
 * Clean contents of public folder excluding .git
 */
gulp.task('clean', function () {
  return gulp.src([paths.public.root + '/*', '!' + paths.public.root + '/.git'], { read: false, allowEmpty: true })
    .pipe(clean({ force: true }));
});

/**
 * Move screenshot
 */
gulp.task('move-screenshot', function () {
  return gulp.src(paths.src.screenshot, { allowEmpty: true })
    .pipe(plumber())
    .pipe(cache('move-screenshot'))
    .on('error', notify.onError())
    .pipe(gulp.dest(paths.public.screenshot));
});

/**
 * Move ACF JSON
 */
gulp.task('acf-json', function () {
  return gulp.src(paths.src.acfjson + '**/*', { allowEmpty: true })
    .pipe(plumber())
    .pipe(cache('acf-json'))
    .on('error', notify.onError())
    .pipe(gulp.dest(paths.public.acfjson));
});

/**
 * Move content files
 */
gulp.task('move-content-files', function () {
  return gulp.src(paths.src.root + '/**/*.{php,html}', { allowEmpty: true })
    .pipe(plumber())
    .pipe(cache('move-content-files'))
    .on('error', notify.onError())
    .pipe(gulp.dest(paths.public.root));
});

/**
 * Move assets
 */
gulp.task('move-assets', function () {
  return gulp.src(paths.src.assets + '**/*', { allowEmpty: true })
    .pipe(plumber())
    .pipe(cache('move-assets'))
    .on('error', notify.onError())
    .pipe(gulp.dest(paths.public.assets));
});

/**
 * Styles 
 */
gulp.task('styles', function () {
  return gulp.src(paths.src.css + '*.scss', { allowEmpty: true })
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(postcss([autoprefixer(), tailwindcss('tailwind.config.js')]))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.public.css));
});

/**
 * Scripts
 */
gulp.task('scripts', function () {
  return gulp.src(paths.src.js + '*.js')
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(babel())
    .pipe(rename({ suffix: '.min' }))
    .on('error', notify.onError())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.public.js));
});


/**
 * Clean Styles Development folder
 */
gulp.task('clean.dev.styles', function () {
  return gulp.src(paths.src.css + '*.css', { allowEmpty: true })
    .pipe(clean({ force: true }));
});

/**
 * BrowserSync
 */
gulp.task('browser-sync', function (done) {
  browserSync.init({
    proxy: base.browserSyncProxy
  });
  done();
});

gulp.task('browser-sync-reload', function (done) {
  browserSync.reload();
  done();
});

gulp.task('default',
  gulp.series(
    'clean',
    gulp.parallel(
      'scripts',
      'move-content-files',
      'move-assets',
      'move-screenshot',
      'acf-json',
      'styles'
    ),
    'clean.dev.styles'
  )
);

gulp.task('watch',
  gulp.series(
    'scripts',
    'move-screenshot',
    //'acf-json',
    'move-content-files',
    'move-assets',
    'browser-sync',
    'styles',
    function (done) {
      gulp.watch(paths.src.root + '/**/*.{php,html}', gulp.series('move-content-files', 'browser-sync-reload'));
      gulp.watch(paths.src.assets + '**/*', gulp.series('move-assets', 'browser-sync-reload'));
      gulp.watch(paths.src.js + '*.js', gulp.series('scripts', 'browser-sync-reload'));
      gulp.watch(paths.src.css + '**/*.scss', gulp.series('styles', 'browser-sync-reload'));
      gulp.watch(paths.src.root + '/**/*.{php,html,scss,css,svg}', gulp.series(['styles']));
      gulp.watch(paths.src.acfjson + '**/*', gulp.series('acf-json', 'browser-sync-reload'));
      done();
    }
  )
);
