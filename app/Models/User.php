<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    /* protected $fillable = [
        'name',
        'email',
        'password',
    ]; */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
        ];
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function recruitingTeam(){
        return $this->belongsTo(Team::class, 'recruitingteam_id');
    }

    //Obtener personajes que un mod puede usar
    public function characters(){
        return $this->belongsToMany(User::class, 'can_use_character', 'mod_id', 'character_id');
    }

    //mods que pueden usar un personaje
    public function mods(){
        return $this->belongsToMany(User::class, 'can_use_character', 'character_id', 'mod_id');
    }

    //mensajes enviados por un mod utilizando un personaje
    public function messagesAsCharacter(){
        return $this->chatmessages()->whereNotNull('mod_id');
    }

    public function chatroomsCreated(){
        return $this->hasMany(Chatroom::class, 'creator_id');
    }

    public function favoriteChatrooms(){
        return $this->belongsToMany(Chatroom::class);
    }

    /* public function chatMessages(){
        return $this->belongsToMany(ChatMessage::class)->using(ChatMessageInfo::class);
    } */
    public function chatmessages(){
        return $this->belongsToMany(Chatmessage::class, 'chatmessage_chatroom_user')->using(ChatMessageInfo::class)->withPivot('chatroom_id');
    }

    public function lastChatmessages(){
        return $this->belongsToMany(Chatmessage::class, 'chatmessage_chatroom_user')->using(ChatMessageInfo::class)->orderBy('created_at', 'desc')->take(10);
    }

    public function chatroomsParticipated(){
        return $this->belongsToMany(Chatroom::class, 'chatmessage_chatroom_user')->using(ChatMessageInfo::class)->orderBy('created_at', 'desc')->distinct();
    }

    public function totalMessages(){
        return $this->chatmessages()->count();
    }

    public function mostUsedChatrooms(){
        return $this->chatroomsParticipated()->where('team_id', null)->withCount(['chatmessages' => function (Builder $query){
            $query->whereRelation('user', 'user_id', $this->id);
        }])->orderBy('chatmessages_count', 'desc')->take(5)->get();
    }


    //pivote
    public function chatMessageInfo(){
        return $this->hasMany(ChatMessageInfo::class);
    }


}
