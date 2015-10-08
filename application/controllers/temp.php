$user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);

if($user->admin == 1){ 
    //this user is admin 
}