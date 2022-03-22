<?php

class mailmodel extends CI_Model
{
    public function insert($email, $password)
    {
        $password = md5($password);
        $sql = $this->db->query("INSERT INTO mail(email,password) values ('$email','$password')");
    }
}
