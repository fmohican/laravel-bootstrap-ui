<?php

namespace Laravel\Ui\Presets;

use Illuminate\Filesystem\Filesystem;

class Bootstrap extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::updateWebpackConfiguration();
        static::updateSass();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/bootstrap-stubs/webpack.mix.js', base_path('webpack.mix.js'));
        copy(__DIR__.'/bootstrap-stubs/package.json', base_path('package.json'));
        unlink(base_path('vite.config.js'));
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));

        copy(__DIR__.'/bootstrap-stubs/_variables.scss', resource_path('sass/_variables.scss'));
        copy(__DIR__.'/bootstrap-stubs/app.scss', resource_path('sass/app.scss'));
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/bootstrap-stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }
}
