<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
   /**
   * The table associated with the model.
   *
   * @var string
   */
   protected $table = 'player';

   /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
    */
    public $timestamps = true;

    const CREATED_AT = 'player_updatedat';
    const UPDATED_AT = 'player_updatedat';
}
