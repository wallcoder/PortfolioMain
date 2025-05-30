<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Nette\Utils\ImageColor;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';
    protected static ?string $navigationGroup = 'Project';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Section::make('')
                 ->schema([
                    Select::make('category_id')->relationship('category', 'name')
                ->searchable()->preload()
                ->createOptionForm([
                    TextInput::make('name')->required()->maxLength(255)
                ]),
                TextInput::make('title')->maxLength(255),
                ColorPicker::make('background_color')->required(),
                RichEditor::make('about')->required(),
                FileUpload::make('image1')->image()->maxFiles(1)->maxSize(2024)->required(),
                FileUpload::make('image2')->image()->maxFiles(1)->maxSize(2024)->required(),
                FileUpload::make('image3')->image()->maxFiles(1)->maxSize(2024)->required(),
                TextInput::make('demo')->label('Demo link')->required(),
                TextInput::make('source_code')->label('Source code link')->required(),
            ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image1'),
                TextColumn::make('category.name')->searchable(),
                TextColumn::make('title')->searchable(),
                ColorColumn::make('background_color')
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
            RelationManagers\TechStackRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
