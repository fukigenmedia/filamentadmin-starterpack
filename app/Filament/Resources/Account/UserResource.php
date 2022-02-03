<?php

namespace App\Filament\Resources\Account;

use App\Filament\Resources\Account\UserResource\Pages;
use App\Filament\Resources\Account\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserResource extends Resource
{
    protected static ?string $label = 'Pengguna';

    protected static ?string $pluralLabel = 'Pengguna';

    protected static ?string $model = User::class;

    protected static ?string $slug = 'akun/pengguna';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Akun';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Pengguna';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
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
                            ->unique(User::class, 'email', fn ($record) => $record),
                        Forms\Components\TextInput::make('password')
                            ->label('Kata Sandi')
                            ->password()
                            ->minLength(8)
                            ->maxLength(255)
                            ->required(fn (Component $livewire): bool => $livewire instanceof Pages\CreateUser)
                            ->same('passwordConfirmation')
                            ->helperText(function (Component $livewire) {
                                if ($livewire instanceof Pages\EditUser) {
                                    return 'kosongkan jika tidak ingin mengubah.';
                                }
                            }),
                        Forms\Components\TextInput::make('passwordConfirmation')
                            ->label('Konfirmasi Kata Sandi')
                            ->password()
                            ->minLength(8)
                            ->maxLength(255)
                            ->required(fn (Component $livewire): bool => $livewire instanceof Pages\CreateUser)
                            ->dehydrated(false),
                        Forms\Components\BelongsToManyMultiSelect::make('roles')
                            ->label('Peran')
                            ->relationship('roles', 'name')
                            ->required()
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan(2),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Dibuat')
                            ->content(fn (?User $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Disunting')
                            ->content(fn (?User $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Surel')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('roles.name')
                    ->label('Peran')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Bergabung')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/tambah'),
            'edit' => Pages\EditUser::route('/{record}/sunting'),
        ];
    }
}
