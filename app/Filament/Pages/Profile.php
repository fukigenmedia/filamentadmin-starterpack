<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms;
use Illuminate\Support\Facades\Hash;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.pages.profile';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = -1;

    public $name;
    public $email;
    public $avatar;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $this->form->fill([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'avatar' => auth()->user()->avatar,
        ]);
    }

    public function submit()
    {
        $this->form->getState();

        $state = array_filter([
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => current($this->avatar),
            'password' => $this->new_password ? Hash::make($this->new_password) : null,
        ]);

        auth()->user()->update($state);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->notify('success', __('fukigen.profile.notification.success'));
    }

    public function getCancelButtonUrlProperty()
    {
        return static::getUrl();
    }

    protected function getFormSchema(): array
    {
        $user = User::findOrFail(auth()->user()->id);

        return [
            Forms\Components\Card::make()
                ->columns(2)
                ->schema([
                    Forms\Components\FileUpload::make('avatar')
                        ->directory('avatar')
                        ->image()
                        ->avatar()
                        ->nullable()
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('name')
                        ->label(__('fukigen.profile.field.name'))
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->label(__('fukigen.profile.field.email'))
                        ->required()
                        ->email()
                        ->maxLength(255)
                        ->unique(User::class, 'email', $user),
                ]),
            Forms\Components\Card::make()
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('current_password')
                        ->label(__('fukigen.profile.field.current-password'))
                        ->password()
                        ->minLength(8)
                        ->maxLength(255)
                        ->rules(['required_with:new_password'])
                        ->currentPassword()
                        ->autocomplete('off')
                        ->columnSpan(1),
                    Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\TextInput::make('new_password')
                                ->label(__('fukigen.profile.field.new-password'))
                                ->password()
                                ->minLength(8)
                                ->maxLength(255)
                                ->rules(['confirmed'])
                                ->autocomplete('new-password'),
                            Forms\Components\TextInput::make('new_password_confirmation')
                                ->label(__('fukigen.profile.field.confirm-password'))
                                ->password()
                                ->minLength(8)
                                ->maxLength(255)
                                ->rules([
                                    'required_with:new_password',
                                ])
                                ->autocomplete('new-password'),
                        ]),
                ]),
        ];
    }

    public static function getLabel(): string
    {
        return __('fukigen.profile.resource.label');
    }

    public static function getPluralLabel(): string
    {
        return __('fukigen.profile.resource.labels');
    }

    protected function getTitle(): string
    {
        return __('fukigen.profile.resource.title');
    }

    public static function getSlug(): string
    {
        return __('fukigen.profile.resource.slug');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('fukigen.profile.resource.nav.group');
    }

    protected static function getNavigationLabel(): string
    {
        return __('fukigen.profile.resource.nav.label');
    }
}
