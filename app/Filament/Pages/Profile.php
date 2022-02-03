<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $label = 'Profil';

    protected static ?string $title = 'Profil';

    protected static string $view = 'filament.pages.profile';

    protected static ?string $navigationGroup = 'Akun';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Profil';

    protected static ?int $navigationSort = -1;

    public $name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $this->form->fill([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ]);
    }

    public function submit()
    {
        $this->form->getState();

        $state = array_filter([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->new_password ? Hash::make($this->new_password) : null,
        ]);

        auth()->user()->update($state);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->notify('success', 'Profil Anda telah diperbarui.');
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
                    Forms\Components\TextInput::make('name')
                        ->label('Nama')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->label('Surel')
                        ->required()
                        ->email()
                        ->maxLength(255)
                        ->unique(User::class, 'email', $user),
                ]),
            Forms\Components\Card::make()
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('current_password')
                        ->label('Kata Sandi Sekarang')
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
                                ->label('Kata Sandi Baru')
                                ->password()
                                ->minLength(8)
                                ->maxLength(255)
                                ->rules(['confirmed'])
                                ->autocomplete('new-password'),
                            Forms\Components\TextInput::make('new_password_confirmation')
                                ->label('Konfirmasi Kata Sandi')
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
}
