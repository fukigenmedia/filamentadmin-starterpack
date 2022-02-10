<?php

namespace App\Filament\Resources\System;

use App\Filament\Resources\System\LogActivityResource\Pages;
use App\Filament\Resources\System\LogActivityResource\RelationManagers;
use App\Models\System\LogActivity;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class LogActivityResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'subject';

    protected static ?int $navigationSort = 0;

    protected static ?string $model = LogActivity::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('fukigen.log-activities.field.username'))
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('action')
                    ->label(__('fukigen.log-activities.field.action'))
                    ->colors([
                        'secondary',
                        'primary' => 'create',
                        'warning' => 'edit',
                        'danger' => 'delete',
                    ])
                    ->enum([
                        'create' => 'CREATE',
                        'edit' => 'EDIT',
                        'delete' => 'DELETE',
                    ]),
                Tables\Columns\TextColumn::make('subject')
                    ->label(__('fukigen.log-activities.field.information'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('fukigen.log-activities.field.time'))
                    ->sortable()
                    ->date('d/m/Y - H:i:s')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('action')
                    ->label(__('fukigen.log-activities.filter.action'))
                    ->options([
                        'create' => 'Create',
                        'edit' => 'Edit',
                        'delete' => 'Delete',
                    ]),
                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('start_at')
                            ->label(__('fukigen.log-activities.filter.date-start'))
                            ->displayFormat('d/m/Y')
                            ->placeholder(fn ($state): string => now()->format('d/m/Y')),
                        Forms\Components\DatePicker::make('end_at')
                            ->label(__('fukigen.log-activities.filter.date-end'))
                            ->displayFormat('d/m/Y')
                            ->placeholder(fn ($state): string => now()->format('d/m/Y')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['start_at'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['end_at'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
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
            'index' => Pages\ListLogActivities::route('/'),
        ];
    }

    public static function getLabel(): string
    {
        return __('fukigen.log-activities.resource.label');
    }

    public static function getPluralLabel(): string
    {
        return __('fukigen.log-activities.resource.labels');
    }

    protected function getTitle(): string
    {
        return __('fukigen.log-activities.resource.title');
    }

    public static function getSlug(): string
    {
        return __('fukigen.log-activities.resource.slug');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('fukigen.log-activities.resource.nav.group');
    }

    protected static function getNavigationLabel(): string
    {
        return __('fukigen.log-activities.resource.nav.label');
    }
}
