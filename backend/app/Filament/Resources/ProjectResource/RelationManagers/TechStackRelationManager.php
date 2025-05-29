<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechStackRelationManager extends RelationManager
{
    protected static string $relationship = 'techStack';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                

                Select::make('tech_id')->relationship('tech', 'name')
                ->required()->preload()->searchable()->createOptionForm([
                     TextInput::make('name')->maxLength(255)->required(),
                    FileUpload::make('logo')
                    ->label('SVG Icon')->required()
                    ->acceptedFileTypes(['image/svg+xml']) 
                  
                ])->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('project_id')
            ->columns([
                TextColumn::make('tech.name'),
                ImageColumn::make('tech.logo')->label('Logo')
                ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
