<?php



namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\HasAvatar;
use Firefly\FilamentBlog\Database\Factories\UserFactory;
use Firefly\FilamentBlog\Models\Post;
use Firefly\FilamentBlog\Traits\HasBlog;
use Illuminate\Container\Facades\Storage;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class User extends Authenticatable implements HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasBlog, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'short_name',
        'image',
        'avatar_url',
        'linkedin',
        'github',
        'instagram',
        'resume',
        'main_about',
        'front_page_about',
        'email',
        'password',

        'custom_fields',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getFilamentAvatarUrl(): ?string
    {
        $avatarColumn = config('filament-edit-profile.avatar_column', 'avatar_url');
        return $this->$avatarColumn ? FacadesStorage::url($this->$avatarColumn) : null;
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
             'custom_fields' => 'array'
        ];
    }

    public function canComment()
    {
        return true;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected static function newFactory()
    {
        return new UserFactory();
    }
}
