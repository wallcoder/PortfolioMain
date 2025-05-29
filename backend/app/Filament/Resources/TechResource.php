<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechResource\Pages;
use App\Filament\Resources\TechResource\RelationManagers;
use App\Models\Tech;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\Concerns\HasRelationManagers;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechResource extends Resource
{
    protected static ?string $model = Tech::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationLabel = 'Technologies';
    protected static ?string $navigationGroup = 'Project';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('name')->maxLength(255)->required(),
                    FileUpload::make('logo')
                    ->label('SVG Icon')->required()
                    ->acceptedFileTypes(['image/svg+xml']) 
                  
                  
                    
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                ImageColumn::make('logo'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
    return [
           
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeches::route('/'),
            'create' => Pages\CreateTech::route('/create'),
            'edit' => Pages\EditTech::route('/{record}/edit'),
        ];
    }
}
