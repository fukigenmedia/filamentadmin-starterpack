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
                    Forms\Components\Placeholder::make('Umum')
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Aplikasi')
                        ->required(),
                    Forms\Components\TextInput::make('slogan')
                        ->label('Slogan')
                        ->nullable(),
                    Forms\Components\Select::make('locale')
                        ->label('Bahasa')
                        ->options([
                            'en' => 'English',
                            'id' => 'Indonesia',
                        ])
                        ->required(),
                ]),

            Forms\Components\Card::make()
                ->columns(2)
                ->schema([
                    Forms\Components\Placeholder::make('Logo')
                        ->columnSpan(2),
                    Forms\Components\FileUpload::make('logo')
                        ->label('Logo Aplikasi')
                        ->directory('system')
                        ->image()
                        ->nullable(),
                    Forms\Components\FileUpload::make('favico')
                        ->label('Ikon Aplikasi')
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
                ->label('Simpan')
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
}
