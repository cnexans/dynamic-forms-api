<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User as User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    protected $table = 'forms';

    protected $fillable = ['user_id', 'name'];

    use SoftDeletes;



    public function getFormInstances()
    {
    	return FormInstance::where('form_id', $this->id)
    		->get();
    }

    public function getFieldDescriptors()
    {
    	return FieldDescriptor::where('form_id', $this->id)
    		->orderBy('position', 'asc')
    		->get();
    }

    public function getCreator()
    {
    	return User::find( $this->user_id );
    }

    public static function getAllCreatedBy( $user )
    {
    	if ( is_a($user, 'App\User') )
    		$id = $user->id;

    	else if ( is_integer($user) )
    		$id = $user;

    	else
    		return collect([]);

    	return self::where('user_id', $id)
    		->get();
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'form_users');
    }


}
