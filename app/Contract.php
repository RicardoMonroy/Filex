<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ([
        'name',
        'file_path',
        // 'signer_one_name',
        // 'signer_one_mail',
        'signer_two_name',
        'signer_two_mail',
        'message',
        'file_id',
        'owner_id',
        'guest_id'
    ]);

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function guest(){
        return $this->belongsTo(User::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function signatures(){
        return $this->hasMany(Signature::class);
    }

}
