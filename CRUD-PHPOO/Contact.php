<?php

/**
 * Description of Contact
 *
 * @author Iuri Monteiro <iurigms@gmail.com>
 * @copyright (c) 2021, Iuri Monteiro
 * @link https://www.php-fig.org/psr/psr-12/#4-classes-properties-and-methods
 */


class Contact extends Conn 
{
    public int $id;
    public array $formData;
    public object $conn;
    
    public function list() {
        $this->conn = $this->connect();
        $query_msgs_contacts = "SELECT id, name, email, msg_title, msg_content 
                FROM msgs_contacts 
                ORDER BY id DESC 
                LIMIT 40";
        $result_msgs_contacts = $this->conn->prepare($query_msgs_contacts);
        $result_msgs_contacts->execute();
        $retorno = $result_msgs_contacts->fetchAll();
        return $retorno;
    }
    
    public function view() {
        $this->conn = $this->connect();
        $querey_msg_contact = "SELECT id,name, email, msg_title, msg_content
                FROM msgs_contacts
                WHERE id = :id
                LIMIT 1";
        $result_msg_contact = $this->conn->prepare($querey_msg_contact);
        $result_msg_contact->bindParam(':id', $this->id, PDO::PARAM_INT);
        $result_msg_contact->execute();
        $retorno = $result_msg_contact->fetch();
        return $retorno;
        
    }
    
    public function create() {
        $this->conn = $this->connect();
        $query_msgs_contacts = "INSERT INTO msgs_contacts
                (name, email, msg_title, msg_content, created) VALUES 
                (:name, :email, :msg_title, :msg_content, NOW())";
        $creat_msg_contacts = $this->conn->prepare($query_msgs_contacts);
        $creat_msg_contacts->bindParam(':name', $this->formData['name'], PDO::PARAM_STR);
        $creat_msg_contacts->bindParam(':email', $this->formData['email'], PDO::PARAM_STR);
        $creat_msg_contacts->bindParam(':msg_title', $this->formData['msg_title'], PDO::PARAM_STR);
        $creat_msg_contacts->bindParam(':msg_content', $this->formData['msg_content'], PDO::PARAM_STR);
        
        $creat_msg_contacts->execute();
        if($creat_msg_contacts->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    
    public function edit() {
        $this->conn = $this->connect();
        $query_msg_contact = "UPDATE msgs_contacts
                SET name=:name, email=:email, msg_title=:msg_title, msg_content=:msg_content
                ,modified=NOW()
                WHERE id=:id";
        $edit_msg_contact = $this->conn->prepare($query_msg_contact);
        $edit_msg_contact->bindParam(':name', $this->formData['name'], PDO::PARAM_STR);
        $edit_msg_contact->bindParam(':email', $this->formData['email'], PDO::PARAM_STR);
        $edit_msg_contact->bindParam(':msg_title', $this->formData['msg_title'], PDO::PARAM_STR);
        $edit_msg_contact->bindParam(':msg_content', $this->formData['msg_content'], PDO::PARAM_STR);
        $edit_msg_contact->bindParam(':id', $this->formData['id'], PDO::PARAM_INT);
        
        $edit_msg_contact->execute();
        if($edit_msg_contact->rowCount()){
            return true;
           
        }else{
            return false;
        }
    }
    
    public function delete() {
        $this->conn = $this->connect();
        $querey_msg_contact = "DELETE FROM msgs_contacts WHERE id=:id";
        $delete_msg_contact = $this->conn->prepare($querey_msg_contact);
        $delete_msg_contact->bindParam(':id', $this->id, PDO::PARAM_INT);
        $retorno = $delete_msg_contact->execute();
        return $retorno;
    }
            
}
