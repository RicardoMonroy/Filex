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
        'guest_id',
        'signer_two_mail',
        'guest_id3',
        'signer_Tree_mail',
        'guest_id4',
        'signer_Four_mail',
        'guest_id5',
        'signer_Five_mail',
        'message',
        'file_id',
        'owner_id',
        'guests_email'
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

    public function signeds(){
        return $this->hasMany(Signed::class);
    }

}
