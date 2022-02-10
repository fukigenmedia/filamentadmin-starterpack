<?php

namespace App\Filament\Pages;

use App\Settings\SiteSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Facades\Filament;
use Filament\Pages\SettingsPage;
use Filament\Pages\Actions\ButtonAction;

class ManageSite extends SettingsPage
{
    use HasPageShield;

    protected static string $settings = SiteSettings::class;

    protected static ?string $label = 'Situs';

    protected static ?string $title = 'Pengaturan Situs';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'Situs';

    protected static ?string $slug = 'pengaturan/situs';

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Card::make()
                ->columns(2)
                ->schema([
                    Forms\Components\Placeholder::make(__('fukigen.setting.manage-site.field.general'))
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('name')
                        ->label(__('fukigen.setting.manage-site.field.name'))
                        ->required(),
                    Forms\Components\TextInput::make('slogan')
                        ->label(__('fukigen.setting.manage-site.field.slogan'))
                        ->nullable(),
                ]),

            Forms\Components\Card::make()
                ->columns(2)
                ->schema([
                    Forms\Components\Placeholder::make(__('fukigen.setting.manage-site.field.image'))
                        ->columnSpan(2),
                    Forms\Components\FileUpload::make('logo')
                        ->label(__('fukigen.setting.manage-site.field.logo'))
                        ->directory('system')
                        ->image()
                        ->nullable(),
                    Forms\Components\FileUpload::make('favico')
                        ->label(__('fukigen.setting.manage-site.field.icon'))
                        ->directory('system')
                        ->image()
                        ->nullable(),
                ]),

        ];
    }

    protected function getFormActions(): array
    {
        return [
            ButtonAction::make('save')
                ->label(__('fukigen.setting.manage-site.button.save'))
                ->submit('save'),
        ];
    }

    protected static function canAccessSettings(): bool
    {
        return Filament::auth()->user()->can(static::getPermissionName());
    }

    public function mount(): void
    {
        parent::mount();

        abort_unless(static::canAccessSettings(), 403);
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return static::canAccessSettings();
    }

    public static function getLabel(): string
    {
        return __('fukigen.setting.manage-site.resource.label');
    }

    public static function getPluralLabel(): string
    {
        return __('fukigen.setting.manage-site.resource.labels');
    }

    protected function getTitle(): string
    {
        return __('fukigen.setting.manage-site.resource.title');
    }

    public static function getSlug(): string
    {
        return __('fukigen.setting.manage-site.resource.slug');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('fukigen.setting.manage-site.resource.nav.group');
    }

    protected static function getNavigationLabel(): string
    {
        return __('fukigen.setting.manage-site.resource.nav.label');
    }
}
