<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuppressedPhone extends Model
{
    /**
     * Attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['trunk_code', 'phone', 'sms', 'voicemail'];

    /**
     * Set the phone.
     *
     * @param  string  $value
     * @return void
     */
    // public function setPhoneAttribute($value)
    // {
    //     $this->attributes['phone'] = strtolower($value);
    // }
}
