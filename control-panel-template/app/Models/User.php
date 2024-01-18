<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // RELATIONSHIPS

    // Custom Notifications (alerts)
        public function sentCustomNotifications(): HasMany
        {
            return $this->hasMany(CustomNotification::class);
        }

        public function customNotifications(): HasMany
        {
            return $this->hasMany(CustomNotification::class);
        }
    //

    // Chats
        public function chatMessagesSend(): HasMany
        {
            return $this->hasMany(ChatMessage::class, 'author_id');
        }

        public function chatMessagesReceive(): HasMany
        {
            return $this->hasMany(ChatMessage::class, 'receiver_id');
        }

        public function chatMessagesSendForUser(int $receiverId): HasMany
        {
            return $this->hasMany(ChatMessage::class, 'author_id')
                ->where('receiver_id', $receiverId);
        }

        public function chatMessagesReceiveForUser(int $authorId): HasMany
        {
            return $this->hasMany(ChatMessage::class, 'receiver_id')
                ->where('author_id', $authorId);
        }
    //
}
