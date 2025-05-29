<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfoResource\Pages;
use App\Filament\Resources\InfoResource\RelationManagers;
use App\Models\Info;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfoResource extends Resource
{
    protected static ?string $model = Info::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-uturn-up';

    protected static ?string $navigationGroup = 'Profile';
    public static function form(Form $form): Form
    {
        return $form
    ->schema([
        Section::make('Profile Information')->columns(2)->schema([
            TextInput::make('short_name')
                ->label('Short Name')
                ->required()
                ->maxLength(255)
                ->columnSpan(2),  // full width
            
            FileUpload::make('image')
                ->label('Profile Image')
                ->required()
                ->maxFiles(1)
                ->maxSize(2024)
                ->image()
                ->columnSpan(2),  // full width
            
            FileUpload::make('resume')
                ->label('Resume')
                ->required()
                ->acceptedFileTypes(['application/pdf']),
             

            // Social Links grouped side-by-side
            TextInput::make('linkedin')
                ->label('LinkedIn')
                ->required()
                ->maxLength(255),

            TextInput::make('github')
                ->label('GitHub')
                ->required()
                ->maxLength(255),

            TextInput::make('instagram')
                ->label('Instagram')
                ->required()
                ->maxLength(255),
        ]),

        Section::make('About Texts')->columns(1)->schema([
            RichEditor::make('main_about')
                ->label('Main About')
                ->required(),

            RichEditor::make('front_page_about')
                ->label('Front Page About')
                ->required(),
        ]),
    ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('short_name'),
                ImageColumn::make('image'),
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
            'index' => Pages\ListInfos::route('/'),
            'create' => Pages\CreateInfo::route('/create'),
            'edit' => Pages\EditInfo::route('/{record}/edit'),
        ];
    }
}
