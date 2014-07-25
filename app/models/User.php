<?php

class User extends \Eloquent {
	protected $fillable = [];


	// protected $hidden = ["old_encrypted_password","reset_password_token","reset_password_sent_at","reset_password_sent_at"];
	
}

class UserTransformer extends League\Fractal\TransformerAbstract {

    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'name' => $user->name,
        ];
    }

}