<?php

namespace Ht3aa\LinkToRelationTextColumn;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Ht3aa\LinkToRelationTextColumn\Commands\LinkToRelationTextColumnCommand;
use Ht3aa\LinkToRelationTextColumn\Testing\TestsLinkToRelationTextColumn;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LinkToRelationTextColumnServiceProvider extends PackageServiceProvider
{
    public static string $name = 'link-to-relation-text-column';

    public static string $viewNamespace = 'link-to-relation-text-column';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('ht3aa/link-to-relation-text-column');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/link-to-relation-text-column/{$file->getFilename()}"),
                ], 'link-to-relation-text-column-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsLinkToRelationTextColumn);
    }

    protected function getAssetPackageName(): ?string
    {
        return 'ht3aa/link-to-relation-text-column';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('link-to-relation-text-column', __DIR__ . '/../resources/dist/components/link-to-relation-text-column.js'),
            Css::make('link-to-relation-text-column-styles', __DIR__ . '/../resources/dist/link-to-relation-text-column.css'),
            Js::make('link-to-relation-text-column-scripts', __DIR__ . '/../resources/dist/link-to-relation-text-column.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            LinkToRelationTextColumnCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_link-to-relation-text-column_table',
        ];
    }
}
