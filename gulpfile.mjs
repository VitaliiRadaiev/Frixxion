import gulp from "gulp";
const { src, dest } = gulp;
import fileinclude from "gulp-file-include";
import { deleteAsync } from "del";
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);
import autoprefixer from 'gulp-autoprefixer';
import postcss from 'gulp-postcss';
import sortMediaQueries from 'postcss-sort-media-queries';
import plumber from "gulp-plumber";
import notify from "gulp-notify";
import tailwindcss from "tailwindcss";
import cssnano from "cssnano"; // для минимизации CSS
import terser from "gulp-terser"; // для минимизации JS
import rename from 'gulp-rename'; // для переименования файлов

const project_name = "assets";
const src_folder = "src";

const path = {
    build: {
        html: project_name + "/",
        js: project_name + "/",
        css: project_name + "/css/"
    },
    src: {
        html: [src_folder + "/*.php"],
        js: [src_folder + "/js/main.js"],
        css: src_folder + "/styles/main.scss"
    },
    watch: {
        html: ["./*.php", "./sections/**/*.php", "./modules/**/*.php", "./templates/**/*.php"],
        js: [src_folder + "/js/**/*.js", "./sections/**/*.js", "./modules/**/*.js", "./templates/**/*.js"],
        css: [src_folder + "/styles/**/*.scss", "./sections/**/*.scss", "./modules/**/*.scss", "./templates/**/*.scss"]
    },
    clean: [project_name + "/js/", project_name + "/css/"]
};

export function clean() {
    return deleteAsync(path.clean);
}

// Задача для CSS
export function css() {
    return src(path.src.css, {})
        .pipe(plumber({
            errorHandler: notify.onError({
                title: "SCSS Error",
                message: "Error: <%= error.message %>"
            })
        }))
        .pipe(
            sass({
                outputStyle: "expanded",
                includePaths: ['.', 'node_modules']
            })
        )
        .pipe(
            postcss([
                tailwindcss('./tailwind.config.js'),
                sortMediaQueries()
            ])
        )
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 3 versions"],
                cascade: true
            })
        )
        // Обычный CSS
        .pipe(dest(path.build.css))
        // Минимизация CSS
        //.pipe(postcss([cssnano()]))
        .pipe(rename({ suffix: '.min' })) // добавление суффикса .min
        .pipe(dest(path.build.css));  // Минимизированный CSS
}

// Задача для JS
export function js() {
    return src(path.src.js, { base: src_folder })
        .pipe(fileinclude())
        .pipe(gulp.dest(path.build.js))
        // Обычный JS
        .pipe(dest(path.build.js))
        // Минимизация JS
        //.pipe(terser())
        //.pipe(rename({ suffix: '.min' })) // добавление суффикса .min
        .pipe(dest(path.build.js)); // Минимизированный JS
}

// Наблюдение за файлами
export function watch() {
    gulp.watch([path.watch.html], css);
    gulp.watch([path.watch.css], css);
    gulp.watch([path.watch.js], js);
}

// Задача для сборки
export function build(done) {
    gulp.series(
        clean,
        gulp.parallel(
            js,
            css
        ),
    )(done);
}

export default gulp.series(
    build,
    gulp.parallel(
        watch
    )
);
