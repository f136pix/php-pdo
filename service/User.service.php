<?php

require_once './db/Database.manager.php';

class UserService
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function setQuery($query)
    {
        DatabaseManager::mostrarQuery($query);
        // $this->db->setMostrarQuery($query);
    }

    public function createUser($user)
    {

        $query = "INSERT INTO users (name, idade, email) VALUES (:name, :idade, :email)";
        $sql = $this->db->prepare($query);

        $sql->bindParam(':name', $nome, PDO::PARAM_STR);
        $sql->bindParam(':idade', $idade, PDO::PARAM_INT);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);

        $nome = $user->getNome();
        $idade = $user->getIdade();
        $email = $user->getEmail();

        $success = $sql->execute();

        $query = $sql->queryString;
        $this->db->query($query); // gravando no log

        if ($success == 1) {
            echo "User $nome criado com sucesso \n";
        } else {
            echo "Houve um erro ao registrar o user \n";
        };

        return $success;
    }

    public function updateUser($id, $user)
    {

        $query = "UPDATE users SET name = :name, idade = :idade, email = :email WHERE id = :id";
        $sql = $this->db->prepare($query);

        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->bindParam(':name', $nome, PDO::PARAM_STR);
        $sql->bindParam(':idade', $idade, PDO::PARAM_INT);
        $sql->bindParam(':email', $email, PDO::PARAM_STR);

        // $id = $id
        $nome = $user->getNome();
        $idade = $user->getIdade();
        $email = $user->getEmail();

        $success = $sql->execute();

        $this->db->query($query); // gravando no log

        if ($success == 1) {
            echo "User com id $id atualizado com sucesso\n";
        } else {
            echo "Houve um erro ao atualizar os dados \n";
        };

        return $success;
    }

    public function getAllUsers()
    {

        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();

        $result = $query -> fetchAll();

        foreach( $result as $row ) {
            echo $row['id'], " - ";
            echo $row['name'], " - ";
            echo $row['idade'], " - ";
            echo $row['email'];
            echo "\n";
        }


        return $query -> fetchAll();
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id=?";
        $sql = $this->db->prepare($query);

        $success = $sql->execute([$id]);

        $this->db->query($query);

        if ($success == 1) {
            echo "User com id $id deletado com sucesso\n";
        } else {
            echo "Houve um erro ao deletar o dado \n";
        };

    }

}

?>